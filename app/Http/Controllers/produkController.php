<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades;
use  Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\File;

    //memanggil  model product
    use App\Models\product;
    class produkController extends Controller
    {


    // TAMPIL DATA PRODUK
    public function index(){
        $jdl = "List Produk";
        $data = product::all();

        return view('produk.v_index',['jdl' => $jdl,'data' => $data]);
    }

    // TAMBAH PRODUK  & PROSES TAMBAH  PRODUK 
    public function tambah_product(){
        $jdl = "Tambah Produk";

        return view('produk.v_tambah',['jdl' => $jdl]);
    }

    public  function store_product(Request $request){
       $this->validate($request,[
        'nm_product' => 'required',
        'dec_product' => 'required',
        'gmr_product' => 'mimes:jpg,jpeg,png,gif|max:2048|required'
       ],
       [
        'nm_product.required' => 'Nama Produk Harus Diisi!',
        'dec_product.required' => 'Deskripsi Produk Harus Diisi!',
        'gmr_product.required' => 'Gambar Produk Harus Diisi!',
        'gmr_product.mimes' => 'File  Yang  Di Upload  Bukan Gambar!',
        'gmr_product.max' => 'Ukuran Gambar Produk  Tidak Boleh Melebihi dari 2 MB!'
       ]
        );

       $data =  [
        'nm_product' =>  $request->nm_product,
        'dec_product' => $request->dec_product,
       ]; 

        //cek gambar  yang di upload
        if ($request->hasFile('gmr_product')) {
            $gmr_pdk  = $request->file('gmr_product');
            $gmr_pdk_nama = $gmr_pdk->hashName(); 
            //hashName()  menghasilkan  string  unik/random jika menggunakan nama Asli menggunakan getClientOriginalName() 
            $gmr_pdk->move(public_path('public_imgTest'),$gmr_pdk_nama);

            //membuat nama  produk 
            $data['gmr_product'] = $gmr_pdk_nama; 
        }

       product::create($data);

       return redirect('/produk')->with('success', 'Tambah Produk Berhasil!!');
     }


    // EDIT PRODUK &  PROSES  EDIT  PRODUK
     public function edit_product($id){
        $jdl = "Edit Produk";
        $data = product::find($id);

        return  view('produk.v_edit',['jdl' => $jdl,'data' =>  $data]);
     }

     public  function store_edit_product($id,Request $request){
        $this->validate($request,[
            'nm_product' => 'required',
            'dec_product' => 'required',
           ],
           [
            'nm_product.required' => 'Nama Produk Harus Diisi!',
            'dec_product.required' => 'Deskripsi Produk Harus Diisi!',
           ]  
        );

        $data_edit = product::find($id);
        $data_edit->nm_product  = $request->nm_product;
        $data_edit->dec_product = $request->dec_product;

        //cek  gambar  yang diupload
        if ($request->hasFile('gmr_product')) {
            $gmr_pdk = $request->file('gmr_product');
            $gmr_pdk_nama = $gmr_pdk->hashName();
            $gmr_pdk->move(public_path('public_imgTest'),$gmr_pdk_nama);

            //Hapus Gambar  Lama, Setelah gambar baru berhasil diunggah
            if ($data_edit->gmr_product) {
                File::delete(public_path('public_imgTest').'/'.$data_edit->gmr_product);
            }

            $data_edit->gmr_product = $gmr_pdk_nama;
        }

        $data_edit->save();

        return redirect('/produk')->with('success', 'Edit Produk Berhasil!!');
     }
     

    //PROSES HAPUS PRODUK 
     public function destroy_product($id){
        $data = product::find($id);
        // Hapus File  Yang Terkait Dengan  Produk
        $filePath = File::delete(public_path('public_imgTest').'/'.$data->gmr_product);
        if (File::exists($filePath)) {
            File::delete($filePath);
        }

        $data->delete();

        return  redirect('/produk')->with('info',"Hapus Produk Berhasil!!");
        }
    }

    
  