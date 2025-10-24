<?php

namespace App\Http\Controllers\AdminKelembagaan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KematanganKelembagaanController extends Controller
{
    // Simpan dummy data sementara (biasanya ini di DB)
    private $dummyForms = [
        [
            'id' => 1,
            'link' => 'https://forms.gle/abcd1234',
            'created_at' => '2025-10-01',
        ],
        [
            'id' => 2,
            'link' => 'https://forms.gle/efgh5678',
            'created_at' => '2025-10-05',
        ]
    ];

    public function index()
    {
        $gforms = collect($this->dummyForms);

        return view('adminkelembagaan.kematangan-kelembagaan.index', compact('gforms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'link' => 'required|url'
        ]);

        // Dummy response saja, belum simpan ke DB
        return redirect()->route('adminkelembagaan.kematangan-kelembagaan.index')
                         ->with('success', 'Link Google Form berhasil ditambahkan (dummy, belum tersimpan)');
    }

    public function destroy($id)
    {
        // Dummy response saja
        return redirect()->route('adminkelembagaan.kematangan-kelembagaan.index')
                         ->with('success', "Link Google Form dengan ID {$id} berhasil dihapus (dummy, belum terhapus)");
    }
}
