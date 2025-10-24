<?php

namespace App\Http\Controllers\OPD;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RBTematikController extends Controller
{
    public function index()
    {
        // Tahun sekarang
        $currentYear = date('Y');

        // Data dummy RB Tematik
        $rbTematik = [
            (object)[
                'permasalahan' => 'Penanggulangan Kemiskinan',
                'sasaran_tematik' => 'Peningkatan kesejahteraan masyarakat',
                'indikator' => 'Persentase keluarga miskin berkurang',
                'target' => '10',
                'satuan' => '%',
                'capaian' => '2',
                'status' => 'draft',
                'id' => 1,
            ],
            (object)[
                'permasalahan' => 'Peningkatan Investasi',
                'sasaran_tematik' => 'Meningkatkan jumlah investor',
                'indikator' => 'Jumlah investasi masuk',
                'target' => '5',
                'satuan' => 'Investor',
                'capaian' => '1',
                'status' => 'aktif',
                'id' => 2,
            ],
        ];

        // Data tambahan untuk modal tambah (jumlah data saat ini)
        $dataForYear = $rbTematik;

        return view('opd.rb-tematik.index', compact('rbTematik', 'currentYear', 'dataForYear'));
    }
}
