<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Menampilkan semua data kelas
     */
    public function index()
    {
        $kelas = Kelas::all();
        return response()->json([
            'status' => 'success',
            'data' => $kelas
        ]);
    }

    /**
     * Menyimpan kelas baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required|string|max:100',
            'deskripsi' => 'nullable|string'
        ]);

        $kelas = Kelas::create($request->all());

        return response()->json([
            'status' => 'success',
            'message' => 'Kelas berhasil ditambahkan',
            'data' => $kelas
        ], 201);
    }

    /**
     * Menampilkan detail kelas
     */
    public function show(Kelas $kelas)
    {
        return response()->json([
            'status' => 'success',
            'data' => $kelas
        ]);
    }

    /**
     * Update data kelas
     */
    public function update(Request $request, Kelas $kelas)
    {
        $request->validate([
            'nama_kelas' => 'required|string|max:100',
            'deskripsi' => 'nullable|string'
        ]);

        $kelas->update($request->all());

        return response()->json([
            'status' => 'success',
            'message' => 'Kelas berhasil diupdate',
            'data' => $kelas
        ]);
    }

    /**
     * Menghapus kelas
     */
    public function destroy(Kelas $kelas)
    {
        $kelas->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Kelas berhasil dihapus'
        ]);
    }

    public function kelasPagi()
    {
        return view('absensi-pagi');
    }

    public function kelasSore()
    {
        return view('absensi-sore');
    }

    public function kelasMalam()
    {
        return view('absensi-malam');
    }
}

