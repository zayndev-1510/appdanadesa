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
        Schema::create('tbl_calon_kkn', function (Blueprint $table) {
            $table->id("id_calon_kkn");
            $table->string("nim_mhs","12")->nullable(false);
            $table->string("kode_calon_kkn","50")->nullable(false);
            $table->string("email","50")->nullable(false);
            $table->string("nomor_hp","12")->nullable(false);
            $table->string("ukuran_baju","2")->nullable(false);
            $table->string("desa",50)->nullable(true);
            $table->string("kelurahan",50)->nullable(true);
            $table->string("kecamatan",50)->nullable(false);
            $table->string("kabupaten",50)->nullable(false);
            $table->integer("id_berkas_calon")->nullable(false);
            $table->date("tgl_daftar")->nullable(false);

        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_calon_kkn');
    }
};
