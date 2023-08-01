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
        Schema::create('profil_desa', function (Blueprint $table) {
            $table->id();
            $table->string("nama",50)->nullable(true);
            $table->string("provinsi",50)->nullable(true);
            $table->string("kecamatan",50)->nullable(true);
            $table->string("kabupaten",50)->nullable(true);
            $table->string("desa",50)->nullable(true);
            $table->string("id_pengisi")->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profil_desa');
    }
};
