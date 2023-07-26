<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tbl_mahasiswa', function (Blueprint $table) {
            $table->id("id_mhs");
            $table->string("nim_mhs",12)->unique();
            $table->string("nama_mhs",40);
            $table->string("tempat_lahir_mhs",30);
            $table->date("tgl_lahir_mhs");
            $table->string("nomor_hp_mhs",12);
            $table->string("email_mhs",50)->unique();
            $table->string("angkatan_mhs",6);
            $table->string("foto_mhs");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_mahasiswa');
    }
};
