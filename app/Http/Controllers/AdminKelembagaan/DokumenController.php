<?php

namespace App\Http\Controllers\AdminKelembagaan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DokumenController extends Controller
{
    public function index()
    {
        // Dummy data sebagai object
        $dokumen = [
            (object)[
                'id' => 1,
                'nama_dokumen' => 'Laporan Anjab',
                'file' => 'dokumen1.pdf',
                'created_at' => new \DateTime('2025-10-08'),
                'opd' => (object)['nama_opd' => 'Dinas Pendidikan']
            ],
            (object)[
                'id' => 2,
                'nama_dokumen' => 'Laporan Evajab',
                'file' => 'dokumen2.pdf',
                'created_at' => new \DateTime('2025-10-08'),
                'opd' => (object)['nama_opd' => 'Dinas Kesehatan']
            ]
        ];

        return view('adminkelembagaan.dokumen.index', compact('dokumen'));
    }
}
