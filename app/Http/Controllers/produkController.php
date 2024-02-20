<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades;
use  Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\File;
use Aws\s3\S3Client;
use Illuminate\Support\Facades\Storage;

//memanggil  model product
use App\Models\product;

//memanggil  model knowladge
use App\Models\knowladge;
use Nette\Utils\Strings;

class produkController extends Controller {

// TAMPIL DATA PRODUK
public function index(){
    $jdl = "List Produk";
    //mengambil  data  dari database
    $data = product::all();
    
    //Konfigurasi Kredensial AWS
    $config = [
        'region' => 'ap-southeast-1',
        'version' => 'latest',
        'credentials' => [
            'key' =>  'AKIAZI2LDMSP6E5M4TFK',
            'secret' =>  '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',
        ],
    ];

    //membuat instansiasi  s3
    $s3 = new S3Client($config);

    //Nama Bucket dan Folder
    $bucketName = 'bankcont';
    $folderName = 'produk/';
    
    //Arary untuk  menyimpan gambar
    $imageUrls =  [];

   //Loop melalui setiap data  produk
   foreach ($data as $product) {
        //Mendapatkan nama file dari field 'file' dalam  record product 
        $fileName =  $product->file;
        
        //mendapatkan URL gambar dari AWS S3 jika file tersebut ada
        $imageUrl = $s3->getObjectUrl($bucketName,$folderName.$fileName);

        //Menambahkan  URL  gambar  kedalam  array jika URL tersedia
        if($imageUrl){
            $imageUrls[$product->id] = $imageUrl;
        }
   }

   return view('produk.v_index',['jdl' => $jdl,'data' => $data,'imageUrls' => $imageUrls]);
}


// TAMBAH PRODUK  & PROSES TAMBAH  PRODUK 
public function tambah_product(){
    $jdl = "Tambah Produk";

    return view('produk.v_tambah', ['jdl' => $jdl]);
}

public  function store_product(Request $request){
    $this->validate($request,[
    'nm_product' => 'required',
    'file' => 'mimes:jpg,jpeg,png,gif|max:2048|required'
    ],
    [
    'nm_product.required' => 'Nama Produk Harus Diisi!',
    'file.required' => 'Gambar Produk Harus Diisi!',
    'file.mimes' => 'File  Yang  Di Upload  Bukan Gambar!',
    'file.max' => 'Ukuran Gambar Produk  Tidak Boleh Melebihi dari 2 MB!'
    ]
    );

    $data =  [
        'nm_product' =>  $request->nm_product,
    ]; 

    //cek gambar  yang di upload
    if ($request->hasFile('file')) {
        $gmr_pdk  = $request->file('file');
        $gmr_pdk_nama = $gmr_pdk->getClientOriginalName(); 

        //Menyimpan  file  kedalam bucket 'bankcont'  didalam folder /produk
        $gmr_pdk->storeAs('produk',$gmr_pdk_nama,'s3');

        }
        //membuat nama  produk 
        $data['file'] = $gmr_pdk_nama;
        
        product::create($data);

        return redirect('/produk')->with('success', 'Tambah Produk Berhasil!!');
    }

    
// EDIT PRODUK &  PROSES  EDIT  PRODUK
public function edit_product($id){
    $jdl = "Edit Produk";
    $data = product::find($id);

        return  view('produk.v_edit', ['jdl' => $jdl, 'data' =>  $data]);
    }


public  function store_edit_product($id, Request $request)
{
    $this->validate(
        $request,
        [
            'nm_product' => 'required',
        ],
        [
            'nm_product.required' => 'Nama Produk Harus Diisi!',
        ]
    );

    $data_edit = product::find($id);
    $data_edit->nm_product  = $request->nm_product;
    $data_edit->save();

    return redirect('/produk')->with('success', 'Edit Produk Berhasil!!');
}

//PROSES HAPUS PRODUK 
public function destroy_product($id){

    $product = product::find($id);

    //Hapus  Produk  yang terkait dengan produk  dari AWS S3
    //konfigurasi kredinsial aws
    $config = [
        'region' => 'ap-southeast-1',
        'version' => 'latest',
        'credential' => [
            'key' => 'AKIAZI2LDMSP6E5M4TFK',
            'secret' => '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'
        ],
    ];

    //membuat instanisasi S3 
    $s3 = new S3Client($config);

    $bucketName = 'bankcont';
    $objectKey  = 'produk/'.$product->file;

    $s3->deleteObject([
        'Bucket' => $bucketName,
        'Key'   =>  $objectKey
    ]);

    //Hapus data yang terkait dari table 'knowladge'
    $knowladge = knowladge::where('product_id', $id)->get();
    foreach($knowladge as  $k){
        $k->delete();
    }  

    //Hapus  produk itu Sendiri
    $product->delete();

    return  redirect('/produk')->with('info',"Hapus Produk Berhasil!!");
}



 //Download Image Produk
  public  function download_product($id){
    //Mendapatkan  informasi  produk berdasarkan id
    $product = Product::find($id);
    
    //konfigurasi kredinsial aws
    $config = [
        'region' => 'ap-southeast-1',
        'version' => 'latest',
        'credintial' => [
            'key' => 'AKIAZI2LDMSP6E5M4TFK',
            'secret' => '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'
        ]
    ];

    //Membuat instanisasi S3
    $s3 = new  S3Client($config);

    //Nama  bucket  S3 dan  Nama  file di dalamnya
    $bucketName = 'bankcont';
    $objectKey  = 'produk/'.$product->file;

    //Mencoba untuk mendapatkan URL tanda tangan yang ditandatangani (signed) untuk objek S3
    try{
        $fileContent = $s3->getObject([
            'Bucket' => $bucketName,
            'Key'   =>  $objectKey
        ]);
        
        // mengembalikan  file langsung  sebagai unduhan
        return response()->streamDownload(function() use ($fileContent){
            echo $fileContent['Body'];
        },$product->file);

    }catch(\Exception $e){
        // Tangani jika terjadi kesalahan saat mengambil URL tanda tangan yang ditandatangani (signed)
        return back()->with('error','Gagal Mengunduh File');
    }

  }

}

