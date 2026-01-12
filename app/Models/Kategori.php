<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'kategori';

    // Primary key
    protected $primaryKey = 'id_kategori';

    // Jika primary key bukan auto-increment integer:
    // public $incrementing = false;
    // protected $keyType = 'string';

    protected $fillable = ['nama_kategori'];
}
