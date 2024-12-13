@extends('sidebar')

@section('title', 'Absensi Kelas Pagi')

@section('content')
<div class="flex-grow p-6">
    <div class="bg-white rounded-lg shadow-lg p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Absensi Kelas Pagi</h1>
            <div class="text-right">
                <p class="text-gray-600">Waktu: 07.00 - 12.00</p>
                <p class="text-gray-600">Tanggal: {{ date('d-m-Y') }}</p>
            </div>
        </div>

        <form action="{{ route('absensi.store') }}" method="POST">
            @csrf
            <input type="hidden" name="kelas" value="pagi">
            
            <div class="overflow-x-auto">
                <table class="min-w-full border-collapse">
                    <thead class="bg-blue-500 text-white">
                        <tr>
                            <th class="px-4 py-2 text-left">No</th>
                            <th class="px-4 py-2 text-left">NIS</th>
                            <th class="px-4 py-2 text-left">Nama Siswa</th>
                            <th class="px-4 py-2 text-center">Status Kehadiran</th>
                            <th class="px-4 py-2">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @php
                        $siswa = [
                            ['nis' => '2024001', 'nama_siswa' => 'Budi Santoso'],
                            ['nis' => '2024002', 'nama_siswa' => 'Siti Aminah'],
                            ['nis' => '2024003', 'nama_siswa' => 'Ahmad Rizki']
                        ];
                        @endphp
                        
                        @foreach($siswa as $index => $s)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-4 py-2">{{ $index + 1 }}</td>
                            <td class="px-4 py-2">{{ $s['nis'] }}</td>
                            <td class="px-4 py-2">{{ $s['nama_siswa'] }}</td>
                            <td class="px-4 py-2">
                                <div class="flex justify-center gap-4">
                                    <label class="inline-flex items-center">
                                        <input type="radio" name="status_{{ $s['nis'] }}" value="hadir" class="form-radio text-blue-500" checked>
                                        <span class="ml-2">Hadir</span>
                                    </label>
                                    <label class="inline-flex items-center">
                                        <input type="radio" name="status_{{ $s['nis'] }}" value="sakit" class="form-radio text-yellow-500">
                                        <span class="ml-2">Sakit</span>
                                    </label>
                                    <label class="inline-flex items-center">
                                        <input type="radio" name="status_{{ $s['nis'] }}" value="izin" class="form-radio text-green-500">
                                        <span class="ml-2">Izin</span>
                                    </label>
                                    <label class="inline-flex items-center">
                                        <input type="radio" name="status_{{ $s['nis'] }}" value="alpha" class="form-radio text-red-500">
                                        <span class="ml-2">Alpha</span>
                                    </label>
                                </div>
                            </td>
                            <td class="px-4 py-2">
                                <input type="text" name="keterangan_{{ $s['nis'] }}" class="w-full border rounded-lg px-3 py-1" placeholder="Keterangan...">
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-6 flex justify-end gap-3">
                <a href="{{ route('absensi') }}" 
                    class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400">
                    Kembali
                </a>
                <button type="submit" 
                    class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                    Simpan Absensi
                </button>
            </div>
        </form>
    </div>
</div>
@endsection