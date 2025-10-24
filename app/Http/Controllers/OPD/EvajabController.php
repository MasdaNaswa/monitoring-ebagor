<?php

namespace App\Http\Controllers\OPD;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EvajabController extends Controller
{
    public function index()
    {
        return view('opd.evajab.index');
    }
}
