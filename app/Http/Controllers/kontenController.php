<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\Konten;

use  Illuminate\Support\Facades\File;


use Illuminate\Http\Request;

class kontenController extends Controller
{
    public function index()
    {
        $jdl = 'Bank Konten';
        $p = product::all();
        $p = Product::paginate(8);
        return  view('konten.index', ['product' => $p, 'jdl' => $jdl]);
    }

    public function al($product_id)
    {
        // Ambil konten berdasarkan product_id
        $jdl = 'Konten Agency Luar';
        $k = Konten::where('product_id', $product_id)->get();

        return view('konten.al', ['contents' => $k, 'product_id' => $product_id, 'jdl' => $jdl]);
    }

    public function ccp($product_id)
    {
        // Ambil konten berdasarkan product_id
        $jdl = 'Konten CCP';
        $k = Konten::where('product_id', $product_id)->get();

        return view('konten.ccp', ['contents' => $k, 'product_id' => $product_id, 'jdl' => $jdl]);
    }

    public function ac($product_id)
    {
        // Ambil konten berdasarkan product_id
        $jdl = 'Konten ADV / CWM';
        $k = Konten::where('product_id', $product_id)->get();

        return view('konten.ac', ['contents' => $k, 'product_id' => $product_id, 'jdl' => $jdl]);
    }

    public function tambah()
    {
        $jdl = 'Tambah Konten Gambar';
        $p = product::all();
        return view('konten.tambah', ['product' => $p, 'jdl' => $jdl]);
    }
    public function plus()
    {
        $jdl = 'Tambah Konten Video';
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
            $gambar_nama = $gambar->hashName();
            // hashName() menghasilkan string unik/random jika menggunakan nama Asli menggunakan getClientOriginalName() 
            $gambar->move(public_path('public_imgTest'), $gambar_nama);

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

        // cek video yang diupload
        if ($request->hasFile('video')) {
            $video = $request->file('video');
            $video_nama = $video->hashName();
            // hashName() menghasilkan string unik/random jika menggunakan nama Asli menggunakan getClientOriginalName() 
            $video->move(public_path('public_videoTest'), $video_nama);

            // membuat nama video 
            $data['video'] = $video_nama;
        }

        Konten::create($data);

        return redirect('/konten')->with('success', 'Tambah product Berhasil!!');
    }


    public function edit($content_id)
    {
        $jdl = 'Tambah Konten Video';
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

        //cek  gambar  yang diupload
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambar_nama = $gambar->hashName();
            $gambar->move(public_path('public_imgTest'), $gambar_nama);

            //Hapus Gambar  Lama, Setelah gambar baru berhasil diunggah
            if ($data_edit->gambar) {
                File::delete(public_path('public_imgTest') . '/' . $data_edit->gambar);
            }

            $data_edit->gambar = $gambar_nama;
        }

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
        $jdl = 'Tambah Konten Video';
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

        //cek  gambar  yang diupload
        if ($request->hasFile('video')) {
            $video = $request->file('video');
            $video_nama = $video->hashName();
            $video->move(public_path('public_imgTest'), $video_nama);

            //Hapus video  Lama, Setelah video baru berhasil diunggah
            if ($data_edit->video) {
                File::delete(public_path('public_imgTest') . '/' . $data_edit->video);
            }

            $data_edit->video = $video_nama;
        }

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

        // Hapus File Yang Terkait Dengan Konten
        $filePath = public_path('public_imgTest') . '/' . $data->gambar;
        if (File::exists($filePath)) {
            File::delete($filePath);
        }

        $filePath = public_path('public_videoTest') . '/' . $data->video;
        if (File::exists($filePath)) {
            File::delete($filePath);
        }

        $data->delete();

        return redirect()->back()->with('info', "Hapus Konten Berhasil!!");
    }
}
