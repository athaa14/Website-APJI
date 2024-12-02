<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataPengguna extends Model
{
    // Nama tabel
    protected $table = 'data_pengguna';

    // Kolom yang dapat diisi secara massal
    protected $fillable = [
        'email',
        'tipe_member',
        'nama_usaha',
        'alamat',
        'kota',
        'kecamatan',
        'kode_pos',
        'no_telp',
        'nama_pemilik',
        'no_ktp',
        'no_sku',
        'no_npwp',
        'k_usaha',
        'j_usaha',
    ];

    // Jika tabel ini memiliki kolom created_at dan updated_at, maka ini tetap true.
    public $timestamps = false; // Atur menjadi true jika tabel memiliki timestamps.

    // Tambahkan relasi jika ada hubungan dengan tabel lain
}
