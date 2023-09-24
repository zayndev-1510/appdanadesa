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
        Schema::create('objek_pendapatan_desa', function (Blueprint $table) {
            $table->id();
            $table->integer("id_kelompok")->nullable(false);
            $table->integer("id_jenis")->nullable(false);
            $table->string("kode",10)->nullable(false);
            $table->string("keterangan",200)->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('objek_pendapatan_desa');
    }
};
