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
        Schema::create('tbl_jurusan', function (Blueprint $table) {
            $table->id("id_jurusan");
            $table->integer("id_fakultas")->nullable(false);
            $table->string("kode_jurusan",10);
            $table->string("nama_jurusan",50);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_jurusan');
    }
};
