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
        Schema::create('tbl_berkas_calon_kkn', function (Blueprint $table) {
            $table->id("id_berkas_calon_kkn");
            $table->string("foto",255)->nullable(false);
            $table->string("surat_izin_atas",255)->nullable(true);
            $table->string("sertifikat_vaksin",255)->nullable(true);
            $table->string("surat_izin_ortu",255)->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_berkas_calon_kkn');
    }
};
