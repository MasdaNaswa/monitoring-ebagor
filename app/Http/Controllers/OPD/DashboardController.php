<?php

namespace App\Http\Controllers\OPD;

use App\Http\Controllers\Controller;
use App\Models\Laporan;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $nama_opd = $user->nama_opd ?? $user->name;

        // Kategori Kelembagaan
        $subKategoriKelembagaan = ['Anjab & ABK','Petajab','Evajab'];

        // Filter dokumen hanya milik OPD yang login (menggunakan relasi user -> nama_opd)
        $totalDokumenKelembagaan = Laporan::whereIn('kategori', $subKategoriKelembagaan)
            ->whereHas('user', function($query) use ($nama_opd) {
                $query->where('nama_opd', $nama_opd);
            })->count();

        $dokumenProsesKelembagaan = Laporan::whereIn('kategori', $subKategoriKelembagaan)
            ->where('status', 'Diproses')
            ->whereHas('user', function($query) use ($nama_opd) {
                $query->where('nama_opd', $nama_opd);
            })->count();

        $dokumenDirevisiKelembagaan = Laporan::whereIn('kategori', $subKategoriKelembagaan)
            ->where('status', 'Direvisi')
            ->whereHas('user', function($query) use ($nama_opd) {
                $query->where('nama_opd', $nama_opd);
            })->count();

        $dokumenDisetujuiKelembagaan = Laporan::whereIn('kategori', $subKategoriKelembagaan)
            ->where('status', 'Disetujui')
            ->whereHas('user', function($query) use ($nama_opd) {
                $query->where('nama_opd', $nama_opd);
            })->count();

        // Kategori Pelayanan Publik (selain Kelembagaan), juga filter OPD
        $totalDokumenPublik = Laporan::whereNotIn('kategori', $subKategoriKelembagaan)
            ->whereHas('user', function($query) use ($nama_opd) {
                $query->where('nama_opd', $nama_opd);
            })->count();

        $dokumenProsesPublik = Laporan::whereNotIn('kategori', $subKategoriKelembagaan)
            ->where('status', 'Diproses')
            ->whereHas('user', function($query) use ($nama_opd) {
                $query->where('nama_opd', $nama_opd);
            })->count();

        $dokumenDirevisiPublik = Laporan::whereNotIn('kategori', $subKategoriKelembagaan)
            ->where('status', 'Direvisi')
            ->whereHas('user', function($query) use ($nama_opd) {
                $query->where('nama_opd', $nama_opd);
            })->count();

        $dokumenDisetujuiPublik = Laporan::whereNotIn('kategori', $subKategoriKelembagaan)
            ->where('status', 'Disetujui')
            ->whereHas('user', function($query) use ($nama_opd) {
                $query->where('nama_opd', $nama_opd);
            })->count();

        return view('opd.dashboard', compact(
            'nama_opd',
            'totalDokumenKelembagaan',
            'dokumenProsesKelembagaan',
            'dokumenDirevisiKelembagaan',
            'dokumenDisetujuiKelembagaan',
            'totalDokumenPublik',
            'dokumenProsesPublik',
            'dokumenDirevisiPublik',
            'dokumenDisetujuiPublik'
        ));
    }
}
