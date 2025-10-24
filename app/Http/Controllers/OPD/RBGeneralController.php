<?php

namespace App\Http\Controllers\OPD;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RBGeneralController extends Controller
{
    /**
     * Tampilkan daftar RB General
     */
    public function index()
    {
        // Data contoh
        $rbData = [
            [
                'no' => 1,
                'tahun' => '2025',
                'permasalahan' => 'Penanggulangan Kemiskinan',
                'tema' => 'Reformasi Birokrasi Bidang Pelayanan Publik',
                'indikator' => 'Indeks Kepuasan Masyarakat',
                'target' => '85',
                'satuan' => 'Nilai',
                'capaian' => '78',
                'status' => 'draft'
            ],
            [
                'no' => 2,
                'tahun' => '2025',
                'permasalahan' => 'Peningkatan Investasi',
                'tema' => 'Reformasi Birokrasi Bidang Pelayanan Publik',
                'indikator' => 'Nilai Investasi',
                'target' => '100',
                'satuan' => 'Miliar',
                'capaian' => '85',
                'status' => 'approved'
            ]
        ];

        return view('opd.rb-general.index', compact('rbData'));
    }

    /**
     * Tampilkan form tambah RB General
     */
    public function create()
    {
        return view('opd.rb-general.create');
    }

    /**
     * Simpan data baru
     */
    public function store(Request $request)
    {
        // Validasi contoh
        $request->validate([
            'tahun' => 'required|numeric',
            'permasalahan' => 'required|string',
            'tema' => 'required|string',
            'indikator' => 'required|string',
            'target' => 'required',
            'satuan' => 'required|string',
            'capaian' => 'required',
        ]);

        // Logic simpan data ke database (dummy/demo)
        // RBGeneral::create($request->all());

        return redirect()->route('rb-general.index')
            ->with('success', 'Data RB General berhasil ditambahkan');
    }

    /**
     * Tampilkan form edit RB General
     */
    public function edit($id)
    {
        // Dummy data contoh
        $rb = ['id' => $id];

        return view('opd.rb-general.edit', compact('rb'));
    }

    /**
     * Update data RB General
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'tahun' => 'required|numeric',
            'permasalahan' => 'required|string',
            'tema' => 'required|string',
            'indikator' => 'required|string',
            'target' => 'required',
            'satuan' => 'required|string',
            'capaian' => 'required',
        ]);

        // Logic update data ke database (dummy/demo)
        // $rb = RBGeneral::findOrFail($id);
        // $rb->update($request->all());

        return redirect()->route('rb-general.index')
            ->with('success', 'Data RB General berhasil diupdate');
    }

    /**
     * Hapus data RB General
     */
    public function destroy($id)
    {
        // Logic hapus data dari database (dummy/demo)
        // RBGeneral::destroy($id);

        return redirect()->route('rb-general.index')
            ->with('success', 'Data RB General berhasil dihapus');
    }
}
