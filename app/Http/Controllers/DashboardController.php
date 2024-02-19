<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $jdl = 'Dashboard';
        $users = User::orderBy('last_seen', 'DESC')->get();
        $totalUsers = $users->count();
        $product = Product::all();
        $totalProduk = $product->count();

        return view('index', compact('users', 'totalUsers', 'totalProduk', 'jdl'));
    }
}
