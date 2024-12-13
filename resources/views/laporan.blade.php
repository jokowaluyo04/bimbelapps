@extends('sidebar')

@section('title', 'Laporan Perkembangan Siswa')

@section('content')
<div class="container mx-auto px-4 py-6">
    <!-- Header Section -->
    <div class="mb-6 bg-white p-4 rounded-lg shadow">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold text-gray-800">Laporan Perkembangan Siswa</h1>
            <button type="button" 
                onclick="openModal('modalTambah')" 
                class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg shadow transition-colors duration-200">
                Tambah Laporan
            </button>
        </div>

        <!-- Filter Section -->
        <div class="flex items-center gap-4">
            <input type="date" id="start_date" 
                class="border rounded px-3 py-2 text-sm" 
                placeholder="Tanggal Mulai">
            <span>-</span>
            <input type="date" id="end_date" 
                class="border rounded px-3 py-2 text-sm" 
                placeholder="Tanggal Akhir">
            <button onclick="filterLaporan()" 
                class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded text-sm">
                Filter
            </button>
        </div>
    </div>

    <!-- Laporan Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        @foreach($siswa as $s)
        <div class="bg-white p-4 rounded-lg shadow">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <h2 class="text-lg font-semibold text-gray-800">{{ $s->nama }}</h2>
                    <p class="text-sm text-gray-600">Kelas {{ $s->kelas }}</p>
                </div>
                <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded">
                    {{ $s->status }}
                </span>
            </div>

            <div class="grid grid-cols-2 gap-4 mb-4">
                <div class="bg-gray-50 p-3 rounded">
                    <p class="text-sm text-gray-600">Rata-rata Nilai</p>
                    <p class="text-lg font-bold text-gray-800">{{ $s->rata_rata }}%</p>
                </div>
                <div class="bg-gray-50 p-3 rounded">
                    <p class="text-sm text-gray-600">Kehadiran</p>
                    <p class="text-lg font-bold text-gray-800">{{ $s->persentase_kehadiran }}%</p>
                </div>
            </div>

            <div class="mb-4">
                <p class="text-sm text-gray-600 mb-1">Catatan:</p>
                <p class="text-sm text-gray-800">{{ $s->catatan }}</p>
            </div>

            <div class="flex gap-2">
                <a href="{{ route('siswa.detail', $s->id) }}" 
                    class="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-800 py-2 rounded text-sm text-center">
                    Detail
                </a>
                <button type="button" 
                    onclick="openModal('modalEdit')" 
                    class="flex-1 bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg shadow">
                    Edit
                </button>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Modal Tambah Laporan -->
    <div id="modalTambah" class="modal-container fixed inset-0 bg-black bg-opacity-50 hidden z-50 overflow-y-auto">
        <div class="modal-backdrop min-h-screen px-4 py-6 flex items-center justify-center">
            <div class="bg-white rounded-lg w-full max-w-2xl mx-auto relative">
                <!-- Header Modal -->
                <div class="sticky top-0 bg-white px-6 py-4 border-b border-gray-200 rounded-t-lg">
                    <div class="flex justify-between items-center">
                        <h2 class="text-2xl font-bold text-gray-800">Tambah Laporan</h2>
                        <button type="button" onclick="closeModal('modalTambah')" 
                            class="text-gray-400 hover:text-gray-500 focus:outline-none">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Body Modal -->
                <div class="px-6 py-4 max-h-[calc(100vh-200px)] overflow-y-auto">
                    <form id="formTambahLaporan" onsubmit="handleSubmitLaporan(event)">
                        <!-- Data Siswa -->
                        <div class="grid grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Nama Siswa</label>
                                <input type="text" name="nama" required 
                                    class="w-full p-2 border rounded focus:ring-blue-500 focus:border-blue-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">NIS</label>
                                <input type="text" name="nis" required 
                                    class="w-full p-2 border rounded focus:ring-blue-500 focus:border-blue-500">
                            </div>
                        </div>

                        <!-- Kelas -->
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Kelas</label>
                            <select name="kelas" required 
                                class="w-full p-2 border rounded focus:ring-blue-500 focus:border-blue-500">
                                <option value="">Pilih Kelas</option>
                                <option value="pagi">Kelas Pagi</option>
                                <option value="siang">Kelas Siang</option>
                                <option value="malam">Kelas Malam</option>
                            </select>
                        </div>

                        <!-- Nilai -->
                        <div class="mb-4">
                            <h3 class="font-medium text-gray-700 mb-2">Nilai</h3>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm text-gray-700 mb-1">Matematika</label>
                                    <input type="number" name="nilai_matematika" 
                                        min="0" max="100" required 
                                        class="w-full p-2 border rounded focus:ring-blue-500 focus:border-blue-500">
                                </div>
                                <div>
                                    <label class="block text-sm text-gray-700 mb-1">B. Indonesia</label>
                                    <input type="number" name="nilai_indonesia" 
                                        min="0" max="100" required 
                                        class="w-full p-2 border rounded focus:ring-blue-500 focus:border-blue-500">
                                </div>
                                <div>
                                    <label class="block text-sm text-gray-700 mb-1">B. Inggris</label>
                                    <input type="number" name="nilai_inggris" 
                                        min="0" max="100" required 
                                        class="w-full p-2 border rounded focus:ring-blue-500 focus:border-blue-500">
                                </div>
                                <div>
                                    <label class="block text-sm text-gray-700 mb-1">IPA</label>
                                    <input type="number" name="nilai_ipa" 
                                        min="0" max="100" required 
                                        class="w-full p-2 border rounded focus:ring-blue-500 focus:border-blue-500">
                                </div>
                            </div>
                        </div>

                        <!-- Kehadiran -->
                        <div class="mb-4">
                            <h3 class="font-medium text-gray-700 mb-2">Kehadiran</h3>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm text-gray-700 mb-1">Jumlah Hadir</label>
                                    <input type="number" name="jumlah_hadir" 
                                        min="0" required 
                                        class="w-full p-2 border rounded focus:ring-blue-500 focus:border-blue-500">
                                </div>
                                <div>
                                    <label class="block text-sm text-gray-700 mb-1">Jumlah Tidak Hadir</label>
                                    <input type="number" name="jumlah_tidak_hadir" 
                                        min="0" required 
                                        class="w-full p-2 border rounded focus:ring-blue-500 focus:border-blue-500">
                                </div>
                            </div>
                        </div>

                        <!-- Catatan -->
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Catatan</label>
                            <textarea name="catatan" rows="3" 
                                class="w-full p-2 border rounded focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Tambahkan catatan..."></textarea>
                        </div>
                    </form>
                </div>

                <!-- Footer Modal -->
                <div class="sticky bottom-0 bg-white px-6 py-4 border-t border-gray-200 rounded-b-lg">
                    <div class="flex justify-end gap-2">
                        <button type="button" onclick="closeModal('modalTambah')"
                            class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 rounded hover:bg-gray-200">
                            Batal
                        </button>
                        <button type="submit" form="formTambahLaporan"
                            class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded hover:bg-blue-700">
                            Simpan
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Laporan -->
    <div id="modalEdit" class="modal-container fixed inset-0 bg-black bg-opacity-50 hidden z-50 overflow-y-auto">
        <div class="modal-backdrop min-h-screen px-4 py-6 flex items-center justify-center">
            <div class="bg-white rounded-lg w-full max-w-2xl mx-auto relative">
                <!-- Header Modal -->
                <div class="sticky top-0 bg-white px-6 py-4 border-b border-gray-200 rounded-t-lg">
                    <div class="flex justify-between items-center">
                        <h2 class="text-2xl font-bold text-gray-800">Edit Laporan</h2>
                        <button type="button" onclick="closeModal('modalEdit')" 
                            class="text-gray-400 hover:text-gray-500 focus:outline-none">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Body Modal -->
                <div class="px-6 py-4 max-h-[calc(100vh-200px)] overflow-y-auto">
                    <form onsubmit="handleEditLaporan(event)">
                        <!-- Data Siswa -->
                        <div class="grid grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Nama Siswa</label>
                                <input type="text" name="edit_nama" id="editNama" required 
                                    class="w-full p-2 border rounded focus:ring-blue-500 focus:border-blue-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">NIS</label>
                                <input type="text" name="edit_nis" id="editNis" required 
                                    class="w-full p-2 border rounded focus:ring-blue-500 focus:border-blue-500">
                            </div>
                        </div>

                        <!-- Kelas -->
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Kelas</label>
                            <select name="edit_kelas" id="editKelas" required 
                                class="w-full p-2 border rounded focus:ring-blue-500 focus:border-blue-500">
                                <option value="">Pilih Kelas</option>
                                <option value="pagi">Kelas Pagi</option>
                                <option value="siang">Kelas Siang</option>
                                <option value="malam">Kelas Malam</option>
                            </select>
                        </div>

                        <!-- Nilai -->
                        <div class="mb-4">
                            <h3 class="font-medium text-gray-700 mb-2">Nilai</h3>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm text-gray-700 mb-1">Matematika</label>
                                    <input type="number" name="edit_nilai_matematika" id="editNilaiMatematika" 
                                        min="0" max="100" required 
                                        class="w-full p-2 border rounded focus:ring-blue-500 focus:border-blue-500">
                                </div>
                                <div>
                                    <label class="block text-sm text-gray-700 mb-1">B. Indonesia</label>
                                    <input type="number" name="edit_nilai_indonesia" id="editNilaiIndonesia" 
                                        min="0" max="100" required 
                                        class="w-full p-2 border rounded focus:ring-blue-500 focus:border-blue-500">
                                </div>
                                <div>
                                    <label class="block text-sm text-gray-700 mb-1">B. Inggris</label>
                                    <input type="number" name="edit_nilai_inggris" id="editNilaiInggris" 
                                        min="0" max="100" required 
                                        class="w-full p-2 border rounded focus:ring-blue-500 focus:border-blue-500">
                                </div>
                                <div>
                                    <label class="block text-sm text-gray-700 mb-1">IPA</label>
                                    <input type="number" name="edit_nilai_ipa" id="editNilaiIpa" 
                                        min="0" max="100" required 
                                        class="w-full p-2 border rounded focus:ring-blue-500 focus:border-blue-500">
                                </div>
                            </div>
                        </div>

                        <!-- Kehadiran -->
                        <div class="mb-4">
                            <h3 class="font-medium text-gray-700 mb-2">Kehadiran</h3>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm text-gray-700 mb-1">Jumlah Hadir</label>
                                    <input type="number" name="edit_jumlah_hadir" id="editJumlahHadir" 
                                        min="0" required 
                                        class="w-full p-2 border rounded focus:ring-blue-500 focus:border-blue-500">
                                </div>
                                <div>
                                    <label class="block text-sm text-gray-700 mb-1">Jumlah Tidak Hadir</label>
                                    <input type="number" name="edit_jumlah_tidak_hadir" id="editJumlahTidakHadir" 
                                        min="0" required 
                                        class="w-full p-2 border rounded focus:ring-blue-500 focus:border-blue-500">
                                </div>
                            </div>
                        </div>

                        <!-- Catatan -->
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Catatan</label>
                            <textarea name="edit_catatan" id="editCatatan" rows="3" 
                                class="w-full p-2 border rounded focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Tambahkan catatan..."></textarea>
                        </div>

                        <!-- Buttons -->
                        <div class="flex justify-end gap-2">
                            <button type="button" onclick="closeModal('modalEdit')"
                                class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 rounded hover:bg-gray-200">
                                Batal
                            </button>
                            <button type="submit" form="formEditLaporan"
                                class="px-4 py-2 text-sm font-medium text-white bg-yellow-600 rounded hover:bg-yellow-700">
                                Update
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Footer Modal -->
                <div class="sticky bottom-0 bg-white px-6 py-4 border-t border-gray-200 rounded-b-lg">
                    <div class="flex justify-end gap-2">
                        <button type="button" onclick="closeModal('modalEdit')"
                            class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 rounded hover:bg-gray-200">
                            Batal
                        </button>
                        <button type="submit" form="formEditLaporan"
                            class="px-4 py-2 text-sm font-medium text-white bg-yellow-600 rounded hover:bg-yellow-700">
                            Update
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    @endif
</div>
@push('scripts')
<script>
// Fungsi untuk membuka modal
function openModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }
}

// Fungsi untuk menutup modal
function closeModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.classList.add('hidden');
        document.body.style.overflow = '';
    }
}

// Menutup modal jika user klik di luar modal
window.onclick = function(event) {
    if (event.target.classList.contains('modal-backdrop')) {
        closeModal(event.target.closest('.modal-container').id);
    }
}
</script>
@endpush
@push('styles')
<style>
.modal-container {
    transition: all 0.2s ease-out;
}

.transform {
    transition: all 0.2s ease-out;
}

/* Initial state */
.transform {
    opacity: 0;
    transform: translateY(-1rem);
}

/* Active state */
.transform.translate-y-0 {
    opacity: 1;
    transform: translateY(0);
}

/* Exit state */
.transform.translate-y-4 {
    opacity: 0;
    transform: translateY(1rem);
}

/* Scrollbar styling */
.overflow-y-auto::-webkit-scrollbar {
    width: 6px;
}

.overflow-y-auto::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 4px;
}

.overflow-y-auto::-webkit-scrollbar-thumb {
    background: #888;
    border-radius: 4px;
}

.overflow-y-auto::-webkit-scrollbar-thumb:hover {
    background: #666;
}
</style>
@endpush
@endsection

