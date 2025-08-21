<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PKBupatiController extends Controller
{
    public function index()
    {
        return view('pk-bupati.index');
    }
}