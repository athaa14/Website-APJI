<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengajuanSertifikat extends Model
{
    // Nama tabel
    protected $table = 'pengajuan_sertifikat';

    // Kolom yang dapat diisi secara massal
    protected $fillable = [
        'id_pengajuan',
        'jenis_pengajuan',
        'status',
        'tanggal_pengajuan',
    ];

    // Jika tabel ini memiliki kolom created_at dan updated_at, maka ini tetap true.
    public $timestamps = false; // Atur menjadi true jika tabel memiliki timestamps.

     // Relasi ke detail_pengajuan_halal
     public function halal()
     {
         return $this->hasOne(PengajuanHalal::class, 'id_pengajuan', 'id_pengajuan');
     }
 
     // Relasi ke detail_pengajuan_koki
     public function koki()
     {
         return $this->hasOne(PengajuanKoki::class, 'id_pengajuan', 'id_pengajuan');
     }
 
     // Relasi ke detail_pengajuan_asisten_koki
     public function asistenKoki()
     {
         return $this->hasOne(PengajuanAsistenKoki::class, 'id_pengajuan', 'id_pengajuan');
     } 
}
