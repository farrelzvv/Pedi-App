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
        // Sesuaikan nama tabel jika Laravel membuat versi jamak otomatis (misal: 'answer_choices')
        Schema::create('pilihan_jawaban', function (Blueprint $table) {
            $table->id(); // Primary Key, Auto Increment

            // Foreign key untuk pertanyaan_id (pilihan ini milik pertanyaan mana)
            $table->foreignId('pertanyaan_id')->constrained('pertanyaan')->onDelete('cascade');
            // 'constrained('pertanyaan')' akan mengacu ke tabel 'pertanyaan'
            // 'onDelete('cascade')' berarti jika pertanyaan dihapus, pilihan jawabannya juga akan terhapus

            $table->text('teks_pilihan'); // Teks dari pilihan jawaban
            $table->boolean('is_benar')->default(false); // Menandai apakah ini jawaban yang benar (true/false atau 1/0)

            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pilihan_jawaban'); // Sesuaikan nama tabel jika berbeda
    }
};
