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
        Schema::create('kuis_attempts', function (Blueprint $table) {
            $table->id(); // Primary Key, Auto Increment

            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            // ID Murid yang mengerjakan, terhubung ke tabel 'users'
            // onDelete('cascade') berarti jika user (murid) dihapus, attempt kuisnya juga ikut terhapus.

            $table->foreignId('kuis_id')->constrained('kuis')->onDelete('cascade');
            // ID Kuis yang dikerjakan, terhubung ke tabel 'kuis'
            // onDelete('cascade') berarti jika kuis dihapus, attempt kuis terkait juga ikut terhapus.

            $table->unsignedInteger('skor')->nullable(); // Skor yang diperoleh, bisa null saat attempt baru dibuat sebelum dinilai.
            // Kita bisa menggunakan integer atau decimal tergantung kebutuhan presisi skor.
            // $table->decimal('skor', 5, 2)->nullable(); // Contoh jika skor pakai desimal (misal 90.50)

            $table->timestamps(); // Membuat kolom created_at (waktu mulai/submit) dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kuis_attempts');
    }
};
