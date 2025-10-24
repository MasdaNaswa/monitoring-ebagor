<?php

namespace App\Http\Controllers\AdminRB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RBTematikController extends Controller
{
    /**
     * Tampilkan halaman RB Tematik
     */
    public function index()
    {
        // Dummy data RB Tematik (sementara sebelum tarik dari database)
        $rbTematik = [
            (object)[
                'permasalahan' => 'Kurangnya sarana transportasi untuk siswa',
                'sasaran_tematik' => 'Siswa SD dan SMP',
                'indikator' => 'Jumlah sarana transportasi disediakan',
                'target' => 50,
                'satuan' => 'Unit',
                'capaian' => 20
            ],
            (object)[
                'permasalahan' => 'Kualitas layanan kesehatan di puskesmas rendah',
                'sasaran_tematik' => 'Masyarakat desa',
                'indikator' => 'Jumlah puskesmas yang terakreditasi',
                'target' => 10,
                'satuan' => 'Puskesmas',
                'capaian' => 5
            ],
        ];

        return view('adminrb.rb-tematik.index', compact('rbTematik'));
    }
}
