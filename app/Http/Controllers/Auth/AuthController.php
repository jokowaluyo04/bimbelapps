<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
{
    // Validasi input
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Cek kredensial
    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        // Redirect ke halaman beranda jika login berhasil
        return redirect()->route('beranda');
    }

    // Jika gagal, kembali ke halaman login dengan pesan error
    return back()->withErrors([
        'email' => 'Email atau password salah.',
    ]);
}
}
