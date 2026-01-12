<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Template_Laporan extends Model
{
    protected $table = 'template_laporan';
    protected $primaryKey = 'id_template';
    public $timestamps = false; // karena tabel tidak punya created_at/updated_at

    protected $fillable = [
        'nama_template',
        'id_kategori',
        'file_path'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori');
    }
}
