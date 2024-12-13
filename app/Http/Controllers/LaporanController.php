<?php

namespace App\Http\Controllers;

use App\Models\LaporanPerkembangan;
use Illuminate\Http\Request;

class LaporanPerkembanganController extends Controller
{
    public function index()
    {
        $laporan = LaporanPerkembangan::with('siswa')->get();
        return view('laporan.index', compact('laporan'));
    }

    public function create()
    {
        return view('laporan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswa,id',
            'deskripsi' => 'required|string',
            'nilai' => 'nullable|string',
            'tanggal' => 'required|date',
        ]);

        LaporanPerkembangan::create($request->all());

        return redirect()->route('laporan.index')->with('success', 'Laporan created successfully.');
    }

    public function edit(LaporanPerkembangan $laporan)
    {
        return view('laporan.edit', compact('laporan'));
    }

    public function update(Request $request, LaporanPerkembangan $laporan)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswa,id',
            'deskripsi' => 'required|string',
            'nilai' => 'nullable|string',
            'tanggal' => 'required|date',
        ]);

        $laporan->update($request->all());

        return redirect()->route('laporan.index')->with('success', 'Laporan updated successfully.');
    }

    public function destroy(LaporanPerkembangan $laporan)
    {
        $laporan->delete();
        return redirect()->route('laporan.index')->with('success', 'Laporan deleted successfully.');
    }
}