<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\Wa;
use App\Models\Web;
use Illuminate\Http\Request;

class handbookController extends Controller
{

    public function index()
    {
        $jdl = 'HANDBOOK';
        $p = product::all();
        return  view('handbook.index', ['product' => $p, 'jdl' => $jdl]);
    }

    // punya wa
    public function wa($product_id)
    {
        $jdl = 'HANDBOOK INTERAKSI WHATSAPP';
        $w = Wa::where('product_id', $product_id)->get();

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

        return redirect('/handbook')->with('success', 'Tambah Produk Berhasil!!');
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

        return redirect('/handbook')->with('success', 'Tambah Produk Berhasil!!');
    }

    public function lengkap($web_id)
    {
        $jdl = 'DETAIL HANDBOOK KONVERSI WEB';
        $wb = Web::findOrFail($web_id);
        return  view('handbook.web.detail', ['web' => $wb, 'jdl' => $jdl]);
    }
}
