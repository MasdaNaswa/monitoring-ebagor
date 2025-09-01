<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EvajabController extends Controller
{
    /**
     * Menampilkan halaman Evaluasi Jabatan
     */
    public function index()
    {
        // Menampilkan view resources/views/kelembagaan/evajab.blade.php
        return view('evajab.index');
    }
}
