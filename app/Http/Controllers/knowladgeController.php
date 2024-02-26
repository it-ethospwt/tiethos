<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\Knowladge;
use Aws\S3\S3Client;
use DOMDocument;
use Illuminate\Http\Request;

class knowladgeController extends Controller
{
    //TAMPIL KNOWLADGE 
    public function  index()
    {
        $jdl = "Bank Knowladge";

        //Ambil data  produk  dari tabel  knowladge yang memili  dengan produk 
        $data =  knowladge::with('product')->paginate(2);

        return view('knowladge.v_index', ['jdl' => $jdl, 'data' => $data]);
    }

    //TAMBAH KNOWLADGE & PROSES TAMBAH KNOWLADGE
    public function tambah_knowladge()
    {
        $jdl = "Tambah  Knowladge";
        $product = product::all();

        return view('knowladge.v_tambah', ['jdl' => $jdl, 'product' => $product]);
    }

    public function store_knowladge(Request $request)
    {
        $this->validate(
            $request,
            [
                'product_id' => 'required|exists:product,id',
                'deskripsi' => 'required|string'
            ],
            [
                'deskripsi.required' => 'Deskripi Wajib Diisi'
            ]
        );

        $deskripsi = $request->deskripsi;
        $dom = new DOMDocument();
        $dom->loadHTML($deskripsi, 9);

        $deskripsi = $dom->saveHTML();

        Knowladge::create([
            'product_id' => $request->product_id,
            'nm_product' => $request->product_id,
            'deskripsi' => $deskripsi
        ]);

        return  redirect('/knowladge')->with('success', 'Tambah Knowladge Berhasil!!');
    }

    //DETAIL KNOWLADGE
    public function show_knowladge($id)
    {
        $jdl  = "Detail Knowladge";
        $data = Knowladge::find($id);

        return view('knowladge.v_show', ['jdl' => $jdl, 'data' => $data]);
    }


    //EDIT KNOWLADGE & PROSES EDIT KNOWLADGE
    public  function edit_knowladge($id)
    {
        $jdl = "Edit Knowladge";

        $data = Knowladge::find($id);

        return view('knowladge.v_edit', ['jdl' => $jdl, 'data' => $data]);
    }

    public function store_edit_knowladge($id, Request $request)
    {
        $this->validate(
            $request,
            [
                'deskripsi' => 'required|string'
            ],
            [
                'deskripsi.required' => 'Deskripi Wajib Diisi'
            ]
        );

        $data_edit = Knowladge::find($id);

        //Membuat  Object Dom  Document
        $dom = new DOMDocument();
        //Memuat Content HTML dari deskripsi
        $dom->loadHTML($request->deskripsi);

        // Simpan kembali konten HTML yang diperbarui
        $data_edit->deskripsi = $dom->saveHTML();

        //Simpan kembali ke database
        $data_edit->save();

        return  redirect('/knowladge')->with('success', "Update Knowladge Berhasil!!");
    }
}
