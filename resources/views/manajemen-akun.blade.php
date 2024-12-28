@extends('sidebar')

@section('title', 'Manajemen Akun')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="bg-white rounded-md shadow-md p-6">
        <!-- Header -->
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-bold">Manajemen Akun</h2>
            <button onclick="showModal()" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600">
                + Edit Akun
            </button>
        </div>

        <!-- Table -->
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-100">
                    <th class="p-2">No</th>
                    <th class="p-2">Nama</th>
                    <th class="p-2">Username</th>
                    <th class="p-2">Role</th>
                    <th class="p-2">Status</th>
                    <th class="p-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $index => $user)
                <tr class="hover:bg-gray-50">
                    <td class="p-2">{{ $index + 1 }}</td>
                    <td class="p-2 font-medium">{{ $user['nama'] }}</td>
                    <td class="p-2">{{ $user['username'] }}</td>
                    <td class="p-2">{{ $user['role'] }}</td>
                    <td class="p-2">
                        <span class="{{ $user['status'] === 'Aktif' ? 'text-green-500' : 'text-red-500' }}">
                            {{ $user['status'] }}
                        </span>
                    </td>
                    <td class="p-2">
                        <button onclick="deleteUser({{ $user['id'] }})"
                                class="bg-red-500 text-white py-1 px-3 rounded ml-4 hover:bg-red-600 transition duration-200 transform hover:scale-105">
                            Hapus
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Tambah/Edit Akun -->
<div id="accountModal" class="fixed inset-0 hidden bg-gray-600 bg-opacity-50 flex items-center justify-center">
    <div class="bg-white rounded-md shadow-md p-6 w-full max-w-md">
        <button onclick="closeModal()" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600">
            ✖
        </button>
        <h3 id="modalTitle" class="text-lg font-bold mb-4">Tambah Akun Baru</h3>
        <form id="accountForm">
            <div class="space-y-4">
                <div>
                    <label for="nama" class="block text-gray-700">Nama</label>
                    <input type="text" id="nama" name="nama" class="w-full mt-1 rounded-md border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label for="username" class="block text-gray-700">Username</label>
                    <input type="text" id="username" name="username" class="w-full mt-1 rounded-md border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label for="password" class="block text-gray-700">Password</label>
                    <input type="password" id="password" name="password" class="w-full mt-1 rounded-md border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label for="role" class="block text-gray-700">Role</label>
                    <select id="role" name="role" class="w-full mt-1 rounded-md border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                        <option value="Pengelola">Pengelola</option>
                        <option value="Pengajar">Pengajar</option>
                        <option value="Siswa">Siswa</option>
                    </select>
                </div>
                <div>
                    <label for="status" class="block text-gray-700">Status</label>
                    <select id="status" name="status" class="w-full mt-1 rounded-md border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                        <option value="Aktif">Aktif</option>
                        <option value="Nonaktif">Nonaktif</option>
                    </select>
                </div>
            </div>
            <div class="flex justify-end mt-6">
                <button type="button" onclick="closeModal()" class="px-4 py-2 bg-gray-200 rounded-md hover:bg-gray-300">Batal</button>
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 ml-2">Simpan</button>
            </div>
        </form>
    </div>
</div>

<!-- Sertakan file JavaScript -->
<script src="{{ asset('js/manajemen_akun.js') }}"></script>
@endsection
