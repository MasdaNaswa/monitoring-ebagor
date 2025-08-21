<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PelayananPublikController extends Controller
{
    public function index()
    {
        return view('pelayanan-publik.index');
    }
}