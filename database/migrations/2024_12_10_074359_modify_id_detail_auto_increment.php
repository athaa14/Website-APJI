<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('detail_pengajuan_koki', function (Blueprint $table) {
            // Ubah kolom 'id_detail' menjadi auto-increment
            $table->increments('id_detail')->change(); // Gunakan increments() untuk auto-increment
        });
    }
    
    public function down()
    {
        Schema::table('detail_pengajuan_koki', function (Blueprint $table) {
            // Kembalikan kolom ke tipe semula jika perlu
            $table->integer('id_detail')->change(); // Atau gunakan $table->bigInteger() jika menggunakan tipe lainnya
        });
    }
    
};
