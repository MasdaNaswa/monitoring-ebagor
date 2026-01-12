<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EvaluasiKemenpan extends Model
{
    protected $table = 'evaluasi_kemenpan';
    protected $primaryKey = 'id_evaluasi_kemenpan';

    protected $fillable = [
        'id_user',
        'nama_opd',
        'email',
        // Dimensi Struktur (32 pertanyaan)
        'struktur_1',
        'struktur_2',
        'struktur_3',
        'struktur_4',
        'struktur_5',
        'struktur_6',
        'struktur_7',
        'struktur_8',
        'struktur_9',
        'struktur_10',
        'struktur_11',
        'struktur_12',
        'struktur_13',
        'struktur_14',
        'struktur_15',
        'struktur_16',
        'struktur_17',
        'struktur_18',
        'struktur_19',
        'struktur_20',
        'struktur_21',
        'struktur_22',
        'struktur_23',
        'struktur_24',
        'struktur_25',
        'struktur_26',
        'struktur_27',
        'struktur_28',
        'struktur_29',
        'struktur_30',
        'struktur_31',
        'struktur_32',
        // Dimensi Proses (30 pertanyaan)
        'proses_1',
        'proses_2',
        'proses_3',
        'proses_4',
        'proses_5',
        'proses_6',
        'proses_7',
        'proses_8',
        'proses_9',
        'proses_10',
        'proses_11',
        'proses_12',
        'proses_13',
        'proses_14',
        'proses_15',
        'proses_16',
        'proses_17',
        'proses_18',
        'proses_19',
        'proses_20',
        'proses_21',
        'proses_22',
        'proses_23',
        'proses_24',
        'proses_25',
        'proses_26',
        'proses_27',
        'proses_28',
        'proses_29',
        'proses_30',
        // Skor dan status
        'skor_struktur',
        'skor_proses',
        'total_skor',
        'status',
        'catatan'
    ];

    protected $casts = [
        'nama_opd' => 'string',
        'tanggal_pengisian' => 'datetime',
        'skor_struktur' => 'float',
        'skor_proses' => 'float',
        'total_skor' => 'float',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    // ---------------------------
    // Property class: mapping & bobot
    // ---------------------------
    protected $mappingJawaban = [
        'Sangat Setuju' => 'SS',
        'Setuju' => 'S',
        'Tidak Setuju' => 'TS',
        'Sangat Tidak Setuju' => 'STS',
        'Tidak Diisi' => 0
    ];

    protected $bobotStruktur = [
        // 1-14 Kompleksitas
        1 => ['SS' => 0.446, 'S' => 0.893, 'TS' => 1.786, 'STS' => 1.786, '0' => 0],
        2 => ['SS' => 0.446, 'S' => 0.893, 'TS' => 1.786, 'STS' => 1.786, '0' => 0],
        3 => ['SS' => 0.446, 'S' => 0.893, 'TS' => 1.786, 'STS' => 1.786, '0' => 0],
        4 => ['SS' => 0.446, 'S' => 0.893, 'TS' => 1.786, 'STS' => 1.786, '0' => 0],
        5 => ['SS' => 0.446, 'S' => 0.893, 'TS' => 1.786, 'STS' => 1.786, '0' => 0],
        6 => ['SS' => 0.446, 'S' => 0.893, 'TS' => 1.786, 'STS' => 1.786, '0' => 0],
        7 => ['SS' => 0.446, 'S' => 0.893, 'TS' => 1.786, 'STS' => 1.786, '0' => 0],
        8 => ['SS' => 0.446, 'S' => 0.893, 'TS' => 1.786, 'STS' => 1.786, '0' => 0],
        9 => ['SS' => 0.446, 'S' => 0.893, 'TS' => 1.786, 'STS' => 1.786, '0' => 0],
        10 => ['SS' => 0.446, 'S' => 0.893, 'TS' => 1.786, 'STS' => 1.786, '0' => 0],
        11 => ['SS' => 0.446, 'S' => 0.893, 'TS' => 1.786, 'STS' => 1.786, '0' => 0],
        12 => ['SS' => 0.446, 'S' => 0.893, 'TS' => 1.786, 'STS' => 1.786, '0' => 0],
        13 => ['SS' => 0.446, 'S' => 0.893, 'TS' => 1.786, 'STS' => 1.786, '0' => 0],
        14 => ['SS' => 0.446, 'S' => 0.893, 'TS' => 1.786, 'STS' => 1.786, '0' => 0],
        // 15-21 Formalisasi
        15 => ['SS' => 1.786, 'S' => 1.786, 'TS' => 1.786, 'STS' => 1.786, '0' => 0],
        16 => ['SS' => 1.786, 'S' => 1.786, 'TS' => 1.786, 'STS' => 1.786, '0' => 0],
        17 => ['SS' => 1.786, 'S' => 1.786, 'TS' => 1.786, 'STS' => 1.786, '0' => 0],
        18 => ['SS' => 1.786, 'S' => 1.786, 'TS' => 1.786, 'STS' => 1.786, '0' => 0],
        19 => ['SS' => 1.786, 'S' => 1.786, 'TS' => 1.786, 'STS' => 1.786, '0' => 0],
        20 => ['SS' => 1.786, 'S' => 1.786, 'TS' => 1.786, 'STS' => 1.786, '0' => 0],
        21 => ['SS' => 1.786, 'S' => 1.786, 'TS' => 1.786, 'STS' => 1.786, '0' => 0],
        // 22-32 Sentralisasi
        22 => ['SS' => 1.1364, 'S' => 0.8523, 'TS' => 0.2841, 'STS' => 1.1364, '0' => 0],
        23 => ['SS' => 1.1364, 'S' => 0.8523, 'TS' => 0.2841, 'STS' => 1.1364, '0' => 0],
        24 => ['SS' => 0.8523, 'S' => 0.8523, 'TS' => 0.2841, 'STS' => 1.1364, '0' => 0],
        25 => ['SS' => 0.2841, 'S' => 0.8523, 'TS' => 0.2841, 'STS' => 1.1364, '0' => 0],
        26 => ['SS' => 1.1364, 'S' => 0.8523, 'TS' => 0.2841, 'STS' => 1.1364, '0' => 0],
        27 => ['SS' => 1.1364, 'S' => 0.8523, 'TS' => 0.2841, 'STS' => 1.1364, '0' => 0],
        28 => ['SS' => 1.1364, 'S' => 0.8523, 'TS' => 0.2841, 'STS' => 1.1364, '0' => 0],
        29 => ['SS' => 0.8523, 'S' => 0.8523, 'TS' => 0.2841, 'STS' => 1.1364, '0' => 0],
        30 => ['SS' => 1.1364, 'S' => 0.8523, 'TS' => 0.2841, 'STS' => 1.1364, '0' => 0],
        31 => ['SS' => 0.8523, 'S' => 0.8523, 'TS' => 0.2841, 'STS' => 1.1364, '0' => 0],
        32 => ['SS' => 0.8523, 'S' => 0.8523, 'TS' => 0.2841, 'STS' => 1.1364, '0' => 0],
    ];

    protected $bobotProses = [
        1 => ['SS' => 1.250, 'S' => 0.9375, 'TS' => 0.625, 'STS' => 0.625, '0' => 0],
        2 => ['SS' => 1.250, 'S' => 0.9375, 'TS' => 0.625, 'STS' => 0.625, '0' => 0],
        3 => ['SS' => 1.250, 'S' => 0.9375, 'TS' => 0.625, 'STS' => 0.625, '0' => 0],
        4 => ['SS' => 1.250, 'S' => 0.9375, 'TS' => 0.625, 'STS' => 0.625, '0' => 0],
        5 => ['SS' => 0.9375, 'S' => 0.9375, 'TS' => 0.625, 'STS' => 0.625, '0' => 0],
        6 => ['SS' => 1.250, 'S' => 0.9375, 'TS' => 0.625, 'STS' => 0.625, '0' => 0],
        7 => ['SS' => 1.250, 'S' => 0.9375, 'TS' => 0.625, 'STS' => 0.625, '0' => 0],
        8 => ['SS' => 1.250, 'S' => 0.9375, 'TS' => 0.625, 'STS' => 0.625, '0' => 0],
        9 => ['SS' => 1.429, 'S' => 1.071, 'TS' => 0.714, 'STS' => 0.357, '0' => 0],
        10 => ['SS' => 1.429, 'S' => 1.071, 'TS' => 0.714, 'STS' => 0.357, '0' => 0],
        11 => ['SS' => 1.429, 'S' => 1.071, 'TS' => 0.714, 'STS' => 0.357, '0' => 0],
        12 => ['SS' => 1.429, 'S' => 1.071, 'TS' => 0.714, 'STS' => 0.357, '0' => 0],
        13 => ['SS' => 1.429, 'S' => 1.071, 'TS' => 0.714, 'STS' => 0.357, '0' => 0],
        14 => ['SS' => 0.714, 'S' => 0.714, 'TS' => 0.714, 'STS' => 0.714, '0' => 0],
        15 => ['SS' => 1.429, 'S' => 1.071, 'TS' => 0.714, 'STS' => 0.357, '0' => 0],
        16 => ['SS' => 2.500, 'S' => 2.500, 'TS' => 0.625, 'STS' => 0.625, '0' => 0],
        17 => ['SS' => 2.500, 'S' => 2.500, 'TS' => 0.625, 'STS' => 0.625, '0' => 0],
        18 => ['SS' => 2.500, 'S' => 2.500, 'TS' => 0.625, 'STS' => 0.625, '0' => 0],
        19 => ['SS' => 0.625, 'S' => 0.625, 'TS' => 0.625, 'STS' => 0.625, '0' => 0],
        20 => ['SS' => 1.667, 'S' => 1.250, 'TS' => 0.833, 'STS' => 0.417, '0' => 0],
        21 => ['SS' => 1.250, 'S' => 1.250, 'TS' => 0.833, 'STS' => 0.417, '0' => 0],
        22 => ['SS' => 1.250, 'S' => 1.250, 'TS' => 0.833, 'STS' => 0.417, '0' => 0],
        23 => ['SS' => 0.833, 'S' => 0.833, 'TS' => 0.833, 'STS' => 0.833, '0' => 0],
        24 => ['SS' => 0.833, 'S' => 0.833, 'TS' => 0.833, 'STS' => 0.833, '0' => 0],
        25 => ['SS' => 1.250, 'S' => 1.250, 'TS' => 0.833, 'STS' => 0.417, '0' => 0],
        26 => ['SS' => 2.000, 'S' => 1.500, 'TS' => 1.000, 'STS' => 0.500, '0' => 0],
        27 => ['SS' => 1.500, 'S' => 1.500, 'TS' => 1.000, 'STS' => 0.500, '0' => 0],
        28 => ['SS' => 1.500, 'S' => 1.500, 'TS' => 1.000, 'STS' => 0.500, '0' => 0],
        29 => ['SS' => 1.500, 'S' => 1.500, 'TS' => 1.000, 'STS' => 0.500, '0' => 0],
        30 => ['SS' => 1.500, 'S' => 1.500, 'TS' => 1.000, 'STS' => 0.500, '0' => 0],
    ];

    protected $terbalikStruktur = [2, 7, 9, 11, 12, 13, 14, 17, 24, 25];
    protected $terbalikProses = [17, 19, 23, 24, 29];

    protected $opdTanpaUPTD = [
        'Sekretariat Daerah',
        'Sekretariat DPRD',
        'Inspektorat Daerah',
        'Dinas Pendidikan dan Kebudayaan',
        'Rumah Sakit Umum Daerah Muhammad Sani',
        'Rumah Sakit Umum Daerah Tanjung Batu Kundur',
        'Dinas Perumahan Rakyat dan Kawasan Pemukiman',
        'Dinas Sosial',
        'Dinas Kependudukan dan Pencatatan Sipil',
        'Dinas Pemberdayaan Masyarakat dan Desa',
        'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu',
        'Dinas Kepemudaan dan Olahraga',
        'Dinas Pariwisata',
        'Dinas Perpustakaan dan Kearsipan',
        'Dinas Tenaga Kerja dan Perindustrian',
        'Dinas Komunikasi Informatika, Statistik dan Persandian',
        'Satuan Polisi Pamong Praja',
        'Badan Perencanaan, Penelitian dan Pengembangan',
        'Badan Pengelola Keuangan dan Aset Daerah',
        'Badan Kepegawaian dan Pengembangan Sumber Daya Manusia',
        'Badan Kesatuan Bangsa dan Politik',
        'Badan Penanggulangan Bencana Daerah dan Pemadam Kebakaran',
        'Kecamatan Karimun',
        'Kecamatan Tebing',
        'Kecamatan Meral',
        'Kecamatan Meral Barat',
        'Kecamatan Buru',
        'Kecamatan Kundur',
        'Kecamatan Kundur Barat',
        'Kecamatan Kundur Utara',
        'Kecamatan Belat',
        'Kecamatan Ungar',
        'Kecamatan Moro',
        'Kecamatan Durai',
        'Kecamatan Selat Gelam',
        'Kecamatan Sugie Besar'
    ];

    // ---------------------------
    // Relationship dengan User
    // ---------------------------
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    // ---------------------------
    // Mutator untuk set nilai default
    // ---------------------------
    public function setStrukturAttribute($value)
    {
        // Ubah "Tidak Diisi" menjadi NULL atau empty string
        return $value === 'Tidak Diisi' ? null : $value;
    }

    // ---------------------------
    // Hitung skor
    // ---------------------------
    public function hitungSkor()
    {
        $skorStruktur = 0;
        for ($i = 1; $i <= 32; $i++) {
            $jawaban = $this->{"struktur_{$i}"} ?? null;
            
            // Skip untuk OPD tanpa UPTD pada pertanyaan 8 & 9
            if (in_array($this->nama_opd, $this->opdTanpaUPTD) && in_array($i, [8, 9])) {
                continue;
            }

            if ($jawaban && isset($this->mappingJawaban[$jawaban])) {
                $key = $this->mappingJawaban[$jawaban];
                $skor = $this->bobotStruktur[$i][$key] ?? 0;

                if (in_array($i, $this->terbalikStruktur)) {
                    $max = max($this->bobotStruktur[$i]);
                    $min = min($this->bobotStruktur[$i]);
                    $skor = $max + $min - $skor;
                }

                $skorStruktur += $skor;
            }
        }

        $skorProses = 0;
        for ($i = 1; $i <= 30; $i++) {
            $jawaban = $this->{"proses_{$i}"} ?? null;
            if ($jawaban && isset($this->mappingJawaban[$jawaban])) {
                $key = $this->mappingJawaban[$jawaban];
                $skor = $this->bobotProses[$i][$key] ?? 0;

                if (in_array($i, $this->terbalikProses)) {
                    $max = max($this->bobotProses[$i]);
                    $min = min($this->bobotProses[$i]);
                    $skor = $max + $min - $skor;
                }

                $skorProses += $skor;
            }
        }

        $this->skor_struktur = round($skorStruktur, 3);
        $this->skor_proses = round($skorProses, 3);
        $this->total_skor = round(($skorStruktur + $skorProses) * 0.5, 3);

        return $this->total_skor;
    }

    // ---------------------------
    // Interpretasi
    // ---------------------------
    public function getInterpretasi()
    {
        $total = $this->total_skor;

        if ($total >= 80)
            return ['level' => 'SANGAT BAIK', 'warna' => 'bg-green-100 text-green-800', 'deskripsi' => 'Kematangan organisasi sangat tinggi'];
        if ($total >= 60)
            return ['level' => 'BAIK', 'warna' => 'bg-blue-100 text-blue-800', 'deskripsi' => 'Kematangan organisasi baik'];
        if ($total >= 40)
            return ['level' => 'CUKUP BAIK', 'warna' => 'bg-yellow-100 text-yellow-800', 'deskripsi' => 'Kematangan organisasi cukup'];
        if ($total >= 20)
            return ['level' => 'KURANG BAIK', 'warna' => 'bg-orange-100 text-orange-800', 'deskripsi' => 'Kematangan organisasi kurang'];
        return ['level' => 'SANGAT KURANG', 'warna' => 'bg-red-100 text-red-800', 'deskripsi' => 'Kematangan organisasi sangat kurang'];
    }

    public function getJawabanTerstruktur()
{
    $struktur = [];
    for ($i = 1; $i <= 32; $i++) {
        $jawaban = $this->{"struktur_$i"};
        $struktur["Struktur $i"] = $jawaban ?? 'Tidak Diisi';
    }

    $proses = [];
    for ($i = 1; $i <= 30; $i++) {
        $jawaban = $this->{"proses_$i"};
        $proses["Proses $i"] = $jawaban ?? 'Tidak Diisi';
    }

    return [
        'struktur' => $struktur,
        'proses' => $proses
    ];
}

    public function getJawabanReadable()
    {
        $data = ['struktur' => [], 'proses' => []];

        for ($i = 1; $i <= 32; $i++) {
            $data['struktur'][] = [
                'no' => $i,
                'jawaban' => $this->{"struktur_$i"} ?? 'Tidak Diisi'
            ];
        }

        for ($i = 1; $i <= 30; $i++) {
            $data['proses'][] = [
                'no' => $i,
                'jawaban' => $this->{"proses_$i"} ?? 'Tidak Diisi'
            ];
        }

        return $data;
    }

    public function getDetailPerhitungan()
    {
        $skorMapping = [
            'Sangat Setuju' => 1,
            'Setuju' => 2,
            'Tidak Setuju' => 3,
            'Sangat Tidak Setuju' => 4,
            'Tidak Diisi' => 0,
        ];

        // Subdimensi Struktur
        $strukturSubdimensi = [
            'Kompleksitas' => ['pertanyaan' => range(1, 14), 'terbalik' => [2, 7, 9, 11, 12, 13, 14], 'persentase' => 50.00],
            'Formalisasi' => ['pertanyaan' => range(15, 21), 'terbalik' => [], 'persentase' => 25.00],
            'Sentralisasi' => ['pertanyaan' => range(22, 32), 'terbalik' => [22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32], 'persentase' => 25.00],
        ];

        // Subdimensi Proses
        $prosesSubdimensi = [
            'Keselarasan' => ['pertanyaan' => range(1, 8), 'terbalik' => [], 'persentase' => 20.00],
            'Governance and Compliance' => ['pertanyaan' => range(9, 15), 'terbalik' => [], 'persentase' => 20.00],
            'Perbaikan dan Peningkatan Proses' => ['pertanyaan' => range(16, 19), 'terbalik' => [], 'persentase' => 20.00],
            'Manajemen Risiko' => ['pertanyaan' => range(20, 25), 'terbalik' => [], 'persentase' => 20.00],
            'Teknologi Organisasi IT' => ['pertanyaan' => range(26, 30), 'terbalik' => [], 'persentase' => 20.00],
        ];

        $detail = ['struktur' => [], 'proses' => []];

        // Hitung skor struktur
        foreach ($strukturSubdimensi as $nama => $info) {
            $skorTotal = 0;
            foreach ($info['pertanyaan'] as $i) {
                // Pengecualian OPD tanpa UPTD untuk pertanyaan 8 & 9
                if (in_array($this->nama_opd, $this->opdTanpaUPTD) && in_array($i, [8, 9]))
                    continue;

                $jawaban = $this->{"struktur_{$i}"} ?? null;
                if ($jawaban && isset($skorMapping[$jawaban])) {
                    $skor = $skorMapping[$jawaban];
                    if (in_array($i, $info['terbalik'])) {
                        $skor = 5 - $skor;
                    }
                    // Terapkan bobot pertanyaan dari $bobotStruktur
                    $key = $this->mappingJawaban[$jawaban];
                    $skorTotal += $this->bobotStruktur[$i][$key] ?? 0;
                }
            }
            $detail['struktur'][$nama] = [
                'skor' => round($skorTotal, 3),
                'persentase' => $info['persentase'],
                'pertanyaan' => count($info['pertanyaan'])
            ];
        }

        // Hitung skor proses
        foreach ($prosesSubdimensi as $nama => $info) {
            $skorTotal = 0;
            foreach ($info['pertanyaan'] as $i) {
                $jawaban = $this->{"proses_{$i}"} ?? null;
                if ($jawaban && isset($skorMapping[$jawaban])) {
                    $skor = $skorMapping[$jawaban];
                    if (in_array($i, $this->terbalikProses)) {
                        $skor = 5 - $skor;
                    }
                    // Terapkan bobot pertanyaan dari $bobotProses
                    $key = $this->mappingJawaban[$jawaban];
                    $skorTotal += $this->bobotProses[$i][$key] ?? 0;
                }
            }
            $detail['proses'][$nama] = [
                'skor' => round($skorTotal, 3),
                'persentase' => $info['persentase'],
                'pertanyaan' => count($info['pertanyaan'])
            ];
        }

        return $detail;
    }
}