<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Menampilkan view dashboard
        return view('dashboard');
    }
}
