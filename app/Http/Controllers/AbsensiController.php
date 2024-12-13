<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function index()
    {
        $absensi = Absensi::with('siswa')->get();
        return view('absensi', compact('absensi'));
    }

    public function create()
    {
        return view('create-absensi');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'nis' => 'required|string|exists:siswa,nis',
            'kelas' => 'required|in:pagi,sore,malam',
            'status' => 'required|in:hadir,sakit,izin,alpha',
            'keterangan' => 'nullable|string',
        ]);

        Absensi::create($request->all());

        return redirect()->route('absensi.index')->with('success', 'Absensi created successfully.');
    }

    public function edit(Absensi $absensi)
    {
        return view('edit-absensi', compact('absensi'));
    }

    public function update(Request $request, Absensi $absensi)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'nis' => 'required|string|exists:siswa,nis',
            'kelas' => 'required|in:pagi,sore,malam',
            'status' => 'required|in:hadir,sakit,izin,alpha',
            'keterangan' => 'nullable|string',
        ]);

        $absensi->update($request->all());

        return redirect()->route('absensi.index')->with('success', 'Absensi updated successfully.');
    }

    public function destroy(Absensi $absensi)
    {
        $absensi->delete();
        return redirect()->route('absensi.index')->with('success', 'Absensi deleted successfully.');
    }

    public function kelasPagi()
    {
        // Logika untuk menangani absensi kelas pagi
        return view('absensi-pagi'); // Ganti dengan view yang sesuai
    }

    public function kelasSore()
    {
        // Logika untuk menangani absensi kelas sore
        return view('absensi-sore'); // Ganti dengan view yang sesuai
    }

    public function kelasMalam()
    {
        // Logika untuk menangani absensi kelas malam
        return view('absensi-malam'); // Ganti dengan view yang sesuai
    }
}
