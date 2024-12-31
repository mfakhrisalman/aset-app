<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RiwayatController;

Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::resource('/users', UserController::class)->middleware('admin');

Route::resource('/asets', AssetController::class)->middleware('auth');

Route::get('/riwayat', [RiwayatController::class, 'index'])->middleware('auth');
Route::get('/peminjaman', [RiwayatController::class, 'pinjam'])->middleware('auth');
Route::post('/peminjaman/barcode', [RiwayatController::class, 'pinjamScan'])->middleware('auth');
Route::get('/pengembalian', [RiwayatController::class, 'kembali'])->middleware('auth');
Route::post('/pengembalian/barcode', [RiwayatController::class, 'kembaliScan'])->middleware('auth');
