<?php

namespace App\Http\Controllers\AdminRB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RBGeneralController extends Controller
{
    /**
     * Tampilkan halaman utama Admin RB
     */
    public function index()
    {
        // Dummy data RB General (sementara sebelum tarik dari database)
        $rbGeneralData = [
            [
                'no' => 1,
                'opd' => 'Dinas Pendidikan',
                'indikator' => 'Jumlah Guru yang Dilatih',
                'isi_data' => '120',
                'tahun' => '2025',
                'status' => 'Terverifikasi',
                'status_class' => 'bg-green-100 text-green-700'
            ],
            [
                'no' => 2,
                'opd' => 'Dinas Kesehatan',
                'indikator' => 'Jumlah Puskesmas Terakreditasi',
                'isi_data' => '45',
                'tahun' => '2025',
                'status' => 'Belum Verifikasi',
                'status_class' => 'bg-yellow-100 text-yellow-700'
            ],
            [
                'no' => 3,
                'opd' => 'Dinas Kominfo',
                'indikator' => 'Jumlah Layanan Online',
                'isi_data' => '15',
                'tahun' => '2025',
                'status' => 'Ditolak',
                'status_class' => 'bg-red-100 text-red-700'
            ],
        ];

        return view('adminrb.rb-general.index', compact('rbGeneralData'));
    }
}
