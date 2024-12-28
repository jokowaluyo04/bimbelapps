<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanPerkembanganController extends Controller
{
    public function index()
    {
        // Contoh data siswa, Anda bisa menggantinya dengan data dari database
        $siswa = [
            [
                'nama' => 'Widodo',
                'kelas' => 'Kelas Pagi',
                'nilai_matematika' => 85,
                'nilai_ipa' => 90,
                'nilai_ppkn' => 80,
                'nilai_bahasa_indonesia' => 88,
                'jumlah_hadir' => 20,
                'jumlah_tidak_hadir' => 5,
                'catatan' => 'Siswa A sangat aktif.',
            ],
            // Tambahkan data siswa lainnya
        ];

        return view('laporan', compact('siswa')); // Mengirimkan variabel $siswa ke tampilan
    }
}
