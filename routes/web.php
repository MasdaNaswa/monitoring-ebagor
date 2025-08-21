<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RBGeneralController;
use App\Http\Controllers\RBTematikController;
use App\Http\Controllers\PKBupatiController;
use App\Http\Controllers\KelembagaanController;
use App\Http\Controllers\PelayananPublikController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;


Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// Dashboard Route
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


// Login Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');


// Logout Route 
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

// Kelembagaan Routes
Route::prefix('kelembagaan')->group(function () {
    Route::get('/anjab', [KelembagaanController::class, 'anjab'])->name('kelembagaan.anjab');
    Route::get('/abk', [KelembagaanController::class, 'abk'])->name('kelembagaan.abk');
    Route::get('/petajab', [KelembagaanController::class, 'petajab'])->name('kelembagaan.petajab');
    Route::get('/evajab', [KelembagaanController::class, 'evajab'])->name('kelembagaan.evajab');
    Route::get('/kematangan', [KelembagaanController::class, 'kematangan'])->name('kelembagaan.kematangan');
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