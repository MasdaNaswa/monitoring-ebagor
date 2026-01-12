<?php

namespace App\Http\Controllers\OPD;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Template_Laporan;
use App\Models\Laporan;
use Illuminate\Support\Facades\Storage;

class PelayananPublikController extends Controller
{
    public function index()
    {
        $kategories = Kategori::orderBy('nama_kategori')->get();
        $templates = Template_Laporan::with('kategori')->get();

        // Hanya ambil laporan kategori Yanlik
        $laporans = Laporan::where('kategori', 'Yanlik')
            ->orderBy('tanggal_upload', 'desc')
            ->paginate(10);

        return view('opd.pelayanan-publik.index', compact(
            'kategories',
            'templates',
            'laporans'
        ));
    }


    // Upload laporan
    public function upload(Request $request)
    {
        $request->validate([
            'laporan' => 'required|file|mimes:doc,docx,pdf|max:2048' // 2048 KB = 2 MB
        ]);


        $file = $request->file('laporan');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('laporan', $filename, 'public');

        // Set kategori default 'Yanlik' untuk semua upload dari menu Pelayanan Publik
        Laporan::create([
            'id_user' => auth()->id(),
            'judul' => $file->getClientOriginalName(),
            'kategori' => 'Yanlik', // <=== kategori default
            'file_path' => $filename,
            'tanggal_upload' => now(),
            'status' => 'Diproses'
        ]);

        return redirect()->back()->with('success', 'Laporan berhasil diunggah.');
    }

    // Download laporan
    public function download($id)
    {
        $laporan = Laporan::findOrFail($id);
        $filePath = storage_path('app/public/laporan/' . $laporan->file_path);

        if (!file_exists($filePath)) {
            return redirect()->back()->with('error', 'File tidak ditemukan.');
        }

        return response()->download($filePath, $laporan->judul . '.' . pathinfo($laporan->file_path, PATHINFO_EXTENSION));
    }

    // Hapus laporan
    public function hapusLaporan($id)
    {
        $laporan = Laporan::findOrFail($id);

        if (Storage::disk('public')->exists('laporan/' . $laporan->file_path)) {
            Storage::disk('public')->delete('laporan/' . $laporan->file_path);
        }

        $laporan->delete();

        return redirect()->back()->with('success', 'Laporan berhasil dihapus.');
    }

}
