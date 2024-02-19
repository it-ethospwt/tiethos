<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\keluhan;
use App\Models\faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $jdl = 'FAQ';
        $produk = product::all();
        $keluhan = keluhan::all();
        return view('faq.index', compact('produk', 'jdl', 'keluhan'));
    }

    public function tambahKeluhan()
    {
        $jdl = 'Tambah Keluhan';
        $produk = product::all();
        return view('faq.tambahKeluhan', compact('produk', 'jdl'));
    }

    public function keluhanStore(Request $request)
    {
        $keluhan = new Keluhan();
        $keluhan->nama = $request->nama;
        $keluhan->id_produk = $request->id_produk;
        $keluhan->save();

        return redirect()->route('faq')->with('success', 'Keluhan Berhasil Ditambahkan');
    }

    public function faqIndex($id)
    {
        $jdl = 'FAQ Detail';
        // $produk = Product::findOrFail($id);
        // $keluhan = Keluhan::where('id_produk', $id)->get(); // Cari semua keluhan yang terkait dengan produk

        $faq = FAQ::where('id_keluhan', $id)->get();
        $produk = product::all();
        $keluhan = keluhan::all();
        return view('faq.faqIndex', compact('produk', 'jdl', 'keluhan', 'faq'));
    }

    public function tambahFaqDetail()
    {
        $jdl = 'Tambah FAQ Detail';
        $produk = Product::all();
        $keluhan = keluhan::all();
        return view('faq.tambahFaqDetail', compact('jdl', 'produk', 'keluhan'));
    }

    public function getKeluhan($id)
    {
        // Ambil daftar keluhan berdasarkan id_produk
        $keluhan = Keluhan::where('id_produk', $id)->get();

        // Kembalikan daftar keluhan dalam format JSON
        return response()->json($keluhan);
    }

    public function storeFaq(Request $request)
    {
        // Validasi data
        $request->validate([
            'produk' => 'required', // Sesuaikan dengan aturan validasi Anda
            'keluhan' => 'required',
            'pertanyaan' => 'required',
            'jawaban' => 'required',
        ]);

        // Simpan data ke dalam tabel faqs
        $faq = new Faq();
        $faq->id_produk = $request->produk;
        $faq->id_keluhan = $request->keluhan;
        $faq->pertanyaan = $request->pertanyaan;
        $faq->jawaban = $request->jawaban;
        $faq->save();

        // Redirect pengguna kembali ke halaman yang diinginkan
        return redirect()->route('faq')->with('success', 'FAQ telah berhasil ditambahkan.');
    }
}
