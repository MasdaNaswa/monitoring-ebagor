<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnjabdanABKController extends Controller
{
    /**
     * Tampilkan halaman index Anjab & ABK
     */
    public function index()
    {
        // nanti bisa return data dari database, untuk sekarang view aja
        return view('anjab-abk.index');
    }
}
