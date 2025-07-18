<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DokterController;
use App\Http\Controllers\Admin\PasienController;
use App\Http\Controllers\Admin\JadwalController;
use App\Http\Controllers\Admin\ReservasiController;
use App\Http\Controllers\Admin\KontakController;
use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\IsAdminMiddleware;
use App\Http\Controllers\Auth\RegisterController;

// PUBLIC ROUTES
Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/dokter', [PublicController::class, 'dokter'])->name('public.dokter');
Route::get('/jadwal', [PublicController::class, 'jadwal'])->name('public.jadwal');
Route::get('/reservasi', [PublicController::class, 'reservasi'])->name('public.reservasi');
Route::post('/reservasi', [PublicController::class, 'simpanReservasi'])->name('public.reservasi.store');

// Menampilkan form kontak (public)
Route::get('/kontak', [PublicController::class, 'kontak'])->name('public.kontak');

// Menyimpan data kontak (optional jika kamu punya form POST)
Route::post('/kontak', [PublicController::class, 'simpanKontak'])->name('public.kontak.store');


Route::prefix('admin')
    ->middleware(['auth', IsAdminMiddleware::class])
    ->name('admin.')
    ->group(function () {
        Route::get('/', fn() => redirect()->route('admin.dokter.index'));

        Route::resource('dokter', DokterController::class);
        Route::resource('pasien', PasienController::class);
        Route::resource('jadwal', JadwalController::class);
        Route::resource('reservasi', ReservasiController::class)->only(['index', 'show', 'edit', 'update', 'destroy']);
        Route::resource('kontak', KontakController::class)->only(['index', 'show', 'destroy']);
    });

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::put('admin/reservasi/{id}/status', [ReservasiController::class, 'updateStatus'])->name('admin.reservasi.updateStatus');

Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::middleware(['auth'])->group(function () {
    Route::get('/reservasi', [PublicController::class, 'reservasi'])->name('public.reservasi.create');
    Route::post('/reservasi', [PublicController::class, 'simpanReservasi'])->name('public.reservasi.store');
});
Route::get('/reservasi', [PublicController::class, 'reservasi'])->name('public.reservasi');
Route::get('/reservasi/konfirmasi', [PublicController::class, 'konfirmasiReservasi'])->name('public.reservasi.konfirmasi')->middleware('auth');

