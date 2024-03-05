<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\product;
use App\Models\endors;
use App\Models\file_endors;
use App\Models\file_video_endors;
use Aws\S3\S3Client;
use Illuminate\Support\Facades\Storage;

class endorseController extends Controller
{
    public  function index(){
        $jdl = "List Endrose";
        
        $produk = product::paginate(10);

        //Ambil data  produk  dari tabel  Endorse yang memili  dengan produk
        $endor = endors::all();

        
         // Menampilkan total  kemunculan  data  endors  berdasarkan product_id
        $countEndorsByProduk = [];
        foreach( $produk as $pdk ){
            $countEndorsByProduk[$pdk->id]['instagram'] = endors::where('product_id',$pdk->id)
                                                    ->where('sosial_media','instagram')
                                                    ->count();
            $countEndorsByProduk[$pdk->id]['tiktok'] = endors::where('product_id',$pdk->id)
                                                    ->where('sosial_media','tiktok')
                                                    ->count();
        }

         $config = [
            'region' => 'ap-southeast-1',
            'version' => 'latest',
            'credentials' => [
                'key' => 'AKIAZI2LDMSP6E5M4TFK',
                'secret' => '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',
            ],
         ];

         //Membuat instanisasi S3
         $s3 = new S3Client($config);

         //Nama Bucket dan Folder 
         $bucketName = 'bankcont';
         $folderName = 'produk/';

         //Array untuk menyimpan gambar
         $imageUrls = [];

         //Loop setiap data produk
         foreach($produk as $pdk){
            //Mendapatkan nama  file  'file' dalam  record product
            $fileName = $pdk->file;

            //Mendapatkan URL Gambar dari AWS S3 jika  file  tersebut  ada
            $imageUrl =  $s3->getObjectUrl($bucketName,$folderName.$fileName);

            //Menambahkan URL gambar kedalam array  jika URL tersedia
            if($imageUrl){
                $imageUrls[$pdk->id] = $imageUrl;
            }
         }

        return view('endorse.v_index',['jdl' =>  $jdl,'produk' => $produk,'imageUrls'=> $imageUrls,'endor' => $endor,'countEndorsByProduk' => $countEndorsByProduk]);
    }

    //List Endorse(Instagram)
    public function instagram_index(Request $request){
        $jdl =  "List Endorse(Instagram)";

        //menangkap product_id  dari permintaan
        $product_id = $request->input('product_id');

        $produk = product::all();

        //mengambil data endors dengan  product id  yang sesuai
        $endor = endors::where('sosial_media','instagram')->where('product_id',$product_id)->get();

        return view('endorse.v_indexInstagram',['jdl' =>  $jdl,'endor'=>$endor,'produk' => $produk]);
    }


    //List Endorse(Tiktok)
    public function tiktok_index(Request $request){
        $jdl =  "List Endorse(Tiktok)";

        //menangkap product_id dari permintaan
        $product_id = $request->input('product_id');

        $produk = product::all();

        //mengambil data endors dengan  product id  yang sesuai
        $endor = endors::where('sosial_media','tiktok')->where('product_id',$product_id)->get();

        return view('endorse.v_indexTiktok',['jdl' =>  $jdl,'endor'=>$endor,'produk' => $produk]);
    }



    public function tambah_Endorse(){
        $jdl  = "Tambah Endoser";
        
        $produk = product::all();

        return view('endorse.v_tambahEndorse',['jdl' => $jdl,'produk' => $produk]);
    }


    public function store_Endorse(Request $request){
        $this->validate($request,[
            'product_id' => 'required|exists:product,id',
            'nm_endorse' =>  'required ',
            'usia' => 'required|numeric',
            'jns_kelamin' => 'required|in:laki-laki,perempuan',
            'alamat' => 'required',
            'kontak_person' => 'required|numeric',
            'kategori' => 'required',
            'spesifikasi_akun' => 'required',
            'link_akun' => 'required',
            'sosial_media' => 'required',
            'viewer' => 'required',
            'like' => 'required',
            'follower' => 'required',
            'rate_card' => 'required|numeric',
            'owning' => 'required', 
            'foto' =>  'mimes:jpg,jpeg,png,gif|max:5048|required',
        ],
        [
            'product_id.exists' => 'Produk Wajib Dipilih!!',
            'nm_endorse.required' => 'Nama Endoser Wajib Diisi!!',
            'usia.required' => 'Usia Wajib Diisi!!',
            'jns_kelamin.required' => 'Jenis Kelamin Wajib Diisi!!',
            'alamat.required' => 'Alamat Wajib Diisi!!',
            'kontak_person.required' => 'Kontak Person Wajib',
            'kategori.required' => 'Kategori Wajib Diisi!!',
            'spesifikasi_akun.required' => 'Spesifikasi Akun Wajib Diisi!!',
            'link_akun.required' => 'Link Akun Wajib Diisi!!',
            'viewer.required' => 'Jumlah Viewer Wajib Diisi!!',
            'like.required' => 'Jumlah Like Wajib Diisi!!',
            'follower.required' => 'Jumlah Follower Wajib Diisi!!',
            'rate_card.required' => 'Rate Card Wajib Diisi!!',
            'owning.required' => 'Owning Wajib Diisi!!',
            'foto.required' => 'Foto Profile Wajib Diisi!!',
            'foto.mimes' => 'File  Yang Diupload Bukan Gambar!!',
            'foto.max' => 'Ukuran Foto Profile  Tidak  Boleh Melebihi Dari 5MB!!'

        ]
        );

        $data = [
            'product_id' => $request->product_id,
            'nm_product' => $request->product_id,
            'nm_endorse' => $request->nm_endorse,
            'usia' => $request->usia,
            'jns_kelamin' => $request->jns_kelamin,
            'alamat' =>  $request->alamat,
            'kontak_person' => $request->kontak_person,
            'kategori' => $request->kategori,
            'spesifikasi_akun' => $request->spesifikasi_akun,
            'link_akun' => $request->link_akun,
            'sosial_media' => $request->sosial_media,
            'viewer' => $request->viewer,
            'like' => $request->like,
            'follower' => $request->follower,
            'rate_card' => $request->rate_card,
            'engagement_rate' => $request-> engagement_rate,
            'owning' => $request->owning, 
            'deskripsi' => $request->deskripsi,
        ];

        //Cek gambar  yang di upload
        if ($request->hasFile('foto')) {
            $fp = $request->file('foto');
            $fb_nama = $fp->getClientOriginalName();

            //Menyimpan  file  kedalam bucket 'bankcont'  didalam folder /endorse/instagram/foto_profile
            $fp->storeAs('endorse/instagram/foto_profile',$fb_nama,'s3');
        }

        //Membuat nama pada Foto Profile
        $data['foto'] = $fb_nama;
        
        endors::create($data);

        return redirect('/endorse')->with('success', 'Tambah Produk Berhasil!!');
    }

    public function detail_Endoser($id){
        $jdl = "Detail Endoser";
        
        $endor = endors::find($id);
        
        $file_gambar = file_endors::where('endors_id',$id)->get();

        $file_video = file_video_endors::where('endors_id',$id)->get();
        
        // konfigurasi Kredinsial AWS
        $config = [
            'region' => 'ap-southeast-1',
            'version' => 'latest',
            'credentials' => [
                'key' => 'AKIAZI2LDMSP6E5M4TFK',
                'secret' => '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'
            ],
        ];

        //instansiasi S3
        $s3 = new S3Client($config);

        //Nama Bucket, Folder dan Nama File didalamnya
        $bucketName = 'bankcont';
        $folderName = 'endorse/instagram/foto_profile/'.$endor->foto;

        $imageUrls = [];
        $file_imageUrls = [];
        $file_videoUrls = [];
        
        $imageUrl = $s3->getObjectUrl($bucketName,$folderName);
        
        //menampilkan  gambar untuk foto profile
        if ($imageUrl) {
            $imageUrls[$endor->id] = $imageUrl;
        }

        //menampilkan file gambar
        foreach ($file_gambar as $fg ) {
            $gmrNama = $fg->file;

            $gambarExtension = pathinfo($gmrNama, PATHINFO_EXTENSION);

            if (in_array($gambarExtension, ['jpg', 'jpeg','png','jfif','webp','HEIC'])) {
                $gambarFolderName = 'endorse/instagram/gambar/';
                $gmrUrl = $s3->getObjectUrl($bucketName, $gambarFolderName . $gmrNama);
                if ($gmrUrl) {
                    $file_imageUrls[$fg->id] = $gmrUrl;
                }
            }
        }

        //menampilkan file video
        foreach ($file_video as $fv) {
            $vidNama = $fv->file;

            $videoExtension = pathinfo($vidNama,PATHINFO_EXTENSION);

            if (in_array($videoExtension,['mp4','MP4','MOV','mov'] )) {
                $videoFolderName = 'endorse/instagram/video/';
                $videoUrl = $s3->getObjectUrl($bucketName,$videoFolderName.$vidNama);
                if ($videoUrl) {
                    $file_videoUrls[$fv->id] = $videoUrl;
                }
            }
        } 

        return view('endorse.v_detailEndoser',['jdl' => $jdl,'endor' => $endor,'file_gambar' => $file_gambar, 'file_video' => $file_video , 'imageUrls' =>  $imageUrls,'file_imageUrls' =>  $file_imageUrls,'file_videoUrls' =>  $file_videoUrls]);
    }

    public  function edit_Endorse($id){
        $jdl = "Edit Endoser Instagram";

        $produk = product::all();
        
        $endor = endors::find($id);

        return view('endorse.v_editEndoser',['jdl' => $jdl,'produk' => $produk,'endor' => $endor ]);
    }

    public function store_editEndorse($id,Request $request){
        $this->validate($request,[
            'product_id' => 'required|exists:product,id',
            'nm_endorse' =>  'required ',
            'usia' => 'required|numeric',
            'jns_kelamin' => 'required|in:laki-laki,perempuan',
            'alamat' => 'required',
            'kontak_person' => 'required|numeric',
            'kategori' => 'required',
            'spesifikasi_akun' => 'required',
            'link_akun' => 'required',
            'sosial_media' => 'required',
            'viewer' => 'required',
            'like' => 'required',
            'follower' => 'required',
            'rate_card' => 'required|numeric',
            'owning' => 'required', 
            'foto' =>  'mimes:jpg,jpeg,png,gif|max:5048',
        ],
        [
            'product_id.exists' => 'Produk Wajib Dipilih!!',
            'nm_endorse.required' => 'Nama Endoser Wajib Diisi!!',
            'usia.required' => 'Usia Wajib Diisi!!',
            'jns_kelamin.required' => 'Jenis Kelamin Wajib Diisi!!',
            'alamat.required' => 'Alamat Wajib Diisi!!',
            'kontak_person.required' => 'Kontak Person Wajib',
            'kategori.required' => 'Kategori Wajib Diisi!!',
            'spesifikasi_akun.required' => 'Spesifikasi Akun Wajib Diisi!!',
            'link_akun.required' => 'Link Akun Wajib Diisi!!',
            'viewer.required' => 'Jumlah Viewer Wajib Diisi!!',
            'like.required' => 'Jumlah Like Wajib Diisi!!',
            'follower.required' => 'Jumlah Follower Wajib Diisi!!',
            'rate_card.required' => 'Rate Card Wajib Diisi!!',
            'owning.required' => 'Owning Wajib Diisi!!',
            'foto.mimes' => 'File  Yang Diupload Bukan Gambar!!',
            'foto.max' => 'Ukuran Foto Profile  Tidak  Boleh Melebihi Dari 5MB!!'

        ]
        );
    
        $data_edit = endors::find($id);
        $data_edit->product_id =  $request->product_id;
        $data_edit->nm_endorse = $request->nm_endorse;  
        $data_edit->usia = $request->usia;
        $data_edit->jns_kelamin = $request->jns_kelamin;
        $data_edit->alamat = $request->alamat;
        $data_edit->kontak_person = $request->kontak_person;
        $data_edit->kategori = $request->kategori;
        $data_edit->spesifikasi_akun = $request->spesifikasi_akun;
        $data_edit->link_akun = $request->link_akun;
        $data_edit->sosial_media = $request->sosial_media;
        $data_edit->viewer = $request->viewer;
        $data_edit->like = $request->like;
        $data_edit->follower = $request->follower;
        $data_edit->rate_card = $request->rate_card;
        $data_edit->engagement_rate = $request->engagement_rate;
        $data_edit->owning = $request->owning;
        $data_edit->deskripsi = $request->deskripsi;

        if($request->hasFile('foto')) {
            $fotoProfile = $request->file('foto');
            $fotoProfileNama = $fotoProfile->getClientOriginalName();

            //Check jika  gambar ada
            if ($data_edit->foto) {
                //hapus gambar dari bucket s3
                Storage::disk('s3')->delete('endorse/instagram/foto_profile/'.$data_edit->foto);
            }
            //Simpan gambar baru pada bucket s3
            $fotoProfile->storeAs('endorse/instagram/foto_profile',$fotoProfileNama,'s3');
            
            //Update nama  gambar pada database
            $data_edit->foto = $fotoProfileNama;
        }

        //Simpan ke dalam  database
        $data_edit->save();

        return redirect('endorse')->with('success',"Update Knowladge Berhasil!!");
    }

    public function hapus_Endorse($id){
        $hapus_data = endors::find($id);

         //Hapus  Produk  yang terkait dengan produk  dari AWS S3
        //konfigurasi kredinsial aws
        $config =  [
            'region' => 'ap-southeast-1',
            'version' => 'latest',
            'credentials' =>[
                'key' => 'AKIAZI2LDMSP6E5M4TFK',
                'secret' => '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'
            ]
        ];

        //membuat instanisasi S3
        $s3 = new S3Client($config);

        $bucketName = 'bankcont';
        $objectKey  = 'endorse/instagram/foto_profile/'.$hapus_data->foto;

        $s3->deleteObject([
            'Bucket' => $bucketName,
            'Key' => $objectKey
        ]);
        

        //Hapus data yang terkait dengan tabel 'file_endors'
        $file_gambar = file_endors::where('endors_id',$id)->get();
        foreach($file_gambar as  $fg){
            $bucketName = 'bankcont';
            $objectKey  = 'endorse/instagram/gambar/'.$fg->file;
            
                $s3->deleteObject([
                    'Bucket' => $bucketName,
                    'Key'   =>  $objectKey
                ]);

            $fg->delete();
        }
        
         //Hapus data yang terkait dengan tabel 'file_video_endors'
         $file_video = file_video_endors::where('endors_id',$id)->get();
         foreach($file_video as $fv){
            $bucketName = 'bankcont';
            $objectKey  = 'endorse/instagram/video/'.$fv->file;
            
                $s3->deleteObject([
                    'Bucket' => $bucketName,
                    'Key'   =>  $objectKey
                ]);

            $fv->delete();
         }


        //Hapus Endor itU Sendiri
        $hapus_data->delete();

        return  redirect('/endorse')->with('info', "Hapus Produk Berhasil!!");
    }

}
