<?php

namespace App\Http\Controllers\AdminRB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PKBupatiController extends Controller
{
    public function index(Request $request)
    {
        // Ambil tahun & semester dari query string
        $currentYear = $request->get('year', date('Y'));
        $currentSemester = $request->get('semester', '1');

        // Dummy data PK Bupati
        $pkData = [
            [
                'no' => 1,
                'tahun' => $currentYear,
                'sasaranStrategis' => 'Meningkatkan kualitas pelayanan publik',
                'indikatorKinerja' => 'Persentase kepuasan masyarakat',
                'target2025' => '85%',
                'satuan' => '%',
                'penanggungJawab' => 'Dinas Pelayanan',
                'program' => 'Program Reformasi Birokrasi',
                'analisisEvaluasi' => 'Perlu peningkatan SDM',
                'targetTW1' => '80%',
                'realisasiTW1' => '78%',
                'paguAnggaranTW1' => '200000000',
                'realisasiAnggaranTW1' => '180000000',
                'targetTW2' => '82%',
                'realisasiTW2' => '81%',
                'paguAnggaranTW2' => '220000000',
                'realisasiAnggaranTW2' => '210000000',
                'targetTW3' => '84%',
                'realisasiTW3' => '83%',
                'paguAnggaranTW3' => '250000000',
                'realisasiAnggaranTW3' => '240000000',
                'targetTW4' => '85%',
                'realisasiTW4' => '84%',
                'paguAnggaranTW4' => '300000000',
                'realisasiAnggaranTW4' => '290000000',
            ],
            [
                'no' => 2,
                'tahun' => $currentYear,
                'sasaranStrategis' => 'Meningkatkan akuntabilitas kinerja instansi',
                'indikatorKinerja' => 'Nilai SAKIP Kabupaten',
                'target2025' => 'A',
                'satuan' => 'Grade',
                'penanggungJawab' => 'Bagian Organisasi',
                'program' => 'Program Akuntabilitas',
                'analisisEvaluasi' => 'Masih perlu penguatan monitoring',
                'targetTW1' => 'BB',
                'realisasiTW1' => 'BB',
                'paguAnggaranTW1' => '100000000',
                'realisasiAnggaranTW1' => '95000000',
                'targetTW2' => 'BBB',
                'realisasiTW2' => 'BBB',
                'paguAnggaranTW2' => '120000000',
                'realisasiAnggaranTW2' => '115000000',
                'targetTW3' => 'A-',
                'realisasiTW3' => 'A-',
                'paguAnggaranTW3' => '150000000',
                'realisasiAnggaranTW3' => '145000000',
                'targetTW4' => 'A',
                'realisasiTW4' => 'A',
                'paguAnggaranTW4' => '180000000',
                'realisasiAnggaranTW4' => '175000000',
            ]
        ];

        // Data indikator (kalau mau dipakai di modal tambah/edit)
        $indikatorData = [
            'indikator1' => 'Persentase kepuasan masyarakat',
            'indikator2' => 'Nilai SAKIP Kabupaten',
        ];

        return view('adminrb.pk-bupati.index', compact('pkData', 'indikatorData', 'currentYear', 'currentSemester'));
    }
}
