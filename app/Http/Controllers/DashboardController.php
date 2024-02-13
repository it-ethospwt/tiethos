<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $jdl = 'Dashboard';
        $users = User::orderBy('last_seen', 'DESC')->get();

        $totalUsers = $users->count();

        return view('index', compact('users', 'totalUsers', 'jdl'));
    }
}
