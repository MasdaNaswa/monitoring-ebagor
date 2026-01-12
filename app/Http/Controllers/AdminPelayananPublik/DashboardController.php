<?php

namespace App\Http\Controllers\AdminPelayananPublik;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Pengguna;
use App\Models\Laporan;

class DashboardController extends Controller
{
    public function index()
    {
        // Total akun OPD
        $totalAkun = Pengguna::where('role', 'OPD')
            ->where('created_by', Auth::user()->role)
            ->count();

        // Dokumen hanya kategori Pelayanan Publik
        $dokumenQuery = Laporan::where('kategori', 'Yanlik');

        $totalDokumen = (clone $dokumenQuery)->count();
        $dokumenProses = (clone $dokumenQuery)->where('status', 'Diproses')->count();
        $dokumenRevisi = (clone $dokumenQuery)->where('status', 'Revisi')->count();
        $dokumenDisetujui = (clone $dokumenQuery)->where('status', 'Disetujui')->count();


        return view('adminpelayananpublik.dashboard', compact(
            'totalAkun',
            'totalDokumen',
            'dokumenProses',
            'dokumenRevisi',
            'dokumenDisetujui'
        ));
    }
}
