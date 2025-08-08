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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Judul artikel/berita
            $table->string('slug')->unique(); // Untuk URL ramah SEO, harus unik
            $table->text('summary')->nullable(); // Ringkasan singkat
            $table->longText('content'); // Konten lengkap artikel
            $table->string('image')->nullable(); // Nama file gambar thumbnail
            $table->timestamp('published_at')->nullable(); // Tanggal publish
            $table->integer('comments_count')->default(0); // Jumlah komentar (opsional, jika ada fitur komentar)
            // Jika Anda punya fitur admin, bisa tambahkan foreign key ke tabel users
            // $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};