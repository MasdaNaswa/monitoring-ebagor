<?php

namespace App\Http\Controllers\OPD;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KematanganKelembagaanController extends Controller
{
    /**
     * Menampilkan halaman Kematangan Kelembagaan
     */
    public function index()
    {
        // Bisa kirim data dari database nanti jika perlu
        return view('opd.kematangan.index'); // Pastikan file Blade ada di resources/views/kelembagaan/kematangan.blade.php
    }
}
