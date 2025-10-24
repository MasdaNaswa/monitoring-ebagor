<?php

namespace App\Http\Controllers\OPD;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Menampilkan view dashboard di folder opd
        return view('opd.dashboard');
    }
}
