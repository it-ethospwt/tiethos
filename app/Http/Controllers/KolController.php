<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\Kol;

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
}
