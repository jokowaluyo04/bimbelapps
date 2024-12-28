@extends('sidebar')

@section('title', 'Absensi Kelas Sore')

@section('content')
<div class="flex-grow p-6">
    <div class="bg-white rounded-lg shadow-lg p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Absensi Kelas Sore</h1>
            <div class="text-right">
                <p class="text-gray-600">Waktu: 13.00 - 17.00</p>
                <p class="text-gray-600">Tanggal: {{ date('d-m-Y') }}</p>
            </div>
        </div>

        <form action="{{ route('absensi.store') }}" method="POST">
            @csrf
            <input type="hidden" name="kelas" value="sore">

            <div class="overflow-x-auto">
                <table class="min-w-full border-collapse">
                    <thead class="bg-yellow-500 text-white">
                        <tr>
                            <th class="px-4 py-2 text-left">No</th>
                            <th class="px-4 py-2 text-left">NIS</th>
                            <th class="px-4 py-2 text-left">Nama Siswa</th>
                            <th class="px-4 py-2 text-center">Status Kehadiran</th>
                            <th class="px-4 py-2">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-4 py-2">1</td>
                            <td class="px-4 py-2">2024002</td>
                            <td class="px-4 py-2">Siti Nurhaliza</td>
                            <td class="px-4 py-2">
                                <div class="flex justify-center gap-4">
                                    <label class="inline-flex items-center">
                                        <input type="radio" name="status_2024002" value="hadir" class="form-radio text-blue-500" checked>
                                        <span class="ml-2">Hadir</span>
                                    </label>
                                    <label class="inline-flex items-center">
                                        <input type="radio" name="status_2024002" value="sakit" class="form-radio text-yellow-500">
                                        <span class="ml-2">Sakit</span>
                                    </label>
                                    <label class="inline-flex items-center">
                                        <input type="radio" name="status_2024002" value="izin" class="form-radio text-green-500">
                                        <span class="ml-2">Izin</span>
                                    </label>
                                    <label class="inline-flex items-center">
                                        <input type="radio" name="status_2024002" value="alpha" class="form-radio text-red-500">
                                        <span class="ml-2">Alpha</span>
                                    </label>
                                </div>
                            </td>
                            <td class="px-4 py-2">
                                <input type="text" name="keterangan_2024002" class="w-full border rounded-lg px-3 py-1" placeholder="Keterangan...">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="mt-6 flex justify-end gap-3">
                <button type="button" onclick="window.location.href='{{ route('absensi') }}'"
                    class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400">
                    Kembali
                </button>
                <button type="submit"
                    class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                    Simpan Absensi
                </button>
            </div>
        </form>
    </div>
</div>
<script src="{{ asset('js/kelas_sore.js') }}"></script>
@endsection
