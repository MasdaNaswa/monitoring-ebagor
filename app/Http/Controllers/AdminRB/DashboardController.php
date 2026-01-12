<?php

namespace App\Http\Controllers\AdminRB;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Pengguna;
use App\Models\RBGeneral;
use App\Models\RBTematik;
use App\Models\PKBupati;

class DashboardController extends Controller
{
    public function index()
    {
        // Total akun OPD yang dibuat oleh role user saat ini
        $totalAkun = Pengguna::where('role', 'OPD')
            ->where('created_by', Auth::user()->role)
            ->count();

        // Total RB masuk dari semua jenis
       // $totalRBGeneral = RBGeneral::count();
       // $totalRBTematik = RBTematik::count();
       // $totalRBPK = PKBupati::count();

       // $totalRB = $totalRBGeneral + $totalRBTematik + $totalRBPK;

        // Status akses RB (contoh, bisa ambil dari konfigurasi atau database)
        $statusUmum = 'Aktif';
        $statusGeneral = 'Dibuka';
        $statusTematik = 'Ditutup';
        $statusPK = 'Dibuka';

        // Kirim data ke view
        return view('adminrb.dashboard', compact(
            'totalAkun',
           //'totalRB',
           // 'totalRBGeneral',
           // 'totalRBTematik',
           // 'totalRBPK',
            'statusUmum',
            'statusGeneral',
            'statusTematik',
            'statusPK'
        ));
    }
}
