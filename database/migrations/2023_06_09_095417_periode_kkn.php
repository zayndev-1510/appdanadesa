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
        Schema::create('tbl_periode_kkn', function (Blueprint $table) {
            $table->id("id_periode_kkn");
            $table->string("tahun_akademik",10);
            $table->string("angkatan",10);
            $table->integer("status")->default(0);
            $table->date("tgl_akademik");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_periode_kkn');
    }
};
