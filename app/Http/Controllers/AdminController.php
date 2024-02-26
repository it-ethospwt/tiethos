<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function users()
    {
        $jdl = 'Users';
        $user = User::all();
        return view('user.index', compact('user', 'jdl'));
    }

    public function tambahUsers()
    {
        $jdl = 'Tambah Users';
        return view('user.tambah', compact('jdl'));
    }

    public function users_store(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|string|email|max:255|unique:users',
            'username' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:8',
            'jenis_kelamin' => 'required|string|max:255',
            'role' => 'required|string|max:255'
        ]);

        $validatedData['password'] = bcrypt($request->password);

        try {
            User::create($validatedData);
            return redirect()->route('admin.users')->with('success', 'Data User Berhasil Ditambah');
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Data Belum Sesuai']);
        }
    }


    public function users_edit($id)
    {
        $jdl = 'Edit Users';
        $user = User::findOrFail($id);

        return view('user.edit', compact('user', 'jdl'));
    }

    public function users_update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->name = $request->input('name');

        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }

        $user->save();
        return redirect()->route('admin.users')->with('success', 'Data User Berhasil Diperbarui');
    }

    public function users_detail($id)
    {
        $jdl = 'Detail Users';
        $user = User::findOrFail($id);
        return view('user.detail', ['user' => $user, 'jdl' => $jdl]);
    }

    public function users_delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users')->with('success', 'User deleted successfully');
    }
}
