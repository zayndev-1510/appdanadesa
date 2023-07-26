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
        Schema::create('tbl_dpl', function (Blueprint $table) {
            $table->string("id_dpl")->nullable(false)->unique();
            $table->string("nidn")->nullable(false);
            $table->string("nama_dosen")->nullable(true);
            $table->string("gelar_depan")->nullable(true);
            $table->string("gelar_belakang")->nullable(true);
            $table->string("nomor_hp")->nullable(true);
            $table->string("email")->nullable(true)->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_dpl');
    }
};
