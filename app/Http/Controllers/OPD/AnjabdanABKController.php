<?php

namespace App\Http\Controllers\OPD;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Laporan;

class AnjabdanABKController extends Controller
{
    /**
     * Tampilkan halaman index Anjab & ABK
     */
    public function index()
    {
        $laporan = Laporan::where('id_user', Auth::id())
            ->where('kategori', 'Anjab & ABK')
            ->latest('tanggal_upload')
            ->paginate(10);

        return view('opd.anjab-abk.index', compact('laporan'));
    }

    /**
     * Upload laporan
     */
    public function laporanUpload(Request $request)
    {
        // Validasi file hanya Word & Excel
        $request->validate([
            'laporan' => 'required|mimes:pdf,doc,docx,xls,xlsx|max:10240', // 10 MB max
        ]);

        $file = $request->file('laporan');

        $filename = time() . '_' . $file->getClientOriginalName();
        $destination = storage_path('app/public/laporan');

        if (!file_exists($destination)) {
            mkdir($destination, 0777, true);
        }

        $file->move($destination, $filename);

        // Simpan ke database
        Laporan::create([
            'id_user' => Auth::id(),
            'nama_opd' => Auth::user()->nama_opd,
            'kategori' => 'Anjab & ABK',
            'judul' => $file->getClientOriginalName(),
            'file_path' => $filename,
            'tanggal_upload' => now(),
            'status' => 'Diproses',
        ]);

        return back()->with('success', 'Laporan berhasil diunggah.');
    }

    /**
     * Download laporan
     */
    public function laporanDownload($id)
    {
        $laporan = Laporan::findOrFail($id);
        $path = storage_path('app/public/laporan/' . $laporan->file_path);

        if (!file_exists($path)) {
            return back()->with('error', 'File tidak ditemukan di server.');
        }

        return response()->download($path, $laporan->judul . '.' . pathinfo($laporan->file_path, PATHINFO_EXTENSION));
    }

    /**
     * Hapus laporan
     */
    public function laporanDestroy($id)
    {
        $laporan = Laporan::findOrFail($id);
        $filePath = storage_path('app/public/laporan/' . $laporan->file_path);

        // Hapus file jika ada
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        // Hapus data dari database
        $laporan->delete();

        return back()->with('success', 'Laporan berhasil dihapus.');
    }
}
