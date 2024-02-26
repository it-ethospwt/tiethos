<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\Wa;
use App\Models\Web;
use Aws\s3\S3Client;
use Illuminate\Http\Request;

class handbookController extends Controller
{

    public function index()
    {
        $jdl = 'HANDBOOK';
        $p = product::all();
        $p = Product::paginate(8);
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
        foreach ($p as $product) {
            //Mendapatkan nama file dari field 'file' dalam  record product 
            $fileName =  $product->file;

            //mendapatkan URL gambar dari AWS S3 jika file tersebut ada
            $imageUrl = $s3->getObjectUrl($bucketName, $folderName . $fileName);

            //Menambahkan  URL  gambar  kedalam  array jika URL tersedia
            if ($imageUrl) {
                $imageUrls[$product->id] = $imageUrl;
            }
        }

        return  view('handbook.index', ['product' => $p, 'jdl' => $jdl, 'imageUrls' => $imageUrls]);
    }

    // punya wa
    public function wa($product_id)
    {
        $jdl = 'HANDBOOK INTERAKSI WHATSAPP';
        $w = Wa::where('product_id', $product_id)->get();
        // $w = Wa::paginate(8);
        return view('handbook.wa.index', ['wa' => $w, 'product_id' => $product_id, 'jdl' => $jdl]);
    }

    public function tambah()
    {
        $jdl = 'TAMBAH HANDBOOK INTERAKSI WHATSAPP';
        $p = product::all();
        return view('handbook.wa.tambah', ['product' => $p, 'jdl' => $jdl]);
    }

    public function saveWa(Request $request)
    {
        $this->validate(
            $request,
            [
                'gambar' => 'mimes:jpg,jpeg,png,gif|max:2048|required',
            ],
            [
                'gambar' => 'Ukuran Gambar Produk Tidak Boleh Melebihi dari 2 MB!',
            ]
        );

        $data =  [
            'product_id' => $request->product_id,
            'sub' => $request->sub,
            'deskripsi' => $request->deskripsi,
        ];

        // cek gambar yang diupload
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambar_nama = $gambar->hashName();
            // hashName() menghasilkan string unik/random jika menggunakan nama Asli menggunakan getClientOriginalName() 
            $gambar->move(public_path('public_imgTest'), $gambar_nama);

            // membuat nama produk 
            $data['gambar'] = $gambar_nama;
        }

        Wa::create($data);

        return redirect('/handbook')->with('success', 'Tambah Handbook Interaksi Berhasil!!');
    }

    public function detail($wa_id)
    {
        $jdl = 'DETAIL HANDBOOK INTERAKSI WHATSAPP';
        $w = Wa::findOrFail($wa_id);
        return  view('handbook.wa.detail', ['wa' => $w, 'jdl' => $jdl]);
    }

    // punya web

    public function web($product_id)
    {
        $jdl = 'HANDBOOK KONVERSI WEB';
        $wb = Web::where('product_id', $product_id)->get();

        return view('handbook.web.index', ['web' => $wb, 'product_id' => $product_id, 'jdl' => $jdl]);
    }

    public function plus()
    {
        $jdl = 'TAMBAH HANDBOOK KONVERSI WEB';
        $p = product::all();
        return view('handbook.web.tambah', ['product' => $p, 'jdl' => $jdl]);
    }

    public function saveWeb(Request $request)
    {
        $this->validate(
            $request,
            [
                'gambar' => 'mimes:jpg,jpeg,png,gif|max:2048|required',
            ],
            [
                'gambar' => 'Ukuran Gambar Produk Tidak Boleh Melebihi dari 2 MB!',
            ]
        );

        $data =  [
            'product_id' => $request->product_id,
            'sub' => $request->sub,
            'deskripsi' => $request->deskripsi,
        ];

        // cek gambar yang diupload
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambar_nama = $gambar->hashName();
            // hashName() menghasilkan string unik/random jika menggunakan nama Asli menggunakan getClientOriginalName() 
            $gambar->move(public_path('public_imgTest'), $gambar_nama);

            // membuat nama produk 
            $data['gambar'] = $gambar_nama;
        }

        Web::create($data);

        return redirect('/handbook')->with('success', 'Tambah Handbook Konversi Web Berhasil!!');
    }

    public function lengkap($web_id)
    {
        $jdl = 'DETAIL HANDBOOK KONVERSI WEB';
        $wb = Web::findOrFail($web_id);
        return  view('handbook.web.detail', ['web' => $wb, 'jdl' => $jdl]);
    }
}
