@extends('sidebar')

@section('title', 'Beranda')

@section('content')

<!-- Content -->
<div class="flex-grow p-6 bg-gradient-to-br from-blue-50 to-white">
    <h1 class="text-4xl font-bold mb-6 text-gray-800 text-center">
        Selamat Datang di <span class="text-blue-500">Bimbel G109</span>
    </h1>
    <p class="text-center text-gray-600 mb-10">
        Platform terbaik untuk mendukung belajar siswa Anda. Temukan data dan informasi penting di bawah ini.
    </p>

    <!-- Stats Section -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Card: Total Siswa -->
        <div class="relative bg-white p-6 rounded-xl shadow-lg hover:shadow-2xl transition-shadow duration-300">
            <div class="flex items-center mb-6">
                <img src="https://img.icons8.com/ios-filled/80/4a90e2/student-male--v1.png" alt="Students" class="w-16 h-16 mr-4">
                <div>
                    <h3 class="text-4xl font-extrabold text-blue-500">45</h3>
                    <p class="text-lg text-gray-700 font-semibold">Total Siswa</p>
                </div>
            </div>
        </div>

        <!-- Card: Total Kelas -->
        <div class="relative bg-white p-6 rounded-xl shadow-lg hover:shadow-2xl transition-shadow duration-300">
            <div class="flex items-center mb-6">
                <img src="https://img.icons8.com/ios-filled/80/e57373/classroom.png" alt="Courses" class="w-16 h-16 mr-4">
                <div>
                    <h3 class="text-4xl font-extrabold text-pink-500">3</h3>
                    <p class="text-lg text-gray-700 font-semibold">Total Kelas</p>
                </div>
            </div>
        </div>

        <!-- Card: Pengguna Aktif -->
        <div class="relative bg-white p-6 rounded-xl shadow-lg hover:shadow-2xl transition-shadow duration-300">
            <div class="flex items-center mb-6">
                <img src="https://img.icons8.com/ios-filled/80/fec02f/businessman.png" alt="Users" class="w-16 h-16 mr-4">
                <div>
                    <h3 class="text-4xl font-extrabold text-yellow-500">3</h3>
                    <p class="text-lg text-gray-700 font-semibold">Pengguna Aktif</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Additional Section -->
    <div class="mt-12 bg-white p-6 rounded-xl shadow-lg">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Bimbel G109</h2>
        <p class="text-gray-600">
            Kami menyediakan layanan pembelajaran terbaik untuk mendukung siswa mencapai prestasi maksimal. Dengan Pengajar yang berpengalaman, kami berkomitmen untuk memberikan pengalaman belajar yang efektif dan menyenangkan.
        </p>
    </div>
</div>

@endsection
