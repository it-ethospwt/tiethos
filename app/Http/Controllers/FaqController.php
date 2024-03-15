<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\keluhan;
use App\Models\faq;
use Aws\s3\S3Client;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $jdl = 'FAQ';
        $produk = product::all();
        $keluhan = keluhan::all();
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
        foreach ($produk as $product) {
            //Mendapatkan nama file dari field 'file' dalam  record product 
            $fileName =  $product->file;

            //mendapatkan URL gambar dari AWS S3 jika file tersebut ada
            $imageUrl = $s3->getObjectUrl($bucketName, $folderName . $fileName);

            //Menambahkan  URL  gambar  kedalam  array jika URL tersedia
            if ($imageUrl) {
                $imageUrls[$product->id] = $imageUrl;
            }
        }

        return view('faq.index', compact('produk', 'jdl', 'keluhan', 'imageUrls'));
    }

    public function tambahKeluhan()
    {
        $jdl = 'Tambah Keluhan';
        $produk = product::all();
        return view('faq.tambahKeluhan', compact('produk', 'jdl'));
    }

    public function keluhanStore(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255'
        ], [
            'nama.required' => 'Nama Keluhan field is required.'
        ]);

        try {
            // Simpan data jika validasi berhasil
            $keluhan = new Keluhan();
            $keluhan->nama = $request->nama;
            $keluhan->id_produk = $request->id_produk; // Pastikan id_produk tersedia di request
            $keluhan->save();

            // Redirect dengan pesan sukses
            return redirect()->route('faq')->with('success', 'Keluhan Berhasil Ditambahkan');
        } catch (\Exception $e) {
            // Tangani jika terjadi kesalahan saat menyimpan
            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan keluhan. Silakan coba lagi.');
        }
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
        $request->validate([
            'produk' => 'required',
            'keluhan' => 'required',
            'pertanyaan' => 'required',
            'jawaban' => 'required',
        ], [
            'produk.required' => 'Produk field is required.',
            'keluhan.required' => 'Keluhan field is required.',
            'pertanyaan.required' => 'Pertanyaan field is required.',
            'jawaban.required' => 'Jawaban field is required.',
        ]);

        try {
            // Simpan data ke dalam tabel faqs jika validasi berhasil
            $faq = new Faq();
            $faq->id_produk = $request->produk;
            $faq->id_keluhan = $request->keluhan;
            $faq->pertanyaan = $request->pertanyaan;
            $faq->jawaban = $request->jawaban;
            $faq->save();

            // Redirect pengguna kembali ke halaman yang diinginkan dengan pesan sukses
            return redirect()->route('faq')->with('success', 'FAQ telah berhasil ditambahkan.');
        } catch (\Exception $e) {
            // Tangani jika terjadi kesalahan saat menyimpan
            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan FAQ. Silakan coba lagi.');
        }
    }

    public function listFAQ()
    {
        $jdl = 'List FAQ & Keluhan';
        $faq = faq::all();
        $keluhan = keluhan::all();

        return view('faq.listFaq', compact('faq', 'jdl', 'keluhan'));
    }

    public function keluhan_delete($id)
    {
        $keluhan = keluhan::findOrFail($id);
        $keluhan->delete();

        return redirect()->route('listFaq')->with('success', 'Keluhan deleted successfully');
    }

    public function faq_delete($id)
    {
        $faq = faq::findOrFail($id);
        $faq->delete();

        return redirect()->route('listFaq')->with('success', 'FAQ deleted successfully');
    }
}
