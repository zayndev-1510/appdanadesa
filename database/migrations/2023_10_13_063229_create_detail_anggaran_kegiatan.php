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
        Schema::create('detail_anggaran_kegiatan', function (Blueprint $table) {
            $table->id();
            $table->integer("id_anggaran_kegiatan");
            $table->string("nama_paket",200)->nullable(true);
            $table->float("nilai")->default(0);
            $table->integer("id_pola_kegiatan")->default(0);
            $table->string("target",100);
            $table->string("uraiain",100);
            $table->string("satuan",100);
            $table->integer("id_sumber_dana");
            $table->integer("sifat_kegiatan");
            $table->string("lokasi_kegiatan",100)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_anggaran_kegiatan');
    }
};
