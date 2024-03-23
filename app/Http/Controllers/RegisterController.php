<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth/register');
    }

    public function register(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'email' => 'required|string|email|max:255|unique:users',
            'username' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:8',
            'jenis_kelamin' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'user_image' => 'mimes:jpg,jpeg,png|max:2048|required',
        ]);

        $imageName = $request->file('user_image')->getClientOriginalName();
        $request->user_image->move(public_path('static/photo_profile'), $imageName);

        $validatedData['password'] = bcrypt($request->password);

        try {
            $imageName = $request->file('user_image')->getClientOriginalName();
            $user = new User([
                'email' => $validatedData['email'],
                'username' => $validatedData['username'],
                'name' => $validatedData['name'],
                'password' => $validatedData['password'],
                'jenis_kelamin' => $validatedData['jenis_kelamin'],
                'role' => $validatedData['role'],
                'user_image' => $imageName,
            ]);
            $user->save();

            return redirect()->route('login')->with('success', 'Berhasil Membuat Akun');
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Data Belum Sesuai']);
        }
    }
}
