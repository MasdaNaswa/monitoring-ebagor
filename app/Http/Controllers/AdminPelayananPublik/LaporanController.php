<?php

namespace App\Http\Controllers\AdminPelayananPublik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    private $laporans = [
        [
            'id' => 1,
            'opd' => ['nama_opd' => 'Dinas Pendidikan'],
            'kategori' => 'Anjab & ABK',
            'nama_file' => 'laporan1.pdf',
            'file' => 'files/laporan1.pdf',
            'status' => 'Menunggu',
            'catatan_admin' => ''
        ],
        [
            'id' => 2,
            'opd' => ['nama_opd' => 'Dinas Kesehatan'],
            'kategori' => 'Petajab',
            'nama_file' => 'laporan2.pdf',
            'file' => 'files/laporan2.pdf',
            'status' => 'Terverifikasi',
            'catatan_admin' => 'File sudah lengkap.'
        ],
        [
            'id' => 3,
            'opd' => ['nama_opd' => 'Dinas Perhubungan'],
            'kategori' => 'Evajab',
            'nama_file' => 'laporan3.pdf',
            'file' => 'files/laporan3.pdf',
            'status' => 'Menunggu',
            'catatan_admin' => ''
        ],
    ];

    public function index()
    {
        $laporans = $this->laporans;
        return view('adminpelayananpublik.laporan.index', compact('laporans'));
    }

    public function verifikasi(Request $request, $id)
    {
        $status = $request->input('status', 'Menunggu');
        $catatan = $request->input('catatan_admin', '');
        return redirect()->back()->with('success', "Laporan ID $id berhasil diverifikasi ke status '$status'. Catatan: $catatan");
    }

    public function hapus($id)
    {
        return redirect()->back()->with('success', "Laporan ID $id berhasil dihapus.");
    }

    public function edit($id)
    {
        $laporan = collect($this->laporans)->firstWhere('id', $id);
        if (!$laporan) {
            return redirect()->back()->with('error', 'Laporan tidak ditemukan.');
        }
        return view('adminpelayananpublik.laporan.edit', compact('laporan'));
    }

    public function update(Request $request, $id)
    {
        $status = $request->input('status', 'Menunggu');
        $catatan = $request->input('catatan_admin', '');
        return redirect()->route('adminpelayananpublik.laporan.index')
                         ->with('success', "Laporan ID $id berhasil diubah. Status: $status, Catatan: $catatan");
    }
}
