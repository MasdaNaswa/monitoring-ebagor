<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('login'); // login.blade.php
    }

    // Proses login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        // Validasi role
        $role = $request->role;
        $opd = $request->opd ?? null;

        // Contoh autentikasi sederhana
        // Bisa diganti dengan Auth::attempt jika menggunakan table users
        if($credentials['email'] === 'admin@example.com' && $credentials['password'] === 'password' && $role === 'bagor'){
            // Redirect ke dashboard Bagor
            return redirect()->route('dashboard'); // atau route('bagor-dashboard')
        }

        if($credentials['email'] === 'opd@example.com' && $credentials['password'] === 'password' && $role === 'opd'){
            if(!$opd){
                return back()->withErrors(['opd' => 'Silakan pilih OPD terlebih dahulu!']);
            }
            // Redirect ke dashboard OPD
            return redirect()->to('/opd-dashboard?opd=' . $opd);
        }

        return back()->withErrors(['email' => 'Email atau password salah']);
    }
}
