<?php

namespace App\Http\Controllers\OPD;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PelayananPublikController extends Controller
{
    public function index(Request $request)
    {
        // Ambil filter tahun & semester dari query string
        $currentYear = $request->query('year', date('Y'));
        $currentSemester = $request->query('semester', '1');

        // Contoh data pelayanan publik (dummy data)
        $pelayananData = [
            [
                'no' => 1,
                'namaLayanan' => 'Pembuatan KTP',
                'deskripsi' => 'Layanan pembuatan KTP elektronik untuk warga',
                'targetPelayanan' => 1000,
                'satuan' => 'Orang',
                'penanggungJawab' => 'Dinas Kependudukan'
            ],
            [
                'no' => 2,
                'namaLayanan' => 'Pembuatan KK',
                'deskripsi' => 'Layanan pembuatan Kartu Keluarga',
                'targetPelayanan' => 500,
                'satuan' => 'KK',
                'penanggungJawab' => 'Dinas Kependudukan'
            ],
            [
                'no' => 3,
                'namaLayanan' => 'Perizinan Usaha',
                'deskripsi' => 'Layanan perizinan usaha mikro dan kecil',
                'targetPelayanan' => 200,
                'satuan' => 'Izin',
                'penanggungJawab' => 'Dinas Penanaman Modal'
            ],
        ];

        return view('opd.pelayanan-publik.index', compact('pelayananData', 'currentYear', 'currentSemester'));
    }
}
