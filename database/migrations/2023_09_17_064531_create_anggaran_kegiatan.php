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
        Schema::create('anggaran_kegiatan', function (Blueprint $table) {
            $table->id();
            $table->integer("id_kegiatan")->nullable(false)->default(0);
            $table->string("lokasi",100)->nullable(false);
            $table->string("waktu",20)->nullable(false);
            $table->integer("id_perangkat_desa")->nullable(false)->default(0);
            $table->string("keluaran",200)->nullable(false);
            $table->string("volume",50)->nullable(false);
            $table->float("pagu")->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggaran_kegiatan');
    }
};
