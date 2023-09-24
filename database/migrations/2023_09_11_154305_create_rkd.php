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
        Schema::create('rkd', function (Blueprint $table) {
            $table->id();
            $table->integer("id_bidang")->nullable(false);
            $table->integer(("id_sub_bidang"))->nullable(false);
            $table->integer("id_kegiatan")->nullable(false);
            $table->string("lokasi",200)->nullable(false);
            $table->string("keluaran",200)->nullable(false);
            $table->string("manfaat",200)->nullable(false);
            $table->string("waktu_pelaksanaan",50)->nullable(false);
            $table->string("jenis_pelaksanaan",100)->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rkd');
    }
};
