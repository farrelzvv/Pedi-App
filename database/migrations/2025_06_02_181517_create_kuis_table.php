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
        // Sesuaikan nama tabel jika Laravel membuat versi jamak otomatis (misal: 'quizzes')
        Schema::create('kuis', function (Blueprint $table) {
            $table->id(); // Primary Key, Auto Increment (bigInteger unsigned)

            // Foreign key untuk user_id (Guru yang membuat kuis)
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            // 'constrained('users')' akan mengacu ke tabel 'users'
            // 'onDelete('cascade')' berarti jika user dihapus, kuis miliknya juga akan terhapus

            $table->string('judul');
            $table->text('deskripsi')->nullable(); // Deskripsi bisa jadi panjang dan boleh kosong
            $table->timestamps(); // Membuat kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kuis'); // Sesuaikan nama tabel jika berbeda
    }
};
