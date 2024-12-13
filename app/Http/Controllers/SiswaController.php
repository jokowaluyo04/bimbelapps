<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::all();
        return view('siswa', compact('siswa'));
    }

    public function create()
    {
        return view('create-siswa');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nis' => 'required|string|unique:siswa',
            'kelas' => 'required|string',
            'alamat' => 'required|string',
            'jenis_kelamin' => 'required|in:L,P',
            'no_hp' => 'required|string|max:15',
        ]);

        Siswa::create($request->all());

        return response()->json(['message' => 'Siswa created successfully.']);
    }

    public function edit(Siswa $siswa)
    {
        return view('edit-siswa', compact('siswa'));
    }

    public function update(Request $request, Siswa $siswa)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nis' => 'required|string|unique:siswa,nis,' . $siswa->id,
            'kelas' => 'required|string',
            'jenis_kelamin' => 'required|in:L,P',
            'no_hp' => 'required|string|max:15',
            'alamat' => 'required|string',
        ]);

        $siswa->update($request->all());

        return response()->json(['message' => 'Siswa updated successfully.']);
    }

    public function destroy(Siswa $siswa)
    {
        $siswa->delete();
        return redirect()->route('siswa.index')->with('success', 'Siswa deleted successfully.');
    }
}

