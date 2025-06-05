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
        // Sesuaikan nama tabel jika Laravel membuat versi jamak otomatis (misal: 'questions')
        Schema::create('pertanyaan', function (Blueprint $table) {
            $table->id(); // Primary Key, Auto Increment

            // Foreign key untuk kuis_id (pertanyaan ini milik kuis mana)
            $table->foreignId('kuis_id')->constrained('kuis')->onDelete('cascade');
            // 'constrained('kuis')' akan mengacu ke tabel 'kuis' yang kita buat sebelumnya
            // 'onDelete('cascade')' berarti jika kuis dihapus, pertanyaan di dalamnya juga akan terhapus

            $table->text('teks_pertanyaan'); // Isi pertanyaan bisa panjang
            $table->string('tipe_pertanyaan')->default('pilihan_ganda'); // Misal: 'pilihan_ganda', 'isian_singkat', dll.

            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pertanyaan'); // Sesuaikan nama tabel jika berbeda
    }
};
