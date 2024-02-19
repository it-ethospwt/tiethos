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
        Schema::create('knowladge', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->text('deskripsi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('knowladge');
    }


    // KETERANGAN
    /*
        Fungsi constrained()->onDelete('cascade') pada laravel digunakan untuk menentukan konstrain referensial antara kolom yang ditetapkan sebagai kunci 
        asing (foreignId) dengan kolom referensi utama (biasanya kunci primer) pada tabel lain.
        Di sini:
        - constrained() menandakan bahwa kita ingin menambahkan konstrain referensial.
        - onDelete('cascade') menandakan apa yang harus dilakukan jika terjadi penghapusan pada baris yang berhubungan. Dalam kasus ini, 
          cascade menandakan bahwa jika ada baris yang terhubung dengan product_id di tabel knowledges, dan baris dengan id yang cocok di tabel products dihapus, 
          maka baris-baris yang terkait di tabel knowledges juga akan dihapus secara otomatis.
          
        Jadi, ketika Anda menghapus suatu produk dari tabel products, semua entri yang terkait dengan produk tersebut dalam tabel knowledges juga akan dihapus secara otomatis
        untuk menjaga integritas referensial.
    */
};
