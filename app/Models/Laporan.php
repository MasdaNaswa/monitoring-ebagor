<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $table = 'laporan';
    protected $primaryKey = 'id_laporan';
    public $timestamps = false; // pakai kolom tanggal_upload manual

    protected $fillable = [
        'id_user', 
        'kategori', 
        'judul', 
        'file_path', 
        'tanggal_upload',
        'status', // Menunggu Verifikasi, Terverifikasi
        'catatan' // optional
    ];

    public function user()
{
    return $this->belongsTo(Pengguna::class, 'id_user');
}
}
