<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail; // Mungkin sudah ada
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens; // Mungkin sudah ada jika menggunakan Sanctum
use Illuminate\Database\Eloquent\Relations\HasMany; // Tambahkan import ini

class User extends Authenticatable // Bisa juga implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable; // Sesuaikan 'use' traits yang sudah ada

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // Pastikan 'role' sudah ada di $fillable jika belum
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed', // Untuk Laravel versi baru, 'hashed' menggantikan 'hash'
    ];

    /**
     * Mendapatkan semua kuis yang dibuat oleh user ini (jika user adalah Guru).
     */
    public function kuis(): HasMany // Atau bisa dinamai quizzes()
    {
        return $this->hasMany(Kuis::class, 'user_id');
    }

    public function kuisAttempts(): HasMany // atau attempts()
    {
        return $this->hasMany(KuisAttempt::class, 'user_id');
    }

    public function materi(): HasMany // atau materials()
    {
        return $this->hasMany(Materi::class, 'user_id');
    }

    public function refleksiPosts(): HasMany
    {
        return $this->hasMany(RefleksiPost::class, 'user_id');
    }
}
