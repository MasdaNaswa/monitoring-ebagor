<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KelembagaanController extends Controller
{
    public function anjab()
    {
        return view('kelembagaan.anjab');
    }
    
    public function abk()
    {
        return view('kelembagaan.abk');
    }
    
    public function petajab()
    {
        return view('kelembagaan.petajab');
    }
    
    public function evajab()
    {
        return view('kelembagaan.evajab');
    }
    
    public function kematangan()
    {
        return view('kelembagaan.kematangan');
    }
}