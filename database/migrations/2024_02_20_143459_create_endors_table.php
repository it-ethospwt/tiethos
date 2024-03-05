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
        Schema::create('endors', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id')->constrained()->onDelete('cascade');
            $table->string('nm_endorse',200);
            $table->integer('usia');
            $table->string('jns_kelamin');
            $table->text('alamat');
            $table->string('kontak_person');
            $table->string('kategori');
            $table->string('spesifikasi_akun');
            $table->string('link_akun');
            $table->string('sosial_media');
            $table->string('viewer');
            $table->string('like');
            $table->string('follower');
            $table->integer('rate_card');
            $table->string('engagement_rate')->nullable();
            $table->string('owning');
            $table->string('foto', 225)->nullable();
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('endors');
    }
};
