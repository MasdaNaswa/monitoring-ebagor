<?php

namespace App\Http\Controllers\OPD;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PetajabController extends Controller
{
    /**
     * Menampilkan halaman Peta Jabatan
     */
    public function index()
    {
        // Bisa kirim data dari database nanti jika perlu
        return view('opd.petajab.index'); // Pastikan file Blade ada di resources/views/kelembagaan/petajab.blade.php
    }
}
