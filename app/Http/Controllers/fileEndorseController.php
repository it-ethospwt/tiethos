<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

use App\Models\endors;
use App\Models\file_endors;
use Aws\S3\S3Client;


class fileEndorseController extends Controller
{
    
    public  function tambah_file($id){
        $jdl = "Tambah File Endoser(Instagram)";
        $endor = endors::find($id);

        return view('endorse.v_tambahFile',['jdl'=> $jdl,'endor' => $endor]);
    }

    public function store_file(Request $request){
        $this->validate($request,[
            'file' => 'mimes:jpg,jpeg,png,gif,webp,heic|max:5048|required'
        ],
        [
            'file.required' => 'Gambar Produk Harus Diisi!',
            'file.mimes' => 'File  Yang  Di Upload  Bukan Gambar!',
            'file.max' => 'Ukuran Gambar Tidak Boleh Melebihi dari 5 MB!'
        ]
        );

        $data = [
            'endors_id' => $request->endors_id,
        ];

        //cek gambar yang diupload 
        if ($request->hasFile('file')) {
            $gmr = $request->file('file');
            $gmr_nama =  $gmr->getClientOriginalName(); 

             //Menyimpan  file  kedalam bucket 'bankcont'  didalam folder 'endorse/instagram/gambar'
             $gmr->storeAs('endorse/instagram/gambar', $gmr_nama,'s3');
        }
        //membuat nama gambar
        $data['file'] = $gmr_nama;

        file_endors::create($data);

        return Response::json(['redirect_urlGambar' => '/endorse','berhasil' => 'Upload File Gambar Berhasil']);  
        // return redirect('/endorse')->with('success', 'Tambah File Gambar Berhasil!!');
    }

    public function download_file($id){

        //mendapatkan gambar endors  dari database berdasarkan id
        $file_gambar =  file_endors::find($id);

        //konfigurasi kredensial aws
        $config = [
            'region' => 'ap-southeast-1',
            'version' => 'latest',
            'credentials' => [
                'key' => 'AKIAZI2LDMSP6E5M4TFK',
                'secret' => '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'
            ]
            ];

            //membuat instanisasi S3
            $s3 = new S3Client($config);

            //Nama  bucket  S3 dan  Nama  file di dalamnya
            $bucketName = 'bankcont';
            $objectKey =  'endorse/instagram/gambar/'.$file_gambar->file;

            //Mencoba untuk mendapatkan URL tanda tangan yang ditandatangani (signed) untuk objek S3
            try{
                $file = $s3->getObject([
                    'Bucket' => $bucketName,
                    'Key' => $objectKey
                ]);

                // mengembalikan  file langsung  sebagai unduhan
                return  response()->streamDownload(function() use ($file){
                    echo $file['Body'];
                }, $file_gambar->file);
            }catch(\Exception $e){
                 // Tangani jika terjadi kesalahan saat mengambil URL tanda tangan yang ditandatangani (signed)
                 return back()->with('error','Gagal Mengunduh File Gambar');
            }
    }

    public function hapus_file($id){
     
        //file gambar
        $file_gambar = file_endors::find($id);

        //Hapus  Produk  yang terkait dengan produk  dari AWS S3
        //konfigurasi kredinsial aws
        $config = [
            'region' => 'ap-southeast-1',
            'version' => 'latest',
            'credentials' => [
                'key' => 'AKIAZI2LDMSP6E5M4TFK',
                'secret' => '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'
            ]
        ];

        //Membuat  instanisasi S3
        $s3 = new S3Client($config);

        $bucketName =  'bankcont';
        $objectKey  =  'endorse/instagram/gambar/'.$file_gambar->file;

        $s3->deleteObject([
            'Bucket' => $bucketName, 
            'Key' =>  $objectKey
        ]);

        $file_gambar->delete();

        return back()->with('info','Hapus File Gambar Berhasil!!');
    }
}
