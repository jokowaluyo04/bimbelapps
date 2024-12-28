<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LaporanPerkembanganController;
use App\Http\Controllers\ManajemenAkunController;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Halaman Utama dan Beranda
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/beranda', function () {
    return view('beranda');
})->name('beranda');



/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

// Menampilkan halaman beranda
// Login
Route::get('/login', function () {
    return view('login');
})->name('login')->middleware('guest');  // Middleware guest memastikan hanya pengguna yang belum login yang dapat mengaksesnya

Route::post('/login', [AuthController::class, 'login'])->name('login');

// Register
Route::get('/register', function () {
    return view('register');
})->name('register')->middleware('guest');  // Middleware guest

Route::post('/register', [AuthController::class, 'register'])->name('register.process');

/*
|--------------------------------------------------------------------------
| Siswa Routes
|--------------------------------------------------------------------------
*/

Route::resource('siswa', SiswaController::class);

/*
|--------------------------------------------------------------------------
| Absensi Routes
|--------------------------------------------------------------------------
*/

Route::get('/absensi', function () {
    return view('absensi');
})->name('absensi');

Route::post('/absensi/store', [AbsensiController::class, 'store'])->name('absensi.store');

Route::prefix('absensi/kelas')->group(function () {
    Route::get('/pagi', [KelasController::class, 'kelasPagi'])->name('kelas.pagi');
    Route::get('/sore', [KelasController::class, 'kelasSore'])->name('kelas.sore');
    Route::get('/malam', [KelasController::class, 'kelasMalam'])->name('kelas.malam');
});

/*
|--------------------------------------------------------------------------
| Laporan Routes
|--------------------------------------------------------------------------
*/

Route::get('/laporan', [LaporanPerkembanganController::class, 'index']);

/*
|--------------------------------------------------------------------------
| User Management Routes
|--------------------------------------------------------------------------
*/

Route::get('/manajemen-akun', [ManajemenAkunController::class, 'show']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
