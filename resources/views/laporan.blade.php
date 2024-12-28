@extends('sidebar')

@section('title', 'Laporan Perkembangan Siswa')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-4xl font-bold text-gray-800 mb-6 text-center">LAPORAN PERKEMBANGAN SISWA</h1>

    <button onclick="openModal()" class="mb-4 px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition-colors">
        Tambah Laporan
    </button>

    @php
        $data_siswa = [
            [
                'nama' => 'Adrian Josua Kurniawan',
                'nis' => '5147173 / 904948413991',
                'kelas' => 'X IPA',
                'semester' => 'Ganjil',
                'tahun_pelajaran' => '2022/2023',
                'alamat' => 'Jl. Meureubo-Tp Ladang KM 3',
                'nilai' => [
                    ['mata_pelajaran' => 'Bahasa Indonesia', 'rincian' => [85, 90, 85], 'rata_rata' => 87],
                    ['mata_pelajaran' => 'Matematika (Umum)', 'rincian' => [75, 80, 90], 'rata_rata' => 81],
                    ['mata_pelajaran' => 'Ilmu Pengetahuan Alam (IPA)', 'rincian' => [80, 85, 90], 'rata_rata' => 85],
                    ['mata_pelajaran' => 'Ilmu Pengetahuan Sosial (IPS)', 'rincian' => [85, 88, 90], 'rata_rata' => 87],
                    ['mata_pelajaran' => 'Pendidikan Pancasila dan Kewarganegaraan', 'rincian' => [80, 95, 75], 'rata_rata' => 83],
                ]
            ],
            [
                'nama' => 'Siti Aminah',
                'nis' => '5147174 / 904948413992',
                'kelas' => 'X IPA',
                'semester' => 'Ganjil',
                'tahun_pelajaran' => '2022/2023',
                'alamat' => 'Jl. Mangga Besar No. 12',
                'nilai' => [
                    ['mata_pelajaran' => 'Bahasa Indonesia', 'rincian' => [88, 87, 90], 'rata_rata' => 88],
                    ['mata_pelajaran' => 'Matematika (Umum)', 'rincian' => [78, 80, 85], 'rata_rata' => 81],
                    ['mata_pelajaran' => 'Ilmu Pengetahuan Alam (IPA)', 'rincian' => [85, 90, 88], 'rata_rata' => 88],
                    ['mata_pelajaran' => 'Ilmu Pengetahuan Sosial (IPS)', 'rincian' => [86, 84, 89], 'rata_rata' => 86],
                    ['mata_pelajaran' => 'Pendidikan Pancasila dan Kewarganegaraan', 'rincian' => [90, 85, 88], 'rata_rata' => 88],
                ]
            ]
        ];
    @endphp

    @foreach($data_siswa as $siswa)
    <div class="mb-6 border-b pb-6">
        <div class="mb-4">
            <p><strong>Nama:</strong> {{ $siswa['nama'] }}</p>
            <p><strong>NIS / NISN:</strong> {{ $siswa['nis'] }}</p>
            <p><strong>Kelas:</strong> {{ $siswa['kelas'] }}</p>
            <p><strong>Semester:</strong> {{ $siswa['semester'] }}</p>
            <p><strong>Tahun Pelajaran:</strong> {{ $siswa['tahun_pelajaran'] }}</p>
            <p><strong>Alamat:</strong> {{ $siswa['alamat'] }}</p>
        </div>

        <table class="table-auto w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-300 px-4 py-2">No</th>
                    <th class="border border-gray-300 px-4 py-2">Mata Pelajaran</th>
                    <th class="border border-gray-300 px-4 py-2">Rincian Nilai Sumatif</th>
                    <th class="border border-gray-300 px-4 py-2">Rata-Rata Nilai</th>
                </tr>
            </thead>
            <tbody>
                @foreach($siswa['nilai'] as $index => $nilai)
                <tr>
                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $index + 1 }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $nilai['mata_pelajaran'] }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">{{ implode(', ', $nilai['rincian']) }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $nilai['rata_rata'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4 text-right">
            <button onclick="printLaporan('{{ $siswa['nama'] }}')" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors">
                Cetak Laporan
            </button>
        </div>
    </div>
    @endforeach
</div>

<!-- Modal Tambah Laporan -->
<div id="modalTambah" class="modal-container fixed inset-0 bg-black bg-opacity-50 hidden z-50 overflow-y-auto">
    <div class="modal-backdrop min-h-screen px-4 py-6 flex items-center justify-center">
        <div class="bg-white rounded-lg w-full max-w-2xl mx-auto relative">
            <div class="modal-header">
                <h2 class="text-2xl font-bold text-gray-800">Tambah Laporan</h2>
                <button type="button" onclick="closeModal('modalTambah')" class="text-gray-400 hover:text-gray-500 focus:outline-none">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <div class="px-6 py-4 max-h-[calc(100vh-200px)] overflow-y-auto">
                <form id="formTambahLaporan" onsubmit="handleSubmitLaporan(event)">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nama Siswa</label>
                            <input type="text" name="nama" required class="w-full p-2 border rounded focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Kelas</label>
                            <input type="text" name="kelas" required class="w-full p-2 border rounded focus:ring-blue-500 focus:border-blue-500">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nilai Matematika</label>
                            <input type="number" name="nilai_matematika" min="0" max="100" required class="w-full p-2 border rounded focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nilai IPA</label>
                            <input type="number" name="nilai_ipa" min="0" max="100" required class="w-full p-2 border rounded focus:ring-blue-500 focus:border-blue-500">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nilai PPKN</label>
                            <input type="number" name="nilai_ppkn" min="0" max="100" required class="w-full p-2 border rounded focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nilai Bahasa Indonesia</label>
                            <input type="number" name="nilai_bahasa_indonesia" min="0" max="100" required class="w-full p-2 border rounded focus:ring-blue-500 focus:border-blue-500">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Jumlah Hadir</label>
                            <input type="number" name="jumlah_hadir" min="0" required class="w-full p-2 border rounded focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Jumlah Tidak Hadir</label>
                            <input type="number" name="jumlah_tidak_hadir" min="0" required class="w-full p-2 border rounded focus:ring-blue-500 focus:border-blue-500">
                        </div>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Catatan</label>
                        <textarea name="catatan" rows="3" class="w-full p-2 border rounded focus:ring-blue-500 focus:border-blue-500" placeholder="Tambahkan catatan..."></textarea>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <div class="flex justify-end gap-2">
                    <button type="button" onclick="closeModal('modalTambah')" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 rounded hover:bg-gray-200">Batal</button>
                    <button type="submit" form="formTambahLaporan" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded hover:bg-blue-700">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Sertakan file JavaScript -->
<script src="{{ asset('js/laporan.js') }}"></script>
<script src="{{ asset('js/tambahLaporan.js') }}"></script>
@endsection

