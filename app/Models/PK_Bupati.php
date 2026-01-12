<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PK_Bupati extends Model
{
    use HasFactory;

    protected $table = 'pk_bupati'; // nama tabel di database

    protected $fillable = [
        'sasaran_strategis',
        'indikator_kinerja',
        'target_2025',
        'satuan',
        'target_per_tw',
        'realisasi_per_tw',
        'penjelasan_analisis',
        'program',
        'realisasi_per_tri_wulan',
        'penanggung_jawab',
        'pagu_anggaran',
        'realisasi_anggaran',
    ];
}
