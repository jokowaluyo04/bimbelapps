@extends('sidebar')

@section('title', 'Data Siswa')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Data Siswa</h1>
        <p class="text-gray-600">Kelola informasi siswa dengan mudah.</p>
    </div>

    <!-- Tombol Tambah -->
    <div class="mb-4">
        <button onclick="openModal('modalTambah')"
            class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded shadow-lg flex items-center">
            <i class="fas fa-plus mr-2"></i> Tambah Siswa
        </button>
    </div>

    <!-- Tabel Siswa -->
    <div class="bg-white shadow-md rounded-lg my-6 overflow-x-auto">
        <table class="min-w-full table-auto">
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">Nama</th>
                    <th class="py-3 px-6 text-left">NIS</th>
                    <th class="py-3 px-6 text-left">Kelas</th>
                    <th class="py-3 px-6 text-left">Alamat</th>
                    <th class="py-3 px-6 text-left">Jenis Kelamin</th>
                    <th class="py-3 px-6 text-left">No. HP</th>
                    <th class="py-3 px-6 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @foreach($siswa as $s)
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-left font-medium">{{ $s->nama }}</td>
                    <td class="py-3 px-6 text-left">{{ $s->nis }}</td>
                    <td class="py-3 px-6 text-left">{{ $s->kelas }}</td>
                    <td class="py-3 px-6 text-left">{{ $s->alamat }}</td>
                    <td class="py-3 px-6 text-left">{{ $s->jenis_kelamin }}</td>
                    <td class="py-3 px-6 text-left">{{ $s->no_hp }}</td>
                    <td class="py-3 px-6 text-center">
                        <div class="flex item-center justify-center space-x-2">
                            <button onclick="openModal('modalEdit', {{ $s }})"
                                class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded flex items-center">
                                <i class="fas fa-edit mr-1"></i>Edit
                            </button>
                            <button onclick="deleteSiswa({{ $s->id }})"
                                class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded flex items-center">
                                <i class="fas fa-trash mr-1"></i>Hapus
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Tambah Siswa -->
<div id="modalTambah" class="modal-container fixed inset-0 z-50 hidden">
    <div class="fixed inset-0 bg-black bg-opacity-50"></div>

    <div class="fixed inset-0 overflow-y-auto">
        <div class="flex justify-center mt-20 p-4">
            <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all w-full max-w-2xl">
                <!-- Header -->
                <div class="bg-white px-4 py-3 border-b">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-semibold text-gray-900">Tambah Siswa</h3>
                        <button onclick="closeModal('modalTambah')" class="text-gray-400 hover:text-gray-500">
                            <span class="sr-only">Close</span>
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Form -->
                <form id="formTambahSiswa" action="{{ route('siswa.store') }}" method="POST">
                    <div class="bg-white px-4 py-5">
                        <div class="grid grid-cols-2 gap-4">
                            <!-- Nama -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Nama Siswa</label>
                                <input type="text" name="nama" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>

                            <!-- NIS -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700">NIS</label>
                                <input type="text" name="nis" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>

                            <!-- Kelas -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Kelas</label>
                                <select name="kelas" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    <option value="">Pilih Kelas</option>
                                    <option value="X">Kelas Pagi</option>
                                    <option value="XI">Kelas Sore</option>
                                    <option value="XII">Kelas Malam</option>
                                </select>
                            </div>

                            <!-- Jenis Kelamin -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                                <select name="jenis_kelamin" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>

                            <!-- No HP -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700">No. HP</label>
                                <input type="tel" name="no_hp" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>

                            <!-- Alamat -->
                            <div class="col-span-2">
                                <label class="block text-sm font-medium text-gray-700">Alamat</label>
                                <textarea name="alamat" required rows="2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Footer -->
                    <div class="bg-gray-50 px-4 py-3 border-t flex justify-end space-x-3">
                        <button type="button" onclick="closeModal('modalTambah')" class="rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">
                            Batal
                        </button>
                        <button type="submit" class="rounded-md bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Siswa -->
<div id="modalEdit" class="modal-container fixed inset-0 z-50 hidden">
    <div class="fixed inset-0 bg-black bg-opacity-50"></div>

    <div class="fixed inset-0 overflow-y-auto">
        <div class="flex justify-center mt-20 p-4">
            <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all w-full max-w-2xl">
                <!-- Header -->
                <div class="bg-white px-4 py-3 border-b">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-semibold text-gray-900">Edit Siswa</h3>
                        <button onclick="closeModal('modalEdit')" class="text-gray-400 hover:text-gray-500">
                            <span class="sr-only">Close</span>
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Form -->
                <form id="formEditSiswa" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="bg-white px-4 py-5">
                        <div class="grid grid-cols-2 gap-4">
                            <!-- Nama -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Nama Siswa</label>
                                <input type="text" name="nama" id="edit_nama" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>

                            <!-- NIS -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700">NIS</label>
                                <input type="text" name="nis" id="edit_nis" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>
                            <!-- Kelas -->
                            <div>
                                 <label class="block text-sm font-medium text-gray-700">Kelas</label>
                                 <select name="kelas" id="edit_kelas" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                     <option value="">Pilih Kelas</option>
                                     <option value="X">Kelas Pagi</option>
                                     <option value="XI">Kelas Sore</option>
                                     <option value="XII">Kelas Malam</option>
                                 </select>
                            </div>
                            <!-- Jenis Kelamin -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                                <select name="jenis_kelamin" id="edit_jenis_kelamin" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>

                            <!-- No HP -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700">No. HP</label>
                                <input type="tel" name="no_hp" id="edit_no_hp" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>

                            <!-- Alamat -->
                            <div class="col-span-2">
                                <label class="block text-sm font-medium text-gray-700">Alamat</label>
                                <textarea name="alamat" id="edit_alamat" required rows="2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Footer -->
                    <div class="bg-gray-50 px-4 py-3 border-t flex justify-end space-x-3">
                        <button type="button" onclick="closeModal('modalEdit')" class="rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">
                            Batal
                        </button>
                        <button type="submit" class="rounded-md bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
// Fungsi untuk membuka modal
function openModal(modalId, siswa = null) {
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.classList.remove('hidden');

        // Jika ini adalah modal edit dan ada data siswa
        if (modalId === 'modalEdit' && siswa) {
            // Set action URL untuk form edit
            document.getElementById('formEditSiswa').action = `/siswa/${siswa.id}`;

            // Isi form dengan data siswa
            document.getElementById('edit_nama').value = siswa.nama;
            document.getElementById('edit_nis').value = siswa.nis;
            document.getElementById('edit_kelas').value = siswa.kelas;
            document.getElementById('edit_jenis_kelamin').value = siswa.jenis_kelamin;
            document.getElementById('edit_no_hp').value = siswa.no_hp;
            document.getElementById('edit_alamat').value = siswa.alamat;
        }
    }
}

// Fungsi untuk menutup modal
function closeModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.classList.add('hidden');
    }
}

// Handle form submit untuk tambah siswa
document.getElementById('formTambahSiswa').addEventListener('submit', function(e) {
    e.preventDefault();
    console.log("Form submitted");

    fetch(this.action, {
        method: 'POST',
        body: new FormData(this)
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        console.log(data);
        if (data.message) {
            alert(data.message);
            closeModal('modalTambah');
            location.reload();
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Terjadi kesalahan saat menyimpan data');
    });
});

// Handle form submit untuk edit siswa
document.getElementById('formEditSiswa').addEventListener('submit', function(e) {
    e.preventDefault();

    console.log(this.action);

    fetch(this.action, {
        method: 'POST',
        body: new FormData(this)
    })
    .then(response => response.json())
    .then(data => {
        if (data.message) {
            alert(data.message);
            closeModal('modalEdit');
            location.reload();
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Terjadi kesalahan saat mengupdate data');
    });
});

// Fungsi untuk menghapus siswa
function deleteSiswa(id) {
    if (confirm('Apakah Anda yakin ingin menghapus siswa ini?')) {
        fetch(`/siswa/${id}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            alert(data.message);
            location.reload();
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan saat menghapus data');
        });
    }
}
</script>
@endpush
