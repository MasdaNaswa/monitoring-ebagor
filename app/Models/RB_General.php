<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RB_General extends Model
{
    use HasFactory;

    protected $table = 'rb_general'; // nama tabel di database

    protected $fillable = [
        'sasaran_strategi',                    
        'indikator_capaian',                   
        'target',                              
        'satuan',                              
        'rencana_aksi',                        
        'output',                              
        'target_tahun_2025',                   
        'anggaran_tahun_2025',                
        'renaksi_tahun_2025_tw1',             
        'renaksi_tahun_2025_tw2',             
        'renaksi_tahun_2025_tw3',             
        'renaksi_tahun_2025_tw4',             
        'realisasi_renaksi_tw1',               
        'realisasi_renaksi_tw2',               
        'realisasi_renaksi_tw4',               
        'rumus',                              
        'catatan_evaluasi',                     
        'catatan_perbaikan',                    
        'unit_kerja',                          
    ];
}
