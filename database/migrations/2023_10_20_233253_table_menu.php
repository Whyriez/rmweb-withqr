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
        Schema::create('table_menu', function (Blueprint $table) {
            $table->id();
            $table->string('Menu');
            $table->string('gambar');
            $table->unsignedBigInteger('kategori_id'); 
            $table->integer('harga');
            $table->timestamps();

            $table->foreign('kategori_id')->references('id')->on('tb_kategori');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_menu');
    }
};
