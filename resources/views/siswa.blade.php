@extends('sidebar')

@section('title', 'Data Siswa')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-4">Data Siswa</h1>
    <table class="min-w-full bg-white border border-gray-300">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">Nama</th>
                <th class="py-2 px-4 border-b">NIS</th>
                <th class="py-2 px-4 border-b">Kelas</th>
                <th class="py-2 px-4 border-b">Alamat</th>
                <th class="py-2 px-4 border-b">Tanggal Lahir</th>
                <th class="py-2 px-4 border-b">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data_siswa as $siswa)
            <tr>
                <td class="py-2 px-4 border-b">{{ $siswa['nama'] }}</td>
                <td class="py-2 px-4 border-b">{{ $siswa['nis'] }}</td>
                <td class="py-2 px-4 border-b">{{ $siswa['kelas'] }}</td>
                <td class="py-2 px-4 border-b">{{ $siswa['alamat'] }}</td>
                <td class="py-2 px-4 border-b">{{ $siswa['tanggal_lahir'] }}</td>
                <td class="py-2 px-4 border-b">
                    <button onclick="showSiswaDetail('{{ $siswa['nama'] }}', '{{ $siswa['nis'] }}', '{{ $siswa['kelas'] }}', '{{ $siswa['alamat'] }}', '{{ $siswa['tanggal_lahir'] }}')" class="text-blue-500 hover:underline">Detail</button>
                    <button onclick="printSiswaRaport('{{ $siswa['nis'] }}')" class="text-blue-500 hover:underline">Cetak Raport</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Sertakan file JavaScript -->
<script src="{{ asset('js/siswa.js') }}"></script>
@endsection
