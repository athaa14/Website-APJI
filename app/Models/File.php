<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $table = 'file';

     // Kolom yang dapat diisi secara massal
     protected $fillable = [
        'ktp',
        'npwp',
        'sku',
    ];

    // Jika tabel ini memiliki kolom created_at dan updated_at, maka ini tetap true.
    public $timestamps = false; // Atur menjadi true jika tabel memiliki timestamps.

    // Tambahkan relasi jika ada hubungan dengan tabel lain
}
