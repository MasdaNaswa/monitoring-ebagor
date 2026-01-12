<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RB_Tematik extends Model
{
    use HasFactory;

    protected $table = 'rb_tematik'; // nama tabel sesuai di database

    protected $fillable = [
        'permasalahan',           
        'sasaran_tematik',        
        'indikator',              
        'target',                
        'satuan',                 
        'rencana_aksi',           
        'output',                
        'target_tahun_2025',      
        'anggaran_tahun_2025',    
        'renaksi_tw1',            
        'renaksi_tw2',            
        'renaksi_tw3',            
        'renaksi_tw4',            
        'rumus',                  
        'unit_kerja',             
        'koordinator',            
        'pelaksana',              
    ];
}
