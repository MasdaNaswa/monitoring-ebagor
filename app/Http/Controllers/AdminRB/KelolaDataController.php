<?php

namespace App\Http\Controllers\AdminRB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KelolaDataController extends Controller
{
    // Tampilkan halaman kelola sasaran & indikator
    public function index()
    {
        // Dummy data
        $sasaran = [
            [
                'id' => 1,
                'nama' => 'Meningkatkan Pelayanan Publik',
                'indikator' => [
                    ['id' => 1, 'nama' => 'Jumlah inovasi layanan'],
                    ['id' => 2, 'nama' => 'Persentase kepuasan masyarakat'],
                ],
            ],
            [
                'id' => 2,
                'nama' => 'Efisiensi Kelembagaan',
                'indikator' => [
                    ['id' => 3, 'nama' => 'Rasio efektivitas organisasi'],
                    ['id' => 4, 'nama' => 'Jumlah SOP yang diperbarui'],
                ],
            ],
        ];

        return view('adminrb.kelola-data.index', compact('sasaran'));
    }
}
