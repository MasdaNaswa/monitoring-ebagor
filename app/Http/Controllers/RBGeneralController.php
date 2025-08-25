<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RBGeneralController extends Controller
{
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

        return view('rb-general.index', compact('rbData'));
    }

    public function create()
    {
        return view('rb-general.create');
    }

    public function store(Request $request)
    {
        // Logic untuk menyimpan data
        return redirect()->route('rb-general.index')
            ->with('success', 'Data RB General berhasil ditambahkan');
    }

    public function edit($id)
    {
        return view('rb-general.edit', compact('id'));
    }

    public function update(Request $request, $id)
    {
        return redirect()->route('rb-general.index')
            ->with('success', 'Data RB General berhasil diupdate');
    }

    public function destroy($id)
    {
        return redirect()->route('rb-general.index')
            ->with('success', 'Data RB General berhasil dihapus');
    }
}