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
        Schema::create('kols', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->date('tanggal_tayang');
            $table->string('owning');
            $table->string('rate_card');
            $table->string('transfer');
            $table->string('resi');
            $table->string('ekspedisi');
            $table->string('id_produk');
            $table->string('user');
            $table->string('gambar');
            $table->string('video');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kols');
    }
};
