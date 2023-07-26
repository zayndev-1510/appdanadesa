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
        Schema::create('tbl_berita', function (Blueprint $table) {
            $table->id('id_berita');
            $table->string("thumbnail",100);
            $table->string("judul",30);
            $table->string("author",30);
            $table->text("konten");
            $table->date("tgl");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_berita');
    }
};
