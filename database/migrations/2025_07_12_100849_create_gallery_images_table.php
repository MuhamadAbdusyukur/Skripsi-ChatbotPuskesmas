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
        Schema::create('gallery_images', function (Blueprint $table) {
            $table->id(); // Kolom ID otomatis (primary key)
            $table->string('file_path'); // Path file gambar di storage (misal: public/gallery_images/nama_gambar.jpg)
            $table->string('description')->nullable(); // Deskripsi gambar (opsional)
            $table->integer('order')->nullable()->default(0); // Urutan tampil gambar (opsional, default 0)
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gallery_images');
    }
};