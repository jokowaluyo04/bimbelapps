<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ManajemenAkunController extends Controller
{
    public function show()
    {
        // Ambil semua data user dari database
        $users = User::all();

        // Tampilkan data ke view manajemen-akun.blade.php
        return view('manajemen-akun', compact('users'));
    }

    public function create()
    {
        // Tampilkan form untuk membuat akun baru
        return view('manajemen-akun-create');
    }

    public function store(Request $request)
    {
        // Validasi data input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
            'role' => 'required|in:admin,user', // Validasi untuk role
        ]);

        // Simpan data user ke database
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role, // Simpan role
        ]);

        // Redirect ke halaman manajemen akun
        return redirect()->route('manajemen-akun.index')->with('success', 'Akun berhasil dibuat.');
    }
}
