<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisSertifikat extends Model
{
    // Nama tabel
    protected $table = 'jenis_sertifikat';

    // Kolom yang dapat diisi secara massal
    protected $fillable = [
        'id_sertifikat',
        'nama_sertfikat',
        'deskripsi',
        'created_at',
        'update_at',
    ];

    // Jika tabel ini memiliki kolom created_at dan updated_at, maka ini tetap true.
    public $timestamps = false; // Atur menjadi true jika tabel memiliki timestamps.

    // Tambahkan relasi jika ada hubungan dengan tabel lain
}
