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
        Schema::create('rab_rinci', function (Blueprint $table) {
            $table->id();
            $table->string("nomor_urut",200);
            $table->string("uraian",200);
            $table->string("jumlah",200);
            $table->string("harga",200);
            $table->integer("sumber_dana")->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rab_rinci');
    }
};
