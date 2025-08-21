<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RBGeneralController extends Controller
{
    public function index()
    {
        return view('rb-general.index');
    }
}