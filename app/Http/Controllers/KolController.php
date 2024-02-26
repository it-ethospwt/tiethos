<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\Kol;
use Aws\s3\S3Client;

class KolController extends Controller
{
    public function index()
    {
        $jdl = 'Content KOL';
        $produk = product::all();
        $kol = Kol::all();
        return view('kol.index', compact('jdl', 'produk', 'kol'));
    }

    public function tambahKOL()
    {
        $jdl = 'Tambah Content KOL';
        $produk = product::all();
        return view('kol.tambah', compact('jdl', 'produk'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate(
            $request,
            [
                'nama' => 'required',
                'tanggal_tayang' => 'required',
                'rate_card' => 'required',
                'id_produk' => 'required',
                'owning' => 'required',
                'user' => 'required',
                'transfer' => 'required',
                'gambar' => 'nullable|mimes:jpg,jpeg,png,gif|max:2048',
                'video' => 'nullable|mimes:mp4,mov,aviv'
            ],
            [
                'gambar.max' => 'Ukuran Gambar Produk  Tidak Boleh Melebihi dari 2 MB!',
            ]
        );

        $data =  [
            'nama' =>  $request->nama,
            'tanggal_tayang' =>  $request->tanggal_tayang,
            'owning' =>  $request->owning,
            'rate_card' =>  $request->rate_card,
            'transfer' =>  $request->transfer,
            'resi' =>  $request->resi,
            'ekspedisi' =>  $request->ekspedisi,
            'id_produk' =>  $request->id_produk,
            'user' =>  $request->user,
            'gambar' =>  $request->gambar,
            'video' =>  $request->video
        ];

        // Proses unggah gambar
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambar_nama = $gambar->getClientOriginalName();
            $gambar_path = $gambar->storeAs('kol', $gambar_nama, 's3');
            $data['gambar'] = $gambar_path;
        }

        // Proses unggah video
        if ($request->hasFile('video')) {
            $video = $request->file('video');
            $video_nama = $video->getClientOriginalName();
            $video_path = $video->storeAs('kol', $video_nama, 's3');
            $data['video'] = $video_path;
        }

        Kol::create($data);

        return redirect()->route('kol')->with('success', 'KOL Berhasil Ditambahkan');
    }

    public function detail($id)
    {
        $jdl = 'Detail KOL';

        // Mencari data KOL dengan ID yang diberikan
        $kol = Kol::findOrFail($id);

        // Jika record ditemukan, lanjutkan
        if ($kol) {
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
            $folderName = 'kol/';

            // Mendapatkan nama file dari field 'file' dalam record product 
            $fileName =  $kol->gambar;

            // Mendapatkan URL gambar dari AWS S3 jika file tersebut ada
            $imageUrl = $s3->getObjectUrl($bucketName, $folderName . $fileName);

            // Jika URL gambar tersedia, tambahkan ke dalam array
            $imageUrls[$kol->id] = $imageUrl;

            return view('kol.detail', ['kol' => $kol, 'jdl' => $jdl, 'imageUrls' => $imageUrls]);
        } else {
            // Jika record tidak ditemukan, redirect atau tampilkan pesan error
            return redirect()->back()->with('error', 'Data KOL tidak ditemukan.');
        }
    }



    public function uploadGambar(Request $request, $id)
    {
        // Validasi request, pastikan file gambar ada dan valid
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240',
        ], [
            'gambar.required' => 'Gambar KOL Harus Diisi!',
            'gambar.mimes' => 'File  Yang  Di Upload  Bukan Gambar!',
            'gambar.max' => 'Ukuran Gambar KOL Tidak Boleh Melebihi dari 10 MB!'
        ]);

        // Cek apakah ada file gambar yang diunggah
        if ($request->hasFile('gambar')) {
            // Ambil file gambar dari request
            $gambar = $request->file('gambar');
            // Buat nama unik untuk gambar
            $gambar_nama = time() . '_' . $gambar->getClientOriginalName();

            // Simpan gambar ke dalam bucket 'bankcont' didalam folder /produk
            $gambar->storeAs('kol', $gambar_nama, 's3');

            // Simpan nama gambar ke dalam database
            $kol = Kol::findOrFail($id);
            $kol->gambar = $gambar_nama;
            $kol->save();
        }

        // Redirect atau kirim respons balik
        return redirect()->back()->with('success', 'Gambar berhasil diupload.');
    }

    public function uploadVideo(Request $request, $id)
    {
        // Validasi request, pastikan file video ada dan valid
        $request->validate([
            'video' => 'required|mimes:mp4,mov,avi|max:512000',
        ], [
            'video.required' => 'Video KOL Harus Diisi!',
            'video.mimes' => 'File  Yang  Di Upload  Bukan Video!',
            'video.max' => 'Ukuran Video KOL  Tidak Boleh Melebihi dari 500 MB!'
        ]);

        // Proses unggah video
        if ($request->hasFile('video')) {
            $video = $request->file('video');
            $video_nama = $video->getClientOriginalName();
            $video_path = $video->storeAs('kol', $video_nama, 's3');
            $data['video'] = $video_path;
        }

        // Redirect atau kirim respons balik
        return redirect()->back()->with('success', 'Video berhasil diupload.');
    }

    public function delete($id)
    {
        $kol = Kol::findOrFail($id);
        $kol->delete();

        return redirect()->route('kol')->with('success', 'User deleted successfully');
    }
}
