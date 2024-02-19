<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\Knowladge;
use Aws\S3\S3Client;
use DOMDocument;
use Illuminate\Http\Request;

class knowladgeController extends Controller
{
    //TAMPIL KNOWLADGE & PROSES TAMBAH KNOWLADGE
    public function  index()
    {
        $jdl = "Bank Knowladge";
        $data =  knowladge::paginate(10);

        //konfigurasi  kredensial AWS
        $config = [
            'region' => 'ap-southeast-1',
            'version' => 'latest',
            'credentials' => [
                'key' => 'AKIAZI2LDMSP6E5M4TFK',
                'secret' => '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'
            ]
        ];

        //membuat instanisasi
        $s3 = new S3Client($config);
        
        //nama  bucket & folder
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

        return view('knowladge.v_index',['jdl' => $jdl, 'data' => $data,'imageUrls' => $imageUrls]);
    }

    public function tambah_knowladge(){
        $jdl = "Tambah  Knowladge";
        $product = product::all(); 
    
        return view('knowladge.v_tambah',['jdl'=> $jdl,'product'=> $product]);
    }

    public function store_knowladge(Request $request){
        $this->validate($request,[
            'product_id' => 'required|exists:product,id',
            'deskripsi' => 'required|string'
            ],[
                'deskripsi.required' => 'Deskripi Wajib Diisi'
            ]
        );
        
        $deskripsi = $request->deskripsi;
        $dom = new DOMDocument();
        $dom->loadHTML($deskripsi,9);

        $deskripsi = $dom->saveHTML();
        
        Knowladge::create([
            'product_id' => $request->product_id,
            'nm_product' => $request->product_id,
            'deskripsi' => $deskripsi
        ]);

        return  redirect('/knowladge')->with('success','Tambah Knowladge Berhasil!!');
    }

    public function show_knowladge($id){
        $jdl  = "Detail Knowladge";
        $data = Knowladge::find($id);

        return view('knowladge.v_show',['jdl' => $jdl,'data' => $data]);
    }

}
