<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class IsAdminExternal
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Memeriksa apakah pengguna terotentikasi
        if (Auth::check()) {
            // Memeriksa apakah peran pengguna adalah "Admin"
            if (Auth::user()->role === 'Admin External') {
                // Jika ya, lanjutkan dengan permintaan berikutnya
                return $next($request);
            }
        }

        // Jika tidak, kembalikan tanggapan larangan akses
        Session::flash('error', 'You are not allowed to access this page.');

        return redirect()->route('dashboard');
    }
}