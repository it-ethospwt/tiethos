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
        Schema::create('affiliator', function (Blueprint $table) {
            $table->id();
            $table->string('produk_id');
            $table->string('nama');
            $table->enum('tim', ['Purwokerto', 'Cilacap']);
            $table->enum('jekel', ['Laki-Laki', 'Perempuan']);
            $table->string('gambar');
            $table->string('akun');
            $table->string('usia');
            $table->string('alamat');
            $table->string('cp');
            $table->enum('kategori', ['Life Style', 'Content Creator', 'Food Vloger', 'Cooking', 'Sport', 'Beauty', 'Comedy', 'Fashion', 'Family', 'Profesi', 'Trend', 'A Day In My Life']);
            $table->string('gmv');
            $table->string('komisi');
            $table->enum('agency', ['Agency', 'Non Agency']);
            $table->string('deskripsi');
            $table->string('like');
            $table->string('followers');
            $table->string('viewers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('affiliator');
    }
};
