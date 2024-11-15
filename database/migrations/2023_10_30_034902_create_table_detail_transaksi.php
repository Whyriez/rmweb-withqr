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
        Schema::create('table_detail_transaksi', function (Blueprint $table) {
            $table->id();
            $table->string('no_psn');
            $table->integer('id_menu');
            $table->integer('qty');
            $table->string('meja');
            $table->string('status_pesanan');
            $table->timestamps();

            $table->foreign('no_psn')
                ->references('no_pesanan')
                ->on('table_transaksi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_detail_transaksi');
    }
};
