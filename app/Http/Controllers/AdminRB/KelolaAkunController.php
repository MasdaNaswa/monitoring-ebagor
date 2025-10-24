<?php

namespace App\Http\Controllers\AdminRB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KelolaAkunController extends Controller
{
    public function index()
    {
        return view('adminrb.kelola-akun.index');
    }

    public function store(Request $request)
    {
        // Simulasi penyimpanan
        return back()->with('success', 'Akun berhasil ditambahkan (Demo Frontend)');
    }

    public function update(Request $request, $id)
    {
        return back()->with('success', 'Akun berhasil diupdate (Demo Frontend)');
    }

    public function destroy($id)
    {
        return back()->with('success', 'Akun berhasil dihapus (Demo Frontend)');
    }
}

