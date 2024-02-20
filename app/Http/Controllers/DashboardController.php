<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\product;
use App\Models\Konten;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $jdl = 'Dashboard';
        $users = User::orderBy('last_seen', 'DESC')->get();
        $product = Product::all();
        $konten = Konten::all();

        $totalUsers = $users->count();
        $totalProduk = $product->count();
        $totalKonten = $konten->count();

        return view('index', compact('users', 'totalUsers', 'totalProduk', 'totalKonten', 'jdl'));
    }
}
