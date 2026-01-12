<?php

namespace App\Http\Controllers\AdminKelembagaan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EvaluasiKemendagri;
use App\Models\EvaluasiKemenpan;
use App\Models\Pengguna;

class KematanganKelembagaanController extends Controller
{
    /**
     * Menampilkan semua hasil survei kematangan kelembagaan
     */
    public function index(Request $request)
    {
        // Query dengan alias 'id' agar Blade/DataTables tetap bisa pakai 'id'
        $queryKemenpan = EvaluasiKemenpan::select(
            'id_evaluasi_kemenpan as id',
            'nama_opd',
            'tanggal_pengisian',
            'skor_struktur',
            'skor_proses',
            'total_skor',
            'tingkat_kematangan',
            'created_at'
        )->with('user:id,nama_opd');

        $queryKemendagri = EvaluasiKemendagri::select(
            'id_evaluasi_kemendagri as id',
            'nama_opd',
            'total_skor',
            'tingkat_maturitas',
            'created_at'
        )->with('user:id,nama_opd');

        // Filter berdasarkan OPD
        if ($request->filled('opd')) {
            $queryKemenpan->where('nama_opd', 'like', '%' . $request->opd . '%');
            $queryKemendagri->where('nama_opd', 'like', '%' . $request->opd . '%');
        }

        // Pagination 10 row per page
        $evaluasiKemenpan = $queryKemenpan->orderBy('created_at', 'desc')
            ->paginate(10, ['*'], 'kemenpan_page');

        $evaluasiKemendagri = $queryKemendagri->orderBy('created_at', 'desc')
            ->paginate(10, ['*'], 'kemendagri_page');

        // Statistik
        $stats = [
            'total_kemenpan' => EvaluasiKemenpan::count(),
            'total_kemendagri' => EvaluasiKemendagri::count(),
            'avg_kemenpan' => (float) EvaluasiKemenpan::avg('total_skor') ?? 0,
            'avg_kemendagri' => (float) EvaluasiKemendagri::avg('total_skor') ?? 0,
        ];

        // List OPD untuk filter
        $listOPD = Pengguna::whereIn('role', ['OPD', 'opd', 'ADMIN_KELEMBAGAAN'])
            ->distinct('nama_opd')
            ->orderBy('nama_opd')
            ->pluck('nama_opd');

        return view(
            'adminkelembagaan.kematangan-kelembagaan.index',
            compact('evaluasiKemenpan', 'evaluasiKemendagri', 'stats', 'listOPD')
        );
    }

    /**
     * Hapus hasil survei
     */
    public function destroy($id)
    {
        try {
            if (request()->has('type')) {
                if (request()->type === 'kemenpan') {
                    $evaluasi = EvaluasiKemenpan::findOrFail($id);
                } elseif (request()->type === 'kemendagri') {
                    $evaluasi = EvaluasiKemendagri::findOrFail($id);

                    // Hapus file jika ada
                    $files = $evaluasi->getAllFilePaths();
                    foreach ($files as $variabelFiles) {
                        foreach ($variabelFiles as $filePath) {
                            if (\Storage::disk('public')->exists($filePath)) {
                                \Storage::disk('public')->delete($filePath);
                            }
                        }
                    }
                } else {
                    return redirect()->back()->with('error', 'Tipe evaluasi tidak valid.');
                }

                $evaluasi->delete();

                return redirect()->route('adminkelembagaan.kematangan-kelembagaan.index')
                    ->with('success', 'Data hasil survei berhasil dihapus.');
            }

            return redirect()->back()->with('error', 'Tipe evaluasi harus ditentukan.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Tampilkan detail hasil survei Kemenpan (JSON)
     */
   public function showKemenpanJson($id)
{
    $evaluasi = EvaluasiKemenpan::find($id);

    if (!$evaluasi) {
        return response()->json(['error' => 'Data tidak ditemukan'], 404);
    }

    // Ambil detail perhitungan
    $detailRaw = $evaluasi->getDetailPerhitungan() ?? ['struktur' => [], 'proses' => []];
    
    // Format detail perhitungan
    $detailPerhitungan = [];
    
    // Struktur
    if (isset($detailRaw['struktur'])) {
        foreach ($detailRaw['struktur'] as $subdimensi => $data) {
            $detailPerhitungan[$subdimensi] = [
                'skor_mentah' => $data['skor'] ?? 0,
                'max_skor' => 100
            ];
        }
    }
    
    // Proses
    if (isset($detailRaw['proses'])) {
        foreach ($detailRaw['proses'] as $subdimensi => $data) {
            $detailPerhitungan[$subdimensi] = [
                'skor_mentah' => $data['skor'] ?? 0,
                'max_skor' => 100
            ];
        }
    }

    // Ambil jawaban langsung dari model (array sederhana)
    $jawabanStruktur = [];
    for ($i = 1; $i <= 32; $i++) {
        $jawabanStruktur[] = $evaluasi->{"struktur_$i"} ?? 'Tidak Diisi';
    }
    
    $jawabanProses = [];
    for ($i = 1; $i <= 30; $i++) {
        $jawabanProses[] = $evaluasi->{"proses_$i"} ?? 'Tidak Diisi';
    }

    // Ambil interpretasi
    $interpretasi = [];
    if (method_exists($evaluasi, 'getInterpretasi')) {
        $interpretasi = $evaluasi->getInterpretasi() ?? [];
    }

    return response()->json([
        'evaluasi' => [
            'nama_opd'      => $evaluasi->nama_opd ?? '',
            'email'         => $evaluasi->email ?? '',
            'created_at'    => optional($evaluasi->created_at)->format('d-m-Y') ?? '',
            'skor_struktur' => $evaluasi->skor_struktur ?? 0,
            'skor_proses'   => $evaluasi->skor_proses ?? 0,
            'total_skor'    => $evaluasi->total_skor ?? 0,
        ],
        'jawaban' => [
            'struktur' => $jawabanStruktur, // Format: array [0..31]
            'proses' => $jawabanProses      // Format: array [0..29]
        ],
        'detailPerhitungan' => $detailPerhitungan,
        'interpretasi' => $interpretasi
    ]);
}
    /**
     * Tampilkan detail hasil survei Kemendagri
     */
    public function showKemendagri($id)
    {
        $evaluasi = EvaluasiKemendagri::with('user')->findOrFail($id);

        $jawaban = [];
        $variabels = ['i', 'ii', 'iii', 'iv', 'v', 'vi', 'vii', 'viii', 'ix', 'x', 'xi'];
        foreach ($variabels as $var) {
            $jawaban["VARIABEL " . strtoupper($var)] = [
                'tingkat' => $evaluasi->{"variabel_{$var}"},
                'files' => []
            ];

            for ($i = 1; $i <= 3; $i++) {
                $filePath = $evaluasi->{"file_path_{$var}_$i"};
                if ($filePath) {
                    $jawaban["VARIABEL " . strtoupper($var)]['files'][] = [
                        'path' => $filePath,
                        'name' => basename($filePath),
                        'number' => $i,
                        'url' => asset('storage/' . $filePath)
                    ];
                }
            }
        }

        $skorMapping = [
            'Tingkat I' => 1,
            'Tingkat II' => 2,
            'Tingkat III' => 3,
            'Tingkat IV' => 4,
            'Tingkat V' => 5
        ];

        $detailPerhitungan = [];
        $totalMentah = 0;

        foreach ($variabels as $var) {
            $tingkat = $evaluasi->{"variabel_{$var}"};
            $skor = $skorMapping[$tingkat] ?? 0;
            $totalMentah += $skor;

            $detailPerhitungan["VARIABEL " . strtoupper($var)] = [
                'tingkat' => $tingkat,
                'skor_mentah' => $skor
            ];
        }

        $skorNormalized = (($totalMentah - 11) / 44) * 100;

        return view(
            'components.adminkelembagaan.detail-modal-survei-kemendagri',
            compact('evaluasi', 'jawaban', 'detailPerhitungan', 'totalMentah', 'skorNormalized')
        );
    }
}
