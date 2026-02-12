<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PenjualanController;
use Illuminate\Support\Facades\Route;
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::middleware('auth')->group(function () {
Route::get('/', function () {
return view('home');
});
Route::resource('pelanggan', PelangganController::class);
Route::resource('penjualan', PenjualanController::class);
Route::get('penjualan/{id}/invoice', [PenjualanController::class, 'invoice'])->name('penjualan.invoice');
Route::resource('barang', BarangController::class);
});
