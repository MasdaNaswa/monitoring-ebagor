<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OPD\DashboardController as OPDDashboardController;
use App\Http\Controllers\OPD\RBGeneralController;
use App\Http\Controllers\OPD\RBTematikController;
use App\Http\Controllers\OPD\PKBupatiController;
use App\Http\Controllers\OPD\AnjabdanABKController; 
use App\Http\Controllers\DownloadController; 
use App\Http\Controllers\OPD\ProfileController;
use App\Http\Controllers\OPD\PetajabController; 
use App\Http\Controllers\OPD\KematanganKelembagaanController; 
use App\Http\Controllers\OPD\EvajabController; 
use App\Http\Controllers\OPD\PelayananPublikController;
use App\Http\Controllers\OPD\AdminController;
use App\Http\Controllers\AdminRB\RBAksesController;
use App\Http\Controllers\AdminRB\RBGeneralController as AdminRBRBGeneralController;
use App\Http\Controllers\AdminRB\RBTematikController as AdminRBRBTematikController;
use App\Http\Controllers\AdminRB\PKBupatiController as AdminRBPKBupatiController;
use App\Http\Controllers\AdminRB\KelolaDataController;;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminRB\KelolaAkunController;
use App\Http\Controllers\AdminPelayananPublik\KategoriController;
use App\Http\Controllers\AdminPelayananPublik\KelolaAkunController as AdminPelayananPublikKelolaAkunController;
use App\Http\Controllers\AdminRB\DashboardController  as AdminRBDashboardController;
use App\Http\Controllers\AdminPelayananPublik\DashboardController  as AdminPelayananPublikDashboardController;
use App\Http\Controllers\AdminPelayananPublik\LaporanController;
use App\Http\Controllers\AdminPelayananPublik\TemplateController;
use App\Http\Controllers\AdminKelembagaan\DashboardController  as AdminKelembagaanDashboardController;
use App\Http\Controllers\AdminKelembagaan\KelolaAkunController as AdminKelembagaanKelolaAkunController;
use App\Http\Controllers\AdminKelembagaan\KematanganKelembagaanController as AdminKelembagaanKematanganKelembagaanController;
use App\Http\Controllers\AdminKelembagaan\DokumenController;
use function PHPUnit\Framework\callback;



// Dashboard OPD Route 
Route::get('/dashboard', [OPDDashboardController::class, 'index'])->name('dashboard');

// Dashboard AdminRB Route
Route::get('/adminrb/dashboard', [AdminRBDashboardController::class, 'index'])->name('adminrb.dashboard');

// Dashboard Admin Pelayanan Publik Route
Route::get('/adminpelayananpublik/dashboard', [AdminPelayananPublikDashboardController::class, 'index'])->name('adminpelayananpublik.dashboard');

// Dashboard Admin Kelembagaan Route
Route::get('/adminkelembagaan/dashboard', [AdminKelembagaanDashboardController::class, 'index'])->name('adminkelembagaan.dashboard');

// Admin Pelayanan Publik Kelola Akun Routes
Route::prefix('adminpelayananpublik')->group(function () {  
    Route::get('/kelola-akun', [AdminPelayananPublikKelolaAkunController::class, 'index'])->name('adminpelayananpublik.kelola-akun.index');
    
    // Tambahkan route store
    Route::post('/kelola-akun', [AdminPelayananPublikKelolaAkunController::class, 'store'])->name('akun.store');

    // Optional: update dan destroy
    Route::put('/kelola-akun/{id}', [AdminPelayananPublikKelolaAkunController::class, 'update'])->name('akun.update');
    Route::delete('/kelola-akun/{id}', [AdminPelayananPublikKelolaAkunController::class, 'destroy'])->name('akun.destroy');
});

// Kategori Laporan Admin Pelayanan Publik Routes
Route::prefix('adminpelayananpublik')->group(function () {
    Route::get('/kategori', [KategoriController::class, 'index'])->name('adminpelayananpublik.kategori.index');
    Route::post('/kategori', [KategoriController::class, 'store'])->name('adminpelayananpublik.kategori.store');
    Route::put('/kategori/{id}', [KategoriController::class, 'update'])->name('adminpelayananpublik.kategori.update');
    Route::delete('/kategori/{id}', [KategoriController::class, 'destroy'])->name('adminpelayananpublik.kategori.destroy');
});

// Admin Pelayanan Publik Laporan Routes
Route::prefix('adminpelayananpublik')->name('adminpelayananpublik.')->group(function () {
    Route::get('laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::get('laporan/{id}/edit', [LaporanController::class, 'edit'])->name('laporan.edit');
    Route::post('laporan/{id}/update', [LaporanController::class, 'update'])->name('laporan.update');
    Route::post('laporan/{id}/verifikasi', [LaporanController::class, 'verifikasi'])->name('laporan.verifikasi');
    Route::delete('laporan/{id}', [LaporanController::class, 'hapus'])->name('laporan.hapus');
});

// Admin Pelayanan Publik Template Routes
Route::prefix('adminpelayananpublik')->name('adminpelayananpublik.')->group(function () {
    Route::get('template', [TemplateController::class, 'index'])->name('template.index');
    Route::post('template/tambah', [TemplateController::class, 'store'])->name('template.store');
    Route::post('template/{id}/update', [TemplateController::class, 'update'])->name('template.update');
    Route::delete('template/{id}/hapus', [TemplateController::class, 'destroy'])->name('template.destroy');
});

// Admin RB Kelola Akun Routes
Route::prefix('adminrb')->group(function () {
    Route::get('/kelola-akun', [KelolaAkunController::class, 'index'])->name('adminrb.kelola-akun.index');
    
    // Tambahkan route store
    Route::post('/kelola-akun', [KelolaAkunController::class, 'store'])->name('akun.store');

    // Optional: update dan destroy
    Route::put('/kelola-akun/{id}', [KelolaAkunController::class, 'update'])->name('akun.update');
    Route::delete('/kelola-akun/{id}', [KelolaAkunController::class, 'destroy'])->name('akun.destroy');
});

// Admin RB General
Route::prefix('adminrb')->group(function () {
    Route::get('/rb-general', [AdminRBRBGeneralController::class, 'index'])->name('adminrb.rb-general.index');
});


// RB Tematik
Route::prefix('adminrb')->group(function () {
    Route::get('/rb-tematik', [AdminRBRBTematikController::class, 'index'])->name('adminrb.rb-tematik.index');
});

// PK Bupati
Route::prefix('adminrb')->group(function () {
    Route::get('/pk-bupati', [AdminRBPKBupatiController::class, 'index'])->name('adminrb.pk-bupati.index');
});

// Admin RB Kelola Data
Route::prefix('adminrb')->group(function () {
    Route::get('/kelola-data', [KelolaDataController::class, 'index'])->name('adminrb.kelola-data.index');

    // Tambah route store
    Route::post('/kelola-data', [KelolaDataController::class, 'store'])->name('sasaran.store');

    // Optional: route edit, update, delete
    Route::put('/kelola-data/{id}', [KelolaDataController::class, 'update'])->name('sasaran.update');
    Route::delete('/kelola-data/{id}', [KelolaDataController::class, 'destroy'])->name('sasaran.destroy');
});

// Admin Kelembagaan Kelola Akun Routes
Route::prefix('adminkelembagaan')->group(function () {  
    Route::get('/kelola-akun', [AdminKelembagaanKelolaAkunController::class, 'index'])->name('adminkelembagaan.kelola-akun.index');
    
    // Tambahkan route store
    Route::post('/kelola-akun', [AdminKelembagaanKelolaAkunController::class, 'store'])->name('akun.store');

    // Optional: update dan destroy
    Route::put('/kelola-akun/{id}', [AdminKelembagaanKelolaAkunController::class, 'update'])->name('akun.update');
    Route::delete('/kelola-akun/{id}', [AdminKelembagaanKelolaAkunController::class, 'destroy'])->name('akun.destroy');
});

// Admin Kelembagaan Dokumen Routes
Route::prefix('adminkelembagaan')->name('adminkelembagaan.')->group(function () {

    // === SEMUA DOKUMEN ===
    Route::get('/dokumen', [DokumenController::class, 'index'])
        ->name('dokumen.index');
});

// Admin Kelembagaan Kematangan Kelembagaan Routes
Route::prefix('adminkelembagaan')->name('adminkelembagaan.')->group(function () {
 Route::get('/kematangan-kelembagaan', [AdminKelembagaanKematanganKelembagaanController::class, 'index'])
        ->name('kematangan-kelembagaan.index');
    Route::post('/kematangan-kelembagaan', [AdminKelembagaanKematanganKelembagaanController::class, 'store'])
        ->name('kematangan-kelembagaan.store');
    Route::delete('/kematangan-kelembagaan/{id}', [AdminKelembagaanKematanganKelembagaanController::class, 'destroy'])
        ->name('kematangan-kelembagaan.destroy');
});        

// Login Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

// Logout Route - Diperbaiki
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// RB Routes
Route::prefix('rb-general')->group(function () {
    Route::get('/', [RBGeneralController::class, 'index'])->name('rb-general.index');
});

Route::prefix('rb-tematik')->group(function () {
    Route::get('/', [RBTematikController::class, 'index'])->name('rb-tematik.index');
});

// SAKIP Routes
Route::prefix('pk-bupati')->group(function () {
    Route::get('/', [PKBupatiController::class, 'index'])->name('pk-bupati.index');
    Route::get('/pk-bupati/download/pdf', [DownloadController::class, 'downloadPKPdf'])->name('pkbupati.download.pdf');
Route::get('/pk-bupati/download/excel', [DownloadController::class, 'downloadPKExcel'])->name('pkbupati.download.excel');
});

// Analisis Jabatan dan Analisis Beban Kerja Routes
Route::prefix('anjab-abk')->group(function () {
    Route::get('/', [AnjabdanABKController::class, 'index'])->name('anjab-abk.index');
});

// Peta Jabatan Route
Route::prefix('petajab')->group(function () {
    Route::get('/', [PetajabController::class, 'index'])->name('petajab.index');
});


// Evaluasi Jabatan Route
Route::prefix('evajab')->group(function () {
    Route::get('/', [EvajabController::class, 'index'])->name('evajab.index');
});

// Kematangan Kelembagaan Route
Route::prefix('kematangan')->group(function () {
    Route::get('/', [KematanganKelembagaanController::class, 'index'])->name('kematangan.index');
});


// Pelayanan Publik Routes
Route::prefix('pelayanan-publik')->group(function () {
    Route::get('/', [PelayananPublikController::class, 'index'])->name('pelayanan-publik.index');
});

// Admin Profile Route
Route::get('/admin/profil', [AdminController::class, 'profile'])->name('admin.profile');

Route::prefix('adminrb')->group(function () {
    // Kontrol Akses RB
    Route::get('/aksesrb', [RBAksesController::class, 'index'])->name('adminrb.aksesrb.index');
    Route::put('/aksesrb/{id}', [RBAksesController::class, 'update'])->name('rb-access.update');
});


// Halaman profile edit **tanpa middleware auth**
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');

// Dummy routes untuk form submission (tidak melakukan update)
Route::put('/profile/update', function() {
    return back()->with('success', 'Profil berhasil diperbarui (Demo Frontend)');
})->name('profile.update');

Route::put('/profile/update-password', function() {
    return back()->with('success', 'Kata sandi berhasil diperbarui (Demo Frontend)');
})->name('profile.update.password');

Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('login');
})->name('logout');

// Fallback untuk route yang belum diimplementasi
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});