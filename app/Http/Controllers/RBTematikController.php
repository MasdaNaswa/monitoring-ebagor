<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RBTematikController extends Controller
{
    public function index()
    {
        return view('rb-tematik.index');
    }
}