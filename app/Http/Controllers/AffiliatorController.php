<?php

namespace App\Http\Controllers;

use App\Models\Affiliator;
use App\Models\product;
use Aws\s3\S3Client;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class affiliatorController extends Controller
{

    public function index()
    {
        $jdl = 'AFFILIATOR';
        $p = Product::paginate(8);
        $a = Affiliator::all();
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

        return  view('affiliator.index', ['product' => $p, 'affiliator' => $a, 'jdl' => $jdl, 'imageUrls' => $imageUrls]);
    }

    public function tambah()
    {
        $jdl = 'Tambah Affiliator';
        $p = product::all();
        return view('affiliator.tambah', ['product' => $p, 'jdl' => $jdl]);
    }

    public  function asave(Request $request)
    {
        $this->validate(
            $request,
            [
                'nama' => 'required',
                'gambar' => 'mimes:jpg,jpeg,png,gif|max:2048|required'
            ],
            [
                'nama.required' => 'Nama Produk Harus Diisi!',
                'gambar.required' => 'Gambar Produk Harus Diisi!',
                'gambar.mimes' => 'gambar  Yang  Di Upload  Bukan Gambar!',
                'gambar.max' => 'Ukuran Gambar Produk  Tidak Boleh Melebihi dari 2 MB!'
            ]
        );

        $data =  [
            'nama' =>  $request->nama,
            'produk_id' => $request->produk_id,
            'tim' =>  $request->tim,
            'jekel' =>  $request->jekel,
            'akun' =>  $request->akun,
            'usia' =>  $request->usia,
            'alamat' =>  $request->alamat,
            'cp' =>  $request->cp,
            'kategori' =>  $request->kategori,
            'gmv' =>  $request->gmv,
            'komisi' =>  $request->komisi,
            'agency' =>  $request->agency,
            'deskripsi' =>  $request->deskripsi,
            'like' =>  $request->like,
            'followers' =>  $request->followers,
            'viewers' =>  $request->viewers,
        ];

        //cek gambar  yang di upload
        if ($request->hasFile('gambar')) {
            $gmr_aff  = $request->file('gambar');
            $gmr_aff_nama = $gmr_aff->getClientOriginalName();

            //Menyimpan  file  kedalam bucket 'bankcont'  didalam folder /produk
            $gmr_aff->storeAs('affiliator', $gmr_aff_nama, 's3');
        }
        //membuat nama  produk 
        $data['gambar'] = $gmr_aff_nama;

        Affiliator::create($data);

        return redirect('/affiliator')->with('success', 'Tambah Affiliator Berhasil!!');
    }

    public function cilacap($produk_id)
    {
        $jdl = "AFFILIATOR CILACAP";
        //mengambil  data  dari database
        $a = Affiliator::where('produk_id', $produk_id)->get();

        //Konfigurasi Kredensial AWS
        $config = [
            'region' => 'ap-southeast-1',
            'version' => 'latest',
            'credentials' => [
                'key' =>  'AKIAZI2LDMSP6E5M4TFK',
                'secret' =>  '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',
            ],
        ];

        $s3 = new S3Client($config);

        $bucketName = 'bankcont';
        $folderName = 'affiliator/';

        $imageUrls =  [];

        foreach ($a as $affiliator) {
            $fileName =  $affiliator->gambar;

            $imageUrl = $s3->getObjectUrl($bucketName, $folderName . $fileName);

            if ($imageUrl) {
                $imageUrls[$affiliator->id] = $imageUrl;
            }
        }

        return view('affiliator.cilacap.index', ['jdl' => $jdl, 'affiliator' => $a, 'produk_id' => $produk_id, 'imageUrls' => $imageUrls]);
    }

    public function purwokerto($produk_id)
    {
        $jdl = "AFFILIATOR PURWOKERTO";
        //mengambil  data  dari database
        $a = Affiliator::where('produk_id', $produk_id)->get();

        //Konfigurasi Kredensial AWS
        $config = [
            'region' => 'ap-southeast-1',
            'version' => 'latest',
            'credentials' => [
                'key' =>  'AKIAZI2LDMSP6E5M4TFK',
                'secret' =>  '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',
            ],
        ];

        $s3 = new S3Client($config);

        $bucketName = 'bankcont';
        $folderName = 'affiliator/';

        $imageUrls =  [];

        foreach ($a as $affiliator) {
            $fileName =  $affiliator->gambar;

            $imageUrl = $s3->getObjectUrl($bucketName, $folderName . $fileName);

            if ($imageUrl) {
                $imageUrls[$affiliator->id] = $imageUrl;
            }
        }

        return view('affiliator.purwokerto.index', ['jdl' => $jdl, 'affiliator' => $a, 'produk_id' => $produk_id, 'imageUrls' => $imageUrls]);
    }

    public function adetail($id)
    {
        $jdl = 'Detail Affiliator';
        $a = Affiliator::findOrFail($id);

        if (!$a) {
            return redirect()->back()->with('error', 'Affiliator not found');
        }

        $config = [
            'region' => 'ap-southeast-1',
            'version' => 'latest',
            'credentials' => [
                'key' =>  'AKIAZI2LDMSP6E5M4TFK',
                'secret' =>  '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',
            ],
        ];

        $s3 = new S3Client($config);

        $bucketName = 'bankcont';
        $folderName = 'affiliator/';

        $imageUrls =  [];

        // Remove foreach loop as $a is already a single Affiliator object
        $fileName =  $a->gambar;
        $imageUrl = $s3->getObjectUrl($bucketName, $folderName . $fileName);

        if ($imageUrl) {
            $imageUrls[$a->id] = $imageUrl;
        }

        return view('affiliator.detail', ['affiliator' => $a, 'jdl' => $jdl, 'imageUrls' => $imageUrls]);
    }

    public function edit($id)
    {
        $jdl = 'Edit Affiliator';
        $affiliator = Affiliator::findOrFail($id);
        $p = product::all();
        return view('affiliator.edit', ['product' => $p, 'affiliator' => $affiliator, 'jdl' => $jdl]);
    }

    public function edit_store($id, Request $request)
    {
        $this->validate(
            $request,
            [
                'produk_id' => 'required',
                'nama' => 'required',
                'jekel' => 'required',
                'akun' => 'required',
                'usia' => 'required',
                'alamat' => 'required',
                'cp' => 'required',
                'kategori' => 'required',
                'gmv' => 'required',
                'komisi' => 'required',
                'agency' => 'required',
                'deskripsi' => 'required',
                'like' => 'required',
                'followers' => 'required',
                'viewers' => 'required',
            ],
            [
                'produk_id' => 'produk product Harus Diisi!',
                'nama.required' => 'Judul product Harus Diisi!',
                'tim.required' => 'tim product Harus Diisi!',
                'jekel' => 'jekel product Harus Diisi!',
                'akun.required' => 'akun product Harus Diisi!',
                'usia.required' => 'usia product Harus Diisi!',
                'alamat' => 'alamat product Harus Diisi!',
                'cp.required' => 'kontak person product Harus Diisi!',
                'kategori.required' => 'kategori product Harus Diisi!',
                'gmv' => 'pendapatan product Harus Diisi!',
                'komisi.required' => 'komisi product Harus Diisi!',
                'agency.required' => 'agency product Harus Diisi!',
                'deskripsi.required' => 'deskripsi product Harus Diisi!',
                'like.required' => 'like product Harus Diisi!',
                'followers' => 'followers product Harus Diisi!',
                'viewers.required' => 'viewers product Harus Diisi!',
            ]
        );

        $data_edit = Affiliator::find($id);
        $data_edit->produk_id  = $request->produk_id;
        $data_edit->nama = $request->nama;
        $data_edit->tim = $request->tim;
        $data_edit->jekel  = $request->jekel;
        $data_edit->akun = $request->akun;
        $data_edit->usia = $request->usia;
        $data_edit->alamat  = $request->alamat;
        $data_edit->cp = $request->cp;
        $data_edit->kategori = $request->kategori;
        $data_edit->gmv  = $request->gmv;
        $data_edit->komisi = $request->komisi;
        $data_edit->agency = $request->agency;
        $data_edit->deskripsi  = $request->deskripsi;
        $data_edit->like = $request->like;
        $data_edit->followers = $request->followers;
        $data_edit->viewers = $request->viewers;

        // if ($request->hasFile('gambar')) {
        //     $gmr_aff = $request->file('gambar');
        //     $gmr_aff_nama = $gmr_aff->getClientOriginalName();

        //     // menyimpan file ke dalam bucket 'bankcont' di dalam folder /produk
        //     $gmr_aff->storeAs('affiliator', $gmr_aff_nama, 's3');

        //     // memperbarui nama gambar pada data
        //     $data_edit->gambar = $gmr_aff_nama;
        // }

        // // menyimpan perubahan pada data affiliator
        // $data_edit->save();

        if ($request->hasFile('gambar')) {
            $gmr_aff = $request->file('gambar');
            $gmr_aff_nama = $gmr_aff->getClientOriginalName();

            // Check if there is an existing image
            if ($data_edit->gambar) {
                // Delete the existing image from S3
                Storage::disk('s3')->delete('affiliator/' . $data_edit->gambar);
            }

            // Store the new image in the S3 bucket
            $gmr_aff->storeAs('affiliator', $gmr_aff_nama, 's3');

            // Update the image name in the data
            $data_edit->gambar = $gmr_aff_nama;
        }

        // Save the changes to the database
        $data_edit->save();

        return redirect()->back()->with('success', 'Edit Affiliator Berhasil!!');
    }

    public function destroy_affiliator($id)
    {

        $affiliator = affiliator::find($id);

        if ($affiliator) {
            // Jika konten memiliki gambar, hapus gambar dari penyimpanan AWS S3
            if ($affiliator->gambar) {
                Storage::disk('s3')->delete('affiliator/' . $affiliator->gambar);
            }

            // Hapus konten dari database
            $affiliator->delete();

            return redirect()->back()->with('success', 'Konten berhasil dihapus.');
        }

        return redirect()->back()->with('error', 'Konten tidak ditemukan.');
    }
}
