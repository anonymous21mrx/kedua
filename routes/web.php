<?php

use App\Http\Controllers\AdminLayananController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\AdminMiddleware;

use Illuminate\Support\Facades\Artisan;

Route::get('/setup-db', function() {
    try {
        Artisan::call('migrate:fresh', ['--force' => true, '--seed' => true]);
        return "Database berhasil di-migrate dan di-seed! Silakan buka halaman utama.";
    } catch (\Exception $e) {
        return "Error: " . $e->getMessage();
    }
});

Route::get('/', [TokoController::class, 'index'])->name('home');
Route::get('/projects', [TokoController::class, 'projects'])->name('projects');
Route::get('/projects/{id}', [TokoController::class, 'showProject'])->name('projects.show');
Route::get('/about', [TokoController::class, 'about']);
Route::get('/contact', [TokoController::class, 'contact']);


Route::get('/pilar/{id}', [TokoController::class, 'showPilar'])->name('pilar.show');
Route::get('/berita/{id}', [TokoController::class, 'showBerita'])->name('berita.show');

// Route Autentikasi Manual
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.proses');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware([AdminMiddleware::class])->group(function () {
    
    // Halaman Utama Dashboard Admin 
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    
    Route::get('/admin/layanan', [AdminLayananController::class, 'index'])->name('admin.layanan.index');
    // 2. Tampil Form Tambah
    Route::get('/admin/layanan/create', [AdminLayananController::class, 'create'])->name('admin.layanan.create');
    // 3. Proses Simpan Tambah Data
    Route::post('/admin/layanan/store', [AdminLayananController::class, 'store'])->name('admin.layanan.store');

    Route::get('/admin/layanan/pdf', [AdminLayananController::class, 'cetakPdf'])->name('admin.layanan.pdf');

    
    // 4. Tampil Form Edit
    Route::get('/admin/layanan/{id}/edit', [AdminLayananController::class, 'edit'])->name('admin.layanan.edit');
    // 5. Proses Simpan Perubahan Data
    Route::post('/admin/layanan/{id}/update', [AdminLayananController::class, 'update'])->name('admin.layanan.update');
    // 6. Proses Hapus Data
    Route::post('/admin/layanan/{id}/delete', [AdminLayananController::class, 'destroy'])->name('admin.layanan.destroy');
});