<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PKBupatiController extends Controller
{
    // Menampilkan halaman PK Bupati
    public function index(Request $request)
    {
        // Data dummy PK Bupati (bisa diganti dengan query dari database)
        $pkData = [
            [
                'no' => 1,
                'sasaranStrategis' => 'Meningkatnya Investasi Daerah',
                'indikatorKinerja' => 'Nilai Investasi',
                'target2025' => 25.0,
                'satuan' => 'Triliun',
                'penanggungJawab' => 'Dinas Penanaman Modal dan Pelayanan Satu Pintu',
            ],
            [
                'no' => 2,
                'sasaranStrategis' => 'Berkembangnya Sektor Ekonomi Dominan',
                'indikatorKinerja' => 'Nilai PDRB Sektor Pertanian, Kehutanan Dan Perikanan',
                'target2025' => 2780.95,
                'satuan' => 'Miliar',
                'penanggungJawab' => 'Dinas Pangan dan Pertanian',
            ],
        ];

        // Tahun dan semester yang dipilih (default)
        $currentYear = $request->query('year', '2025');
        $currentSemester = $request->query('semester', '1');

        return view('pk-bupati.index', compact('pkData', 'currentYear', 'currentSemester'));
    }
}
