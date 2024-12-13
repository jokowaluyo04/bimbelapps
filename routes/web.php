<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LaporanPerkembanganController;
use App\Http\Controllers\LaporanController;


/*
|--------------------------------------------------------------------------
| Halaman Utama dan Beranda
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/beranda', function () {
    return view('beranda');
})->name('beranda');

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'showLogin'])->name('login.show');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register.show');
Route::post('/register', [AuthController::class, 'register'])->name('register');

/*
|--------------------------------------------------------------------------
| Siswa Routes
|--------------------------------------------------------------------------
*/

Route::prefix('siswa')->group(function () {
    Route::get('/', [SiswaController::class, 'index'])->name('siswa.index');
    Route::get('/create', [SiswaController::class, 'create'])->name('siswa.create');
    Route::post('/', [SiswaController::class, 'store'])->name('siswa.store');
    Route::get('/{siswa}', [SiswaController::class, 'show'])->name('siswa.show');
    Route::get('/{siswa}/edit', [SiswaController::class, 'edit'])->name('siswa.edit');
    Route::put('/{siswa}', [SiswaController::class, 'update'])->name('siswa.update');
    Route::delete('/{siswa}', [SiswaController::class, 'destroy'])->name('siswa.destroy');
});

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

Route::prefix('laporan')->group(function () {
    Route::get('/', [LaporanController::class, 'index'])->name('laporan.index');
    Route::get('/{id}/detail', [LaporanController::class, 'detail'])->name('laporan.detail');
});

Route::prefix('api')->group(function () {
    Route::get('/laporan/{id}', [LaporanController::class, 'show']);
    Route::post('/laporan', [LaporanController::class, 'store']);
    Route::put('/laporan/{id}', [LaporanController::class, 'update']);
});

/*
|--------------------------------------------------------------------------
| User Management Routes
|--------------------------------------------------------------------------
*/

Route::prefix('manajemen-akun')->group(function () {
    Route::get('/', [UserManagementController::class, 'index'])->name('manajemen-akun.index');
    Route::post('/', [UserManagementController::class, 'store'])->name('manajemen-akun.store');
    Route::put('/{id}', [UserManagementController::class, 'update'])->name('manajemen-akun.update');
    Route::delete('/{id}', [UserManagementController::class, 'destroy'])->name('manajemen-akun.destroy');
});

/*
|--------------------------------------------------------------------------
| Resource Routes
|--------------------------------------------------------------------------
*/

Route::resource('users', UserController::class);
Route::resource('siswa', SiswaController::class);
Route::resource('laporan', LaporanPerkembanganController::class);
