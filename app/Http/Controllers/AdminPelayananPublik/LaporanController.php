<?php

namespace App\Http\Controllers\AdminPelayananPublik;

use App\Http\Controllers\Controller;
use App\Models\Laporan;
use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Template_Laporan;

class LaporanController extends Controller
{
       public function index()
{
    $kategories = Kategori::orderBy('nama_kategori')->get();
    $templates = Template_Laporan::with('kategori')->get();

    // Filter hanya laporan kategori "Yanlik"
    $laporans = Laporan::where('kategori', 'Yanlik')
        ->orderBy('tanggal_upload', 'desc')
        ->paginate(10);

    return view('adminpelayananpublik.laporan.index', compact(
        'kategories', 'templates', 'laporans'
    ));
}


    public function verifikasi(Request $request, $id)
    {
        $laporan = Laporan::findOrFail($id);
        $laporan->status = $request->input('status', 'Diproses');
        $laporan->catatan = $request->input('catatan', '');
        $laporan->save();

        return redirect()->back()->with('success', "Laporan berhasil diverifikasi.");
    }

    public function hapus($id)
    {
        $dokumen = Laporan::findOrFail($id);
        $filePath = storage_path('app/public/laporan/' . $dokumen->file_path);

        if (file_exists($filePath))
            unlink($filePath);

        $dokumen->delete();

         return redirect()->route('adminpelayananpublik.laporan.index');

    }

    public function edit($id)
    {
        $laporan = Laporan::findOrFail($id);
        return view('adminpelayananpublik.laporan.edit', compact('laporan'));
    }

    public function update(Request $request, $id)
{
    $laporan = Laporan::findOrFail($id);

    $laporan->status = $request->input('status', $laporan->status);

    // Jika status BUKAN Direvisi → catatan dikosongkan
    if ($laporan->status !== 'Revisi') {
        $laporan->catatan = null;
    } else {
        $laporan->catatan = $request->input('catatan', '');
    }

    $laporan->save();

    return redirect()->route('adminpelayananpublik.laporan.index');
}

}
