<?php

namespace App\Http\Controllers\AdminKelembagaan;

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

        // Hitung semua dokumen kategori Kelembagaan
        $statusCounts = Laporan::selectRaw("status, COUNT(*) as total")
            ->whereIn('kategori', ['Anjab & ABK', 'Petajab', 'Evajab'])
            ->groupBy('status')
            ->pluck('total', 'status');

        // Ambil masing-masing status, default 0 jika tidak ada
        $dokumenProses = $statusCounts['Diproses'] ?? 0;
        $dokumenRevisi = $statusCounts['Revisi'] ?? 0;
        $dokumenDisetujui = $statusCounts['Disetujui'] ?? 0;

        // Total dokumen
        $totalDokumen = array_sum($statusCounts->toArray());

        return view('adminkelembagaan.dashboard', compact(
            'totalAkun',
            'totalDokumen',
            'dokumenProses',
            'dokumenRevisi',
            'dokumenDisetujui'
        ));
    }
}
