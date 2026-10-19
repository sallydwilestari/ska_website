<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfilPerusahaanController;
use App\Http\Controllers\Admin\ProdukLayananController;
use App\Http\Controllers\Admin\ArtikelController;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\PesanKontakController;
use App\Http\Controllers\DetailPublikController;
use App\Models\ProfilPerusahaan;
use App\Models\ProdukLayanan;
use App\Models\Artikel;
use App\Models\Galeri;

// ========================================
// HALAMAN UTAMA PENGUNJUNG
// ========================================

Route::get('/', function () {
    $profil = ProfilPerusahaan::first();

    $produkLayanans = ProdukLayanan::where('status', true)
        ->latest()
        ->get();

    $artikels = Artikel::where('status', true)
        ->latest()
        ->get();

    $galeris = Galeri::latest()->get();

    return view('home', compact(
        'profil',
        'produkLayanans',
        'artikels',
        'galeris'
    ));
})->name('home');

// ========================================
// LOGIN ADMIN
// ========================================

Route::get('/admin/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/admin/login', [AuthController::class, 'login'])
    ->name('login.process');

// ========================================
// DETAIL PUBLIK — TANPA LOGIN
// ========================================

Route::get('/produk-layanan/{id}', [DetailPublikController::class, 'produk'])
    ->name('detail.produk');

Route::get('/artikel/{id}', [DetailPublikController::class, 'artikel'])
    ->name('detail.artikel');

Route::get('/galeri/{id}', [DetailPublikController::class, 'galeri'])
    ->name('detail.galeri');

// ========================================
// FORM KONTAK PENGUNJUNG
// ========================================

Route::post('/kontak', [PesanKontakController::class, 'store'])
    ->name('kontak.store');

// ========================================
// HALAMAN KHUSUS ADMIN
// ========================================

Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
        ->name('admin.dashboard');

    // Profil Perusahaan
    Route::get('/admin/profil', [ProfilPerusahaanController::class, 'edit'])
        ->name('admin.profil.edit');

    Route::put('/admin/profil', [ProfilPerusahaanController::class, 'update'])
        ->name('admin.profil.update');

    // CRUD Produk & Layanan
    Route::resource('admin/produk-layanan', ProdukLayananController::class)
        ->names('admin.produk-layanan');

    // CRUD Artikel
    Route::resource('admin/artikel', ArtikelController::class)
        ->names('admin.artikel');

    // CRUD Galeri
    Route::resource('admin/galeri', GaleriController::class)
        ->names('admin.galeri');

    // Pesan Kontak
    Route::get('/admin/kontak', [PesanKontakController::class, 'index'])
        ->name('admin.kontak.index');

    Route::get('/admin/kontak/{pesanKontak}', [PesanKontakController::class, 'show'])
        ->name('admin.kontak.show');

    Route::delete('/admin/kontak/{pesanKontak}', [PesanKontakController::class, 'destroy'])
        ->name('admin.kontak.destroy');

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');
});
