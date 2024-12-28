<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\AbsensiController;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\API\LaporanController;


Route::middleware(['auth:api'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:sanctum'])->delete('/user', [AuthController::class, 'destroy']);
