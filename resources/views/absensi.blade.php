@extends('sidebar')

@section('title', 'Absensi')

@section('content')
<div class="flex-grow p-6">
    <h1 class="text-3xl font-bold mb-6 text-gray-800 text-center">Absensi Siswa</h1>
    <p class="text-center text-gray-600 mb-8">Pilih kelas untuk melakukan absensi.</p>

    <!-- Pilihan Kelas -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">
        <!-- Kelas Pagi -->
        <div class="bg-blue-100 p-6 rounded-lg shadow-lg text-center">
            <img src="https://img.icons8.com/color/48/sunrise.png" alt="Kelas Pagi" class="mx-auto mb-4">
            <h2 class="text-lg font-bold text-blue-700">Kelas Pagi</h2>
            <p class="text-gray-600 mb-4">Waktu: 07.00 - 12.00</p>
            <a href="{{ route('kelas.pagi') }}" 
                class="inline-block bg-blue-500 text-white px-4 py-2 rounded shadow hover:bg-blue-600">
                Pilih
            </a>
        </div>

        <!-- Kelas Sore -->
        <div class="bg-yellow-100 p-6 rounded-lg shadow-lg text-center">
            <img src="https://img.icons8.com/color/48/sunset.png" alt="Kelas Sore" class="mx-auto mb-4">
            <h2 class="text-lg font-bold text-yellow-700">Kelas Sore</h2>
            <p class="text-gray-600 mb-4">Waktu: 13.00 - 17.00</p>
            <a href="{{ route('kelas.sore') }}" 
                class="inline-block bg-yellow-500 text-white px-4 py-2 rounded shadow hover:bg-yellow-600">
                Pilih
            </a>
        </div>

        <!-- Kelas Malam -->
        <div class="bg-gray-200 p-6 rounded-lg shadow-lg text-center">
            <img src="https://img.icons8.com/color/48/night.png" alt="Kelas Malam" class="mx-auto mb-4">
            <h2 class="text-lg font-bold text-gray-700">Kelas Malam</h2>
            <p class="text-gray-600 mb-4">Waktu: 18.00 - 21.00</p>
            <a href="{{ route('kelas.malam') }}" 
                class="inline-block bg-gray-700 text-white px-4 py-2 rounded shadow hover:bg-gray-800">
                Pilih
            </a>
        </div>
    </div>
</div>
@endsection