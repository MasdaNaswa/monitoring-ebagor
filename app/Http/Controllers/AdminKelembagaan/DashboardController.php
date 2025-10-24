<?php

namespace App\Http\Controllers\AdminKelembagaan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Menampilkan view dashboard untuk AdminRB
        return view('adminkelembagaan.dashboard');
    }
}