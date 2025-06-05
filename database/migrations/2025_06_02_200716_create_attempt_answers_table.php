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
        Schema::create('attempt_answers', function (Blueprint $table) {
            $table->id(); // Primary Key, Auto Increment

            $table->foreignId('kuis_attempt_id')->constrained('kuis_attempts')->onDelete('cascade');
            // ID upaya kuis, terhubung ke tabel 'kuis_attempts'

            $table->foreignId('pertanyaan_id')->constrained('pertanyaan')->onDelete('cascade');
            // ID Pertanyaan yang dijawab, terhubung ke tabel 'pertanyaan'

            $table->foreignId('pilihan_jawaban_id')->constrained('pilihan_jawaban')->onDelete('cascade');
            // ID Pilihan Jawaban yang dipilih murid, terhubung ke tabel 'pilihan_jawaban'
            // Jika murid boleh tidak menjawab, ini bisa dibuat ->nullable()->constrained(...) 
            // tapi dengan form radio button 'required', ini seharusnya selalu terisi.

            $table->boolean('is_benar')->nullable(); // Menandai apakah jawaban ini benar, diisi setelah penilaian. Nullable awalnya.

            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attempt_answers');
    }
};
