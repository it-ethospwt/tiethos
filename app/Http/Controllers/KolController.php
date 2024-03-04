<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\Kol;
use App\Models\FileKol;
use Aws\s3\S3Client;
use Illuminate\Support\Facades\Storage;

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
        ];

        Kol::create($data);

        return redirect()->route('kol')->with('success', 'KOL Berhasil Ditambahkan');
    }

    public function detail($id)
    {
        $jdl = 'Detail KOL';

        // Dapatkan detail Kol dengan ID yang diberikan
        $kol = Kol::findOrFail($id);

        // Dapatkan daftar FileKol yang terkait dengan Kol tersebut
        $filekols = FileKol::where('kol_id', $id)->get();



        $config = [
            'region' => 'ap-southeast-1',
            'version' => 'latest',
            'credentials' => [
                'key' =>  'AKIAZI2LDMSP6E5M4TFK',
                'secret' =>  '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',
            ],
        ];

        // Membuat instansiasi  s3
        $s3 = new S3Client($config);

        // Nama Bucket dan Folder
        $bucketName = 'bankcont';

        // Array untuk menyimpan gambar dan video
        $imageUrls = [];
        $videoUrls = [];

        foreach ($filekols as $filekol) {
            $gambarFileName =  $filekol->gambar;
            $videoFileName =  $filekol->video;

            $gambarExtension = pathinfo($gambarFileName, PATHINFO_EXTENSION);

            if (in_array($gambarExtension, ['jpg', 'jpeg', 'png'])) {
                $gambarFolderName = 'kol/gambar/';
                $imageUrl = $s3->getObjectUrl($bucketName, $gambarFolderName . $gambarFileName);
                if ($imageUrl) {
                    $imageUrls[$filekol->id] = $imageUrl;
                }
            }

            $videoExtension = pathinfo($videoFileName, PATHINFO_EXTENSION);

            if (in_array($videoExtension, ['mp4', 'avi'])) {
                $videoFolderName = 'kol/video/';
                $videoUrl = $s3->getObjectUrl($bucketName, $videoFolderName . $videoFileName);
                if ($videoUrl) {
                    $videoUrls[$filekol->id] = $videoUrl;
                }
            }
        }

        return view('kol.detail', ['kol' => $kol, 'jdl' => $jdl, 'filekols' => $filekols, 'imageUrls' => $imageUrls, 'videoUrls' => $videoUrls]);
    }



    public function uploadGambar(Request $request)
    {

        $this->validate(
            $request,
            [
                'gambar' => 'mimes:jpg,jpeg,png,gif|max:2048|required',
            ],
            [
                'gambar' => 'Ukuran Gambar product Tidak Boleh Melebihi dari 2 MB!',
            ]
        );

        $data =  [
            'kol_id' => $request->kol_id,
        ];

        // cek gambar yang diupload
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambar_nama = $gambar->getClientOriginalName();
            // hashName() menghasilkan string unik/random jika menggunakan nama Asli menggunakan getClientOriginalName() 
            $gambar->storeAs('kol/gambar', $gambar_nama, 's3');

            // membuat nama product 
            $data['gambar'] = $gambar_nama;
        }

        FileKol::create($data);

        // Redirect atau kirim respons balik
        return redirect()->back()->with('success', 'Gambar berhasil diupload.');
    }

    public function uploadVideo(Request $request)
    {
        // Validasi request, pastikan file video ada dan valid
        $request->validate([
            'video' => 'required|mimes:mp4,mov,avi|max:512000',
        ], [
            'video.required' => 'Video KOL Harus Diisi!',
            'video.mimes' => 'File  Yang  Di Upload  Bukan Video!',
            'video.max' => 'Ukuran Video KOL  Tidak Boleh Melebihi dari 500 MB!'
        ]);
        $data =  [
            'kol_id' => $request->kol_id,
        ];

        if ($request->hasFile('video')) {
            $video = $request->file('video');
            $video_nama = $video->getClientOriginalName();
            // hashName() menghasilkan string unik/random jika menggunakan nama Asli menggunakan getClientOriginalName() 
            $video->storeAs('kol/video', $video_nama, 's3');

            // membuat nama product 
            $data['video'] = $video_nama;
        }

        FileKol::create($data);

        // Redirect atau kirim respons balik
        return redirect()->back()->with('success', 'Video berhasil diupload.');
    }

    public function edit_kol($id)
    {
        $jdl = 'Edit Kol';
        $kol = Kol::findOrFail($id);
        $produk = product::all();
        return view('kol.edit', ['product' => $produk, 'kol' => $kol, 'jdl' => $jdl]);
    }

    public function edit_store_kol($id, Request $request)
    {
        $this->validate(

            $request,
            [
                'nama' => 'required',
                'tanggal_tayang' => 'required',
                'owning' => 'required',
                'rate_card' => 'required',
                'transfer' => 'required',
                'resi' => 'required',
                'ekspedisi' => 'required',
                'id_produk' => 'required',
                'user' => 'required',
            ],
            [
                'nama' => 'Nama Kol Harus Diisi!',
                'tanggal_tayang' => 'Tanggal Tayang Kol Harus Diisi!',
                'owning' => 'Owning Kol Harus Diisi!',
                'rate_card' => 'rate Card Kol Harus Diisi!',
                'transfer' => 'Transfer Kol Harus Diisi!',
                'resi' => 'Resi Kol Harus Diisi!',
                'ekspedisi' => 'Ekspedisi Kol Harus Diisi!',
                'id_produk' => 'Produk Kol Harus Diisi!',
                'user' => 'User Kol Harus Diisi!',
            ]
        );

        $data_edit = Kol::find($id);
        $data_edit->nama  = $request->nama;
        $data_edit->tanggal_tayang = $request->tanggal_tayang;
        $data_edit->owning = $request->owning;
        $data_edit->rate_card  = $request->rate_card;
        $data_edit->transfer = $request->transfer;
        $data_edit->resi = $request->resi;
        $data_edit->ekspedisi  = $request->ekspedisi;
        $data_edit->id_produk = $request->id_produk;
        $data_edit->user = $request->user;

        $data_edit->save();

        return redirect()->back()->with('success', 'Edit Handbook Konversi Web Berhasil!!');
    }

    public function destroy_kol($id)
    {
        $kol = Kol::findOrFail($id);
        $kol->delete();

        return redirect()->route('kol')->with('success', 'User deleted successfully');
    }

    public function destroy_content($id)
    {
        $data = FileKol::find($id);

        if ($data) {
            // Jika konten memiliki gambar, hapus gambar dari penyimpanan AWS S3
            if ($data->gambar) {
                Storage::disk('s3')->delete('kol/gambar/' . $data->gambar);
            }

            // Jika konten memiliki video, hapus video dari penyimpanan AWS S3
            if ($data->video) {
                Storage::disk('s3')->delete('kol/video/' . $data->video);
            }

            // Hapus konten dari database
            $data->delete();

            return redirect()->back()->with('success', 'Konten berhasil dihapus.');
        }

        return redirect()->back()->with('error', 'Konten tidak ditemukan.');
    }

    public function download_konten($id)
    {
        // Mendapatkan informasi produk berdasarkan id
        $data = FileKol::find($id);

        // Konfigurasi kredensial AWS
        $config = [
            'region' => 'ap-southeast-1',
            'version' => 'latest',
            'credentials' => [
                'key' => 'AKIAZI2LDMSP6E5M4TFK',
                'secret' => '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'
            ]
        ];

        // Membuat instanisasi S3
        $s3 = new S3Client($config);

        // Nama bucket S3
        $bucketName = 'bankcont';

        // Menentukan object key berdasarkan jenis konten
        if ($data->gambar) {
            $objectKey = 'kol/gambar/' . $data->gambar;
        } elseif ($data->video) {
            $objectKey = 'kol/video/' . $data->video;
        } else {
            return back()->with('error', 'kol tidak ditemukan');
        }

        // Mencoba untuk mendapatkan konten dari S3
        try {
            $fileContent = $s3->getObject([
                'Bucket' => $bucketName,
                'Key'   =>  $objectKey
            ]);

            // Mengembalikan file langsung sebagai unduhan
            return response()->streamDownload(function () use ($fileContent) {
                echo $fileContent['Body'];
            }, $data->gambar ?: $data->video); // Menggunakan nama file gambar atau video sebagai nama unduhan
        } catch (\Exception $e) {
            // Tangani jika terjadi kesalahan saat mengambil konten dari S3
            return back()->with('error', 'Gagal mengunduh file');
        }
    }
}
