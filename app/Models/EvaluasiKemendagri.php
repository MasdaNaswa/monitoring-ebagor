<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class EvaluasiKemendagri extends Model
{
    protected $table = 'evaluasi_kemendagri';
    protected $primaryKey = 'id_evaluasi_kemendagri';

    protected $fillable = [
        'id_user',
        'nama_opd',
        'email',

        // Variabel I-XI
        'variabel_i',
        'variabel_ii',
        'variabel_iii',
        'variabel_iv',
        'variabel_v',
        'variabel_vi',
        'variabel_vii',
        'variabel_viii',
        'variabel_ix',
        'variabel_x',
        'variabel_xi',

        // File paths untuk setiap variabel
        'file_path_i_1',
        'file_path_i_2',
        'file_path_i_3',
        'file_path_ii_1',
        'file_path_ii_2',
        'file_path_ii_3',
        'file_path_iii_1',
        'file_path_iii_2',
        'file_path_iii_3',
        'file_path_iv_1',
        'file_path_iv_2',
        'file_path_iv_3',
        'file_path_v_1',
        'file_path_v_2',
        'file_path_v_3',
        'file_path_vi_1',
        'file_path_vi_2',
        'file_path_vi_3',
        'file_path_vii_1',
        'file_path_vii_2',
        'file_path_vii_3',
        'file_path_viii_1',
        'file_path_viii_2',
        'file_path_viii_3',
        'file_path_ix_1',
        'file_path_ix_2',
        'file_path_ix_3',
        'file_path_x_1',
        'file_path_x_2',
        'file_path_x_3',
        'file_path_xi_1',
        'file_path_xi_2',
        'file_path_xi_3',

        // Skor dan status
        'total_skor',
        'tingkat_maturitas',
        'status',
        'catatan'
    ];

    protected $casts = [
        'total_skor' => 'float',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    // Relationship dengan User
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    // Scope untuk status
    public function scopeDiproses($query)
    {
        return $query->where('status', 'Diproses');
    }

    public function scopeDisetujui($query)
    {
        return $query->where('status', 'Disetujui');
    }

    public function scopeRevisi($query)
    {
        return $query->where('status', 'Revisi');
    }

    // Method untuk menghitung skor
    public function hitungSkor()
    {
        $skorMapping = [
            'Tingkat I' => 1,
            'Tingkat II' => 2,
            'Tingkat III' => 3,
            'Tingkat IV' => 4,
            'Tingkat V' => 5
        ];

        $totalSkor = 0;
        $variabels = [
            'variabel_i',
            'variabel_ii',
            'variabel_iii',
            'variabel_iv',
            'variabel_v',
            'variabel_vi',
            'variabel_vii',
            'variabel_viii',
            'variabel_ix',
            'variabel_x',
            'variabel_xi'
        ];

        // Hitung total skor (1-55)
        foreach ($variabels as $variabel) {
            if (isset($this->$variabel) && isset($skorMapping[$this->$variabel])) {
                $totalSkor += $skorMapping[$this->$variabel];
            }
        }

        // Konversi ke skala 0-100
        // Rumus: ((total_skor - 11) / (55 - 11)) * 100
        // Minimum: 11 (semua Tingkat I) = 0
        // Maximum: 55 (semua Tingkat V) = 100

        $skor0to100 = (($totalSkor - 11) / 44) * 100;

        return round($skor0to100, 2);
    }

    // Method untuk menentukan peringkat komposit (P-1 s/d P-5)
  public function tentukanPeringkatKomposit($skor)
{
    if ($skor >= 81) return 'P-5';
    if ($skor >= 61) return 'P-4';
    if ($skor >= 41) return 'P-3';
    if ($skor >= 21) return 'P-2';
    return 'P-1';
}


    // Method untuk mendapatkan deskripsi peringkat
    public function getDeskripsiPeringkat()
    {
        $peringkat = $this->tingkat_maturitas ?? $this->tentukanPeringkatKomposit($this->total_skor);

        $deskripsi = [
            'P-5' => [
                'label' => 'Peringkat Komposit 5 (P-5)',
                'skor_range' => '81-100',
                'keterangan' => 'Mencerminkan bahwa dari sisi struktur dan proses, organisasi dinilai tergolong sangat efektif. Struktur dan proses organisasi yang ada dinilai mempunyai kemampuan sangat tinggi untuk mengakomodir kebutuhan internal organisasi dan sangat mampu beradaptasi terhadap dinamika perubahan lingkungan eksternal organisasi.',
                'kondisi' => 'Sangat efektif',
                'kemampuan' => 'Sangat tinggi',
                'kekurangan' => '-'
            ],
            'P-4' => [
                'label' => 'Peringkat Komposit 4 (P-4)',
                'skor_range' => '61-80',
                'keterangan' => 'Mencerminkan bahwa dari sisi struktur dan proses, organisasi dinilai tergolong efektif. Struktur dan proses organisasi yang ada dinilai mampu mengakomodir kebutuhan internal organisasi dan mampu beradaptasi terhadap dinamika perubahan lingkungan eksternal organisasi. Namun struktur dan proses organisasi masih memiliki beberapa kelemahan minor yang dapat segera diatasi segera apabila diadakan perbaikan melalui tindakan rutin yang bersifat marjinal.',
                'kondisi' => 'Efektif',
                'kemampuan' => 'Tinggi',
                'kekurangan' => 'Kelemahan kecil'
            ],
            'P-3' => [
                'label' => 'Peringkat Komposit 3 (P-3)',
                'skor_range' => '41-60',
                'keterangan' => 'Mencerminkan bahwa dari sisi struktur dan proses, organisasi dinilai tergolong cukup efektif. Struktur dan proses organisasi yang ada dinilai cukup mampu mengakomodir kebutuhan internal organisasi dan cukup mampu beradaptasi terhadap dinamika perubahan lingkungan eksternal organisasi. Namun struktur dan proses organisasi memiliki berbagai kelemahan yang dapat menyebabkan peringkatnya menurun apabila organisasi tidak segera melakukan tindakan korektif secara sistematik.',
                'kondisi' => 'Cukup efektif',
                'kemampuan' => 'Mampu',
                'kekurangan' => 'Kelemahan biasa'
            ],
            'P-2' => [
                'label' => 'Peringkat Komposit 2 (P-2)',
                'skor_range' => '21-40',
                'keterangan' => 'Mencerminkan bahwa dari sisi struktur dan proses, organisasi dinilai tergolong kurang baik. Struktur dan proses organisasi yang ada dinilai kurang mampu mengakomodir kebutuhan internal organisasi dan kurang mampu beradaptasi terhadap dinamika perubahan lingkungan eksternal organisasi. Di samping itu, struktur dan proses organisasi dinilai memiliki beberapa faktor kelemahan serius.',
                'kondisi' => 'Kurang efektif',
                'kemampuan' => 'Kurang mampu',
                'kekurangan' => 'Kelemahan serius'
            ],
            'P-1' => [
                'label' => 'Peringkat Komposit 1 (P-1)',
                'skor_range' => '0-20',
                'keterangan' => 'Mencerminkan bahwa dari sisi struktur dan proses, organisasi dinilai tergolong tidak baik. Struktur dan proses organisasi yang ada dinilai tidak efektif dan tidak mampu mengakomodir kebutuhan internal organisasi serta tidak mampu beradaptasi terhadap dinamika perubahan lingkungan eksternal organisasi.',
                'kondisi' => 'Tidak efektif',
                'kemampuan' => 'Tidak mampu',
                'kekurangan' => 'Kelemahan sangat serius'
            ]
        ];

        return $deskripsi[$peringkat] ?? $deskripsi['P-1'];
    }

    public function getPeringkatKomposit()
{
    $skor = $this->hitungSkor();
    return $this->tentukanPeringkatKomposit($skor);
}


    // Method untuk mendapatkan warna berdasarkan peringkat
    public function getWarnaPeringkat()
    {
        $peringkat = $this->tingkat_maturitas;

        $warna = [
            'P-5' => 'bg-green-100 text-green-800 border-green-200',
            'P-4' => 'bg-blue-100 text-blue-800 border-blue-200',
            'P-3' => 'bg-yellow-100 text-yellow-800 border-yellow-200',
            'P-2' => 'bg-orange-100 text-orange-800 border-orange-200',
            'P-1' => 'bg-red-100 text-red-800 border-red-200'
        ];

        return $warna[$peringkat] ?? 'bg-gray-100 text-gray-800 border-gray-200';
    }

    // Method untuk menentukan tingkat maturitas
    public function tentukanTingkatMaturitas($skor)
    {
        if ($skor >= 46.1)
            return 'SANGAT TINGGI';
        if ($skor >= 37.1)
            return 'TINGGI';
        if ($skor >= 28.1)
            return 'SEDANG';
        if ($skor >= 19.1)
            return 'RENDAH';
        return 'SANGAT RENDAH';
    }

    // Method untuk mendapatkan semua file paths dalam array
    public function getAllFilePaths()
    {
        $files = [];
        $variabelPrefixes = ['i', 'ii', 'iii', 'iv', 'v', 'vi', 'vii', 'viii', 'ix', 'x', 'xi'];

        foreach ($variabelPrefixes as $prefix) {
            for ($i = 1; $i <= 3; $i++) {
                $column = "file_path_{$prefix}_{$i}";
                if ($this->$column) {
                    $files["VARIABEL " . strtoupper($prefix)][] = $this->$column;
                }
            }
        }

        return $files;
    }
}