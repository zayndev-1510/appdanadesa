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
        Schema::create('detail_rap', function (Blueprint $table) {
            $table->id();
            $table->string("no_urut")->nullable(false);
            $table->string("uraian",200)->nullable(false);
            $table->integer("id_rap")->nullable(false)->default(0);
            $table->integer("id_sumber")->nullable(false)->default(0);
            $table->string("jumlah_satuan")->nullable(false);
            $table->double("harga_satuan")->nullable(false)->default(0);
            $table->double("total")->nullable(false)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_rap');
    }
};
