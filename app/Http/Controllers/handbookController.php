<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\Wa;
use App\Models\Web;
use Aws\s3\S3Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class handbookController extends Controller
{

    public function index()
    {
        $jdl = 'HANDBOOK';
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
    // index
    public function wa($product_id)
    {
        $jdl = 'HANDBOOK INTERAKSI WHATSAPP';
        $w = Wa::where('product_id', $product_id)->get();
        // $w = Wa::paginate(8);
        return view('handbook.wa.index', ['wa' => $w, 'product_id' => $product_id, 'jdl' => $jdl]);
    }
    // tambah
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

        if ($request->hasFile('gambar')) {
            $gmr_h  = $request->file('gambar');
            $gmr_h_nama = $gmr_h->getClientOriginalName();

            $gmr_h->storeAs('handbook', $gmr_h_nama, 's3');
        }
        //membuat nama  produk 
        $data['gambar'] = $gmr_h_nama;


        Wa::create($data);


?>
        <script>
            window.history.go(-2);
        </script>
    <?php
        exit();
        return redirect()->back()->with('success', 'Edit Affiliator Berhasil!!');
    }

    // edit
    public function edit_wa($wa_id)
    {
        $jdl = 'Edit Handbook Interaksi Whatsapp';
        $wa = Wa::findOrFail($wa_id);
        $p = product::all();
        return view('handbook.wa.edit', ['product' => $p, 'wa' => $wa, 'jdl' => $jdl]);
    }

    public function edit_store_wa($wa_id, Request $request)
    {
        $this->validate(
            $request,
            [
                'product_id' => 'required',
                'sub' => 'required',
                'deskripsi' => 'required',
            ],
            [
                'product_id' => 'produk Handbook Interaksi Whatsapp Harus Diisi!',
                'sub.required' => 'Judul Handbook Interaksi Whatsapp Harus Diisi!',
                'deskripsi.required' => 'deskripsi Handbook Interaksi Whatsapp Harus Diisi!',
            ]
        );

        $data_edit = Wa::find($wa_id);
        $data_edit->product_id  = $request->product_id;
        $data_edit->sub = $request->sub;
        $data_edit->deskripsi = $request->deskripsi;
        if ($request->hasFile('gambar')) {
            $gmr_h = $request->file('gambar');
            $gmr_h_nama = $gmr_h->getClientOriginalName();

            // Check if there is an existing image
            if ($data_edit->gambar) {
                // Delete the existing image from S3
                Storage::disk('s3')->delete('handbook/' . $data_edit->gambar);
            }

            // Store the new image in the S3 bucket
            $gmr_h->storeAs('handbook', $gmr_h_nama, 's3');

            // Update the image name in the data
            $data_edit->gambar = $gmr_h_nama;
        }

        // Save the changes to the database
        $data_edit->save();

        return redirect()->back()->with('success', 'Edit Affiliator Berhasil!!');
    }


    // detail
    public function detail($wa_id)
    {
        $jdl = 'DETAIL HANDBOOK INTERAKSI WHATSAPP';
        $w = Wa::findOrFail($wa_id);

        if (!$w) {
            return redirect()->back()->with('error', 'Handbook Whatsapp not found');
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
        $folderName = 'handbook/';

        $imageUrls =  [];

        // Remove foreach loop as $a is already a single Affiliator object
        $fileName =  $w->gambar;
        $imageUrl = $s3->getObjectUrl($bucketName, $folderName . $fileName);

        if ($imageUrl) {
            $imageUrls[$w->wa_id] = $imageUrl;
        }
        return  view('handbook.wa.detail', ['wa' => $w, 'jdl' => $jdl, 'imageUrls' => $imageUrls]);
    }

    // hapus wa
    public function destroy_wa($wa_id)
    {

        $wa = wa::find($wa_id);

        if ($wa) {
            // Jika konten memiliki gambar, hapus gambar dari penyimpanan AWS S3
            if ($wa->gambar) {
                Storage::disk('s3')->delete('handbook/' . $wa->gambar);
            }

            $wa->delete();

            return redirect()->back()->with('success', 'handbook Interaksi Whatsapp berhasil dihapus.');
        }

        return redirect()->back()->with('error', 'Konten tidak ditemukan.');
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

        if ($request->hasFile('gambar')) {
            $gmr_h  = $request->file('gambar');
            $gmr_h_nama = $gmr_h->getClientOriginalName();

            //Menyimpan  file  kedalam bucket 'bankcont'  didalam folder /produk
            $gmr_h->storeAs('handbook', $gmr_h_nama, 's3');
        }
        //membuat nama  produk 
        $data['gambar'] = $gmr_h_nama;


        Web::create($data);


    ?>
        <script>
            window.history.go(-2);
        </script>
<?php
        exit();
        return redirect()->back()->with('success', 'Edit Affiliator Berhasil!!');
    }
    // edit web
    public function edit_web($web_id)
    {
        $jdl = 'Edit Handbook Konversi Web';
        $web = Web::findOrFail($web_id);
        $p = product::all();
        return view('handbook.web.edit', ['product' => $p, 'web' => $web, 'jdl' => $jdl]);
    }

    public function edit_store_web($web_id, Request $request)
    {
        $this->validate(
            $request,
            [
                'product_id' => 'required',
                'sub' => 'required',
                'deskripsi' => 'required',
            ],
            [
                'product_id' => 'produk Handbook Konversi Web Harus Diisi!',
                'sub.required' => 'Judul Handbook Konversi Web Harus Diisi!',
                'deskripsi.required' => 'deskripsi Handbook Konversi Web Harus Diisi!',
            ]
        );

        $data_edit = Web::find($web_id);
        $data_edit->product_id  = $request->product_id;
        $data_edit->sub = $request->sub;
        $data_edit->deskripsi = $request->deskripsi;
        if ($request->hasFile('gambar')) {
            $gmr_h = $request->file('gambar');
            $gmr_h_nama = $gmr_h->getClientOriginalName();

            // Check if there is an existing image
            if ($data_edit->gambar) {
                // Delete the existing image from S3
                Storage::disk('s3')->delete('handbook/' . $data_edit->gambar);
            }

            // Store the new image in the S3 bucket
            $gmr_h->storeAs('handbook', $gmr_h_nama, 's3');

            // Update the image name in the data
            $data_edit->gambar = $gmr_h_nama;
        }

        // Save the changes to the database
        $data_edit->save();

        return redirect()->back()->with('success', 'Edit Handbook Konversi Web Berhasil!!');
    }


    // detail web
    public function lengkap($web_id)
    {
        $jdl = 'DETAIL HANDBOOK KONVERSI WEB';
        $wb = Web::findOrFail($web_id);

        if (!$wb) {
            return redirect()->back()->with('error', 'Handbook Whatsapp not found');
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
        $folderName = 'handbook/';

        $imageUrls =  [];

        // Remove foreach loop as $a is already a single Affiliator object
        $fileName =  $wb->gambar;
        $imageUrl = $s3->getObjectUrl($bucketName, $folderName . $fileName);

        if ($imageUrl) {
            $imageUrls[$wb->web_id] = $imageUrl;
        }
        return  view('handbook.web.detail', ['web' => $wb, 'jdl' => $jdl, 'imageUrls' => $imageUrls]);
    }

    // hapus web
    public function destroy_web($web_id)
    {

        $web = web::find($web_id);

        if ($web) {
            // Jika konten memiliki gambar, hapus gambar dari penyimpanan AWS S3
            if ($web->gambar) {
                Storage::disk('s3')->delete('handbook/' . $web->gambar);
            }

            $web->delete();

            return redirect()->back()->with('success', 'handbook Konversi Web berhasil dihapus.');
        }

        return redirect()->back()->with('error', 'handbook Konversi Web tidak ditemukan.');
    }
}
