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
        Schema::create('materis', function (Blueprint $table) { // Menggunakan nama tabel 'materis'
            $table->id();

            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            // ID Guru yang membuat materi, terhubung ke tabel 'users'

            $table->string('judul'); // Judul materi
            $table->text('deskripsi_singkat')->nullable(); // Deskripsi singkat materi
            $table->longText('konten')->nullable(); // Isi konten materi jika berupa teks panjang/HTML
            $table->string('file_path')->nullable(); // Path ke file jika materi berupa file upload
            $table->string('tipe_materi', 50)->default('teks')->nullable(); // Tipe materi: teks, file_pdf, video_link, dll.
            $table->boolean('is_published')->default(false); // Status publikasi materi

            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materis'); // Menggunakan nama tabel 'materis'
    }
};