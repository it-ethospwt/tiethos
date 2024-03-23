<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\Konten;

use Aws\s3\S3Client;
use  Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


use Illuminate\Http\Request;

class kontenController extends Controller
{
    public function index()
    {
        $jdl = 'BANK KONTEN';
        $p = Product::all();
        $k = Konten::all();

        $countKontenByProduk = [];

        foreach ($p as $product) {
            // Menghitung jumlah konten untuk setiap jenis konten berdasarkan produk
            $countKontenByProduk[$product->id]['Agency Luar'] = Konten::where('product_id', $product->id)
                ->where('konten', 'Agency Luar')
                ->count();
            $countKontenByProduk[$product->id]['ccp'] = Konten::where('product_id', $product->id)
                ->where('konten', 'ccp')
                ->count();
            $countKontenByProduk[$product->id]['cwm'] = Konten::where('product_id', $product->id)
                ->where('konten', 'cwm')
                ->count();
        }

        // Sisipkan konfigurasi AWS S3
        $config = [
            'region' => 'ap-southeast-1',
            'version' => 'latest',
            'credentials' => [
                'key' => 'YOUR_ACCESS_KEY',
                'secret' => 'YOUR_SECRET_ACCESS_KEY',
            ],
        ];

        // Buat instance dari S3Client
        $s3 = new S3Client($config);

        $bucketName = 'bankcont';
        $folderName = 'produk/';

        // Array untuk menyimpan URL gambar
        $imageUrls = [];

        // Loop melalui setiap produk
        foreach ($p as $product) {
            $fileName = $product->file;

            // Dapatkan URL gambar dari AWS S3 jika file ada
            $imageUrl = $s3->getObjectUrl($bucketName, $folderName . $fileName);

            // Tambahkan URL gambar ke dalam array jika tersedia
            if ($imageUrl) {
                $imageUrls[$product->id] = $imageUrl;
            }
        }

        return view('konten.index', ['product' => $p, 'contents' => $k, 'jdl' => $jdl, 'imageUrls' => $imageUrls, 'countKontenByProduk' => $countKontenByProduk]);
    }


    public function al($product_id)
    {
        return $this->processContent($product_id, 'KONTEN AGENCY LUAR', 'konten.al');
    }

    public function ccp($product_id)
    {
        return $this->processContent($product_id, 'KONTEN CCP', 'konten.ccp');
    }

    public function ac($product_id)
    {
        return $this->processContent($product_id, 'KONTEN ADV / CWM', 'konten.ac');
    }

    private function processContent($product_id, $title, $view)
    {
        // Ambil konten berdasarkan product_id
        $k = Konten::where('product_id', $product_id)->get();

        $config = [
            'region' => 'ap-southeast-1',
            'version' => 'latest',
            'credentials' => [
                'key' =>  'YOUR_AWS_KEY',
                'secret' =>  'YOUR_AWS_SECRET',
            ],
        ];

        // Membuat instansiasi s3
        $s3 = new S3Client($config);

        // Nama Bucket dan Folder
        $bucketName = 'bankcont';

        // Array untuk menyimpan gambar dan video
        $imageUrls = [];
        $videoUrls = [];

        foreach ($k as $konten) {
            $gambarFileName =  $konten->gambar;
            $videoFileName =  $konten->video;

            $gambarExtension = pathinfo($gambarFileName, PATHINFO_EXTENSION);

            if (in_array($gambarExtension, ['jpg', 'jpeg', 'png'])) {
                $gambarFolderName = 'konten/gambar/';
                $imageUrl = $s3->getObjectUrl($bucketName, $gambarFolderName . $gambarFileName);
                if ($imageUrl) {
                    $imageUrls[$konten->content_id] = $imageUrl;
                }
            }

            $videoExtension = pathinfo($videoFileName, PATHINFO_EXTENSION);

            if (in_array($videoExtension, ['mp4', 'avi'])) {
                $videoFolderName = 'konten/video/';
                $videoUrl = $s3->getObjectUrl($bucketName, $videoFolderName . $videoFileName);
                if ($videoUrl) {
                    $videoUrls[$konten->content_id] = $videoUrl;
                }
            }
        }

        return view($view, [
            'contents' => $k, 'product_id' => $product_id, 'jdl' => $title, 'imageUrls' => $imageUrls, 'videoUrls' => $videoUrls
        ]);
    }


    public function filterByMonth(Request $request, $product_id)
    {
        return $this->processFiltering($request, $product_id, 'KONTEN AGENCY LUAR', 'konten.al');
    }

    public function fbm(Request $request, $product_id)
    {
        return $this->processFiltering($request, $product_id, 'KONTEN CCP', 'konten.ccp');
    }

    public function frbm(Request $request, $product_id)
    {
        return $this->processFiltering($request, $product_id, 'KONTEN ADV/CWM', 'konten.ac');
    }

    private function processFiltering(Request $request, $product_id, $title, $view)
    {
        $month = $request->query('month');

        // Melakukan pencarian konten berdasarkan bulan
        $k = Konten::whereMonth('created_at', $month)->where('product_id', $product_id)->get();

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

        foreach ($k as $konten) {
            $gambarFileName =  $konten->gambar;
            $videoFileName =  $konten->video;

            $gambarExtension = pathinfo($gambarFileName, PATHINFO_EXTENSION);

            if (in_array($gambarExtension, ['jpg', 'jpeg', 'png'])) {
                $gambarFolderName = 'konten/gambar/';
                $imageUrl = $s3->getObjectUrl($bucketName, $gambarFolderName . $gambarFileName);
                if ($imageUrl) {
                    $imageUrls[$konten->content_id] = $imageUrl;
                }
            }

            $videoExtension = pathinfo($videoFileName, PATHINFO_EXTENSION);

            if (in_array($videoExtension, ['mp4', 'avi'])) {
                $videoFolderName = 'konten/video/';
                $videoUrl = $s3->getObjectUrl($bucketName, $videoFolderName . $videoFileName);
                if ($videoUrl) {
                    $videoUrls[$konten->content_id] = $videoUrl;
                }
            }
        }
        // Mengembalikan data dalam bentuk respons JSON
        return view($view, [
            'contents' => $k, 'product_id' => $product_id, 'jdl' => $title, 'imageUrls' => $imageUrls, 'videoUrls' => $videoUrls
        ]);
    }


    public function tambah()
    {
        $jdl = 'TAMBAH KONTEN GAMBAR';
        $p = product::all();
        return view('konten.tambah', ['product' => $p, 'jdl' => $jdl]);
    }
    public function plus()
    {
        $jdl = 'TAMBAH KONTEN VIDEO';
        $p = product::all();
        return view('konten.plus', ['product' => $p, 'jdl' => $jdl]);
    }
    public function save(Request $request)
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
            'product_id' => $request->product_id,
            'title' => $request->title,
            'konten' => $request->konten,
        ];

        // cek gambar yang diupload
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambar_nama = $gambar->getClientOriginalName();
            // hashName() menghasilkan string unik/random jika menggunakan nama Asli menggunakan getClientOriginalName() 
            $gambar->storeAs('konten/gambar', $gambar_nama, 's3');

            // membuat nama product 
            $data['gambar'] = $gambar_nama;
        }

        Konten::create($data);

        return redirect('/konten')->with('success', 'Tambah product Berhasil!!');
    }

    public function toko(Request $request)
    {
        $this->validate(
            $request,
            [
                'video' => 'mimes:mp4,mov,avi|max:20480|required', // Validasi untuk video
            ],
            [
                'video' => 'Ukuran Video product Tidak Boleh Melebihi dari 20 MB!', // Pesan validasi untuk video
            ]
        );

        $data =  [
            'product_id' => $request->product_id,
            'title' => $request->title,
            'konten' => $request->konten,
        ];

        // cek gambar yang diupload
        if ($request->hasFile('video')) {
            $video = $request->file('video');
            $video_nama = $video->getClientOriginalName();
            // hashName() menghasilkan string unik/random jika menggunakan nama Asli menggunakan getClientOriginalName() 
            $video->storeAs('konten/video', $video_nama, 's3');

            // membuat nama product 
            $data['video'] = $video_nama;
        }

        Konten::create($data);

        return redirect('/konten')->with('success', 'Tambah product Berhasil!!');
    }


    public function edit($content_id)
    {
        $jdl = 'EDIT KONTEN GAMBAR';
        $konten = Konten::findOrFail($content_id);
        $p = product::all();
        return view('konten.edit', ['product' => $p, 'contents' => $konten, 'jdl' => $jdl]);
    }

    public  function edit_store($content_id, Request $request)
    {
        $this->validate(
            $request,
            [
                'product_id' => 'required',
                'title' => 'required',
                'konten' => 'required',
            ],
            [
                'product_id' => 'Nama product Harus Diisi!',
                'title.required' => 'Judul product Harus Diisi!',
                'konten.required' => 'konten product Harus Diisi!',
            ]
        );

        $data_edit = Konten::find($content_id);
        $data_edit->product_id  = $request->product_id;
        $data_edit->title = $request->title;
        $data_edit->konten = $request->konten;


        if ($request->hasFile('gambar')) {
            $gmr_kon = $request->file('gambar');
            $gmr_kon_nama = $gmr_kon->getClientOriginalName();

            // Check if there is an existing image
            if ($data_edit->gambar) {
                // Delete the existing image from S3
                Storage::disk('s3')->delete('konten/gambar/' . $data_edit->gambar);
            }

            // Store the new image in the S3 bucket
            $gmr_kon->storeAs('konten/gambar', $gmr_kon_nama, 's3');

            // Update the image name in the data
            $data_edit->gambar = $gmr_kon_nama;
        }

        // Save the changes to the database
        $data_edit->save();



?>
        <script>
            window.history.go(-2);
        </script>
    <?php
        exit();

        return redirect()->back()->with('success', 'Edit Konten Berhasil!!');
    }

    public function ganti($content_id)
    {
        $jdl = 'EDIT KONTEN VIDEO';
        $konten = Konten::findOrFail($content_id);
        $p = product::all();
        return view('konten.ganti', ['product' => $p, 'contents' => $konten, 'jdl' => $jdl]);
    }

    public  function edit_ganti($content_id, Request $request)
    {
        $this->validate(
            $request,
            [
                'product_id' => 'required',
                'title' => 'required',
                'konten' => 'required',
            ],
            [
                'product_id' => 'Nama product Harus Diisi!',
                'title.required' => 'Judul product Harus Diisi!',
                'konten.required' => 'konten product Harus Diisi!',
            ]
        );

        $data_edit = Konten::find($content_id);
        $data_edit->product_id  = $request->product_id;
        $data_edit->title = $request->title;
        $data_edit->konten = $request->konten;

        if ($request->hasFile('video')) {
            $vid_kon = $request->file('video');
            $vid_kon_nama = $vid_kon->getClientOriginalName();

            // Check if there is an existing image
            if ($data_edit->video) {
                // Delete the existing image from S3
                Storage::disk('s3')->delete('konten/video/' . $data_edit->video);
            }

            // Store the new image in the S3 bucket
            $vid_kon->storeAs('konten/video', $vid_kon_nama, 's3');

            // Update the image name in the data
            $data_edit->video = $vid_kon_nama;
        }

        // Save the changes to the database
        $data_edit->save();



    ?>
        <script>
            window.history.go(-2);
        </script>
<?php
        exit();

        return redirect()->back()->with('success', 'Edit Konten Berhasil!!');
    }


    public function destroy_content($content_id)
    {
        $data = Konten::find($content_id);

        if ($data) {
            // Jika konten memiliki gambar, hapus gambar dari penyimpanan AWS S3
            if ($data->gambar) {
                Storage::disk('s3')->delete('konten/gambar/' . $data->gambar);
            }

            // Jika konten memiliki video, hapus video dari penyimpanan AWS S3
            if ($data->video) {
                Storage::disk('s3')->delete('konten/video/' . $data->video);
            }

            // Hapus konten dari database
            $data->delete();

            return redirect()->back()->with('success', 'Konten berhasil dihapus.');
        }

        return redirect()->back()->with('error', 'Konten tidak ditemukan.');
    }

    public function download_konten($content_id)
    {
        // Mendapatkan informasi produk berdasarkan id
        $k = Konten::find($content_id);

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
        if ($k->gambar) {
            $objectKey = 'konten/gambar/' . $k->gambar;
        } elseif ($k->video) {
            $objectKey = 'konten/video/' . $k->video;
        } else {
            return back()->with('error', 'Konten tidak ditemukan');
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
            }, $k->gambar ?: $k->video); // Menggunakan nama file gambar atau video sebagai nama unduhan
        } catch (\Exception $e) {
            // Tangani jika terjadi kesalahan saat mengambil konten dari S3
            return back()->with('error', 'Gagal mengunduh file');
        }
    }
}
