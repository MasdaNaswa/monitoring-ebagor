<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RBGeneralController;
use App\Http\Controllers\RBTematikController;
use App\Http\Controllers\PKBupatiController;
use App\Http\Controllers\AnjabdanABKController; 
use App\Http\Controllers\PetajabController; 
use App\Http\Controllers\KematanganKelembagaanController; 
use App\Http\Controllers\EvajabController; 
use App\Http\Controllers\PelayananPublikController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use function PHPUnit\Framework\callback;



// Dashboard Route
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


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

// Logout Route
Route::post('/logout', function () {
    return 'Logout functionality would be here';
})->name('logout');

// Fallback untuk route yang belum diimplementasi
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});