@extends('sidebar')

@section('title', 'Detail Siswa')

@section('content')
<div class="container mx-auto px-4 py-6">
    <!-- Header -->
    <div class="mb-6 bg-white p-4 rounded-lg shadow">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold text-gray-800">Detail Siswa</h1>
            <a href="{{ route('laporan.index') }}" 
                class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
                Kembali
            </a>
        </div>
    </div>

    <!-- Detail Card -->
    <div class="bg-white rounded-lg shadow p-6">
        <!-- Informasi Siswa -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div>
                <h2 class="text-lg font-semibold mb-4">Informasi Siswa</h2>
                <div class="space-y-3">
                    <div>
                        <label class="text-gray-600">Nama:</label>
                        <p class="font-medium">{{ $siswa->nama }}</p>
                    </div>
                    <div>
                        <label class="text-gray-600">NIS:</label>
                        <p class="font-medium">{{ $siswa->nis }}</p>
                    </div>
                    <div>
                        <label class="text-gray-600">Kelas:</label>
                        <p class="font-medium">{{ $siswa->kelas }}</p>
                    </div>
                    <div>
                        <label class="text-gray-600">Status:</label>
                        <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded">
                            {{ $siswa->status }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- Nilai Akademik -->
            <div>
                <h2 class="text-lg font-semibold mb-4">Nilai Akademik</h2>
                <div class="grid grid-cols-2 gap-4">
                    <div class="bg-gray-50 p-3 rounded">
                        <p class="text-sm text-gray-600">Matematika</p>
                        <p class="text-lg font-bold text-gray-800">{{ $siswa->nilai_matematika }}</p>
                    </div>
                    <div class="bg-gray-50 p-3 rounded">
                        <p class="text-sm text-gray-600">B. Indonesia</p>
                        <p class="text-lg font-bold text-gray-800">{{ $siswa->nilai_indonesia }}</p>
                    </div>
                    <div class="bg-gray-50 p-3 rounded">
                        <p class="text-sm text-gray-600">B. Inggris</p>
                        <p class="text-lg font-bold text-gray-800">{{ $siswa->nilai_inggris }}</p>
                    </div>
                    <div class="bg-gray-50 p-3 rounded">
                        <p class="text-sm text-gray-600">IPA</p>
                        <p class="text-lg font-bold text-gray-800">{{ $siswa->nilai_ipa }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Kehadiran -->
        <div class="mb-6">
            <h2 class="text-lg font-semibold mb-4">Kehadiran</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="bg-gray-50 p-3 rounded">
                    <p class="text-sm text-gray-600">Jumlah Hadir</p>
                    <p class="text-lg font-bold text-gray-800">{{ $siswa->jumlah_hadir }} hari</p>
                </div>
                <div class="bg-gray-50 p-3 rounded">
                    <p class="text-sm text-gray-600">Jumlah Tidak Hadir</p>
                    <p class="text-lg font-bold text-gray-800">{{ $siswa->jumlah_tidak_hadir }} hari</p>
                </div>
                <div class="bg-gray-50 p-3 rounded">
                    <p class="text-sm text-gray-600">Persentase Kehadiran</p>
                    <p class="text-lg font-bold text-gray-800">{{ $siswa->persentase_kehadiran }}%</p>
                </div>
            </div>
        </div>

        <!-- Catatan -->
        <div>
            <h2 class="text-lg font-semibold mb-4">Catatan</h2>
            <div class="bg-gray-50 p-4 rounded">
                <p class="text-gray-800">{{ $siswa->catatan ?? 'Tidak ada catatan' }}</p>
            </div>
        </div>
    </div>
</div>
@endsection 