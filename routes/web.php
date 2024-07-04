<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WisataTempatController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['auth', 'ceklevel:Admin'])->group(function () {
    Route::resource('/user', UserController::class);
});

Route::middleware(['auth', 'ceklevel:Admin,Pengelola'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/kategori', KategoriController::class);
    Route::resource('/wisatatempat', WisataTempatController::class);
});

Route::get('/', [HomepageController::class, 'index']);

Route::get('homepage', [HomepageController::class, 'index'])->name('homepage');

Route::middleware(['guest'])->group(function () {
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login-post', [LoginController::class, 'authenticate'])->name('login.post');
    Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
});

Route::middleware(['auth'])->group(function () {
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    Route::post('logoutgues', [LoginController::class, 'logoutgues'])->name('logoutgues');
});

Route::get('detail-wisata/{id}', [HomepageController::class, 'detailwisata'])->name('detail-wisata');

Route::middleware(['auth'])->group(function () {
    Route::post('/pemesanan/store', [PemesananController::class, 'store'])->name('pemesanan.store');
    Route::post('/pemesanan/store', [PemesananController::class, 'store'])->name('pemesanan.store');
    Route::get('/pemesanan/detail', [PemesananController::class, 'detail'])->name('pemesanan.detail');
    Route::get('/pemesanan', [PemesananController::class, 'index'])->name('pemesanan.index');

    Route::get('/pemesanan/{id}/bayar', [PembayaranController::class, 'showForm'])->name('pembayaran.form')->middleware('check.pemesanan.status');
    Route::post('/pemesanan/{id}/bayar', [PembayaranController::class, 'store'])->name('pembayaran.store');

    Route::get('/pembayaran', [PembayaranController::class, 'index'])->name('pembayaran.index');
    Route::post('/pembayaran/update-status/{id}', [PembayaranController::class, 'updateStatus'])->name('pembayaran.updateStatus');

    Route::get('/pembayaran/{id}/lihat-bukti', [PembayaranController::class, 'lihatBuktiPembayaran'])->name('pembayaran.lihatBukti');
});

Route::post('/ratings', [RatingController::class, 'store'])->name('ratings.store');
Route::get('/wisata', [WisataTempatController::class, 'index'])->name('wisata.index');
Route::get('/pengguna', [UserController::class, 'index'])->name('pengguna.index');
Route::get('/pemesanan', [PemesananController::class, 'index'])->name('pemesanan.index');
