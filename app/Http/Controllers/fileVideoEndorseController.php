<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

use App\Models\endors;
use App\Models\file_video_endors;
use Aws\S3\S3Client;

class fileVideoEndorseController extends Controller
{
    public function tambah_fileVideo($id){
        $jdl = 'Tambah File Endoser(Instagram)';
        
        $endor = endors::find($id);
    
        return view('endorse.v_tambahFileVideo',['jdl' => $jdl, 'endor'=> $endor]);
    }
    
    public function store_fileVideo(Request $request){
        set_time_limit(180);

        $this->validate($request,[
            'file' => 'mimes:mp4,movphp|max:1024000|required',            
        ],
        [
            'file.required' =>  'Gambar Harus Diisi!',
            'file.mimes' => 'File  yang Diupload bukan dalam  bentuk Video!',
            'file.max' => 'Ukuran Video  Tidak Boleh Melebihi 500MB'
        ]
        );

        $data  =  [
            'endors_id' =>  $request->endors_id,
        ];

        //Cek gambar yang diupload
        if ($request->hasFile('file')) {
            $vid = $request->file('file');
            $vid_nama = $vid->getClientOriginalName();

            //Menyimpan  file  kedalam bucket 'bankcont'  didalam folder 'endorse/instagram/video'
            $vid->storeAs('endorse/instagram/video',$vid_nama,'s3');
        }

        //membuat  nama video
        $data['file'] = $vid_nama;

        file_video_endors::create($data);


         // Mengirim respons JSON dengan redirect URL dan pesan sukses
        return Response::json(['redirect_url' => '/endorse', 'success' => 'Upload File Berhasil']);
    }

    public function hapus_fileVideo($id){

        $file_video = file_video_endors::find($id);
        
        
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
        $objectKey  =  'endorse/instagram/video/'.$file_video->file;

        $s3->deleteObject([
            'Bucket' => $bucketName, 
            'Key' =>  $objectKey
        ]);

        $file_video->delete();

        return back()->with('info','Hapus File Video Berhasil!!');
    }

}
