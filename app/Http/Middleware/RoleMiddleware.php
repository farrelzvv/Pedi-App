<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Jangan lupa import Auth
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string  $role  // Kita akan menerima parameter role di sini
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // Cek apakah pengguna sudah login
        if (!Auth::check()) {
            // Jika belum login, arahkan ke halaman login
            return redirect('login');
        }

        // Ambil role pengguna yang sedang login
        // Ingat, kita sepakat 0: Guru, 1: Murid
        $userRole = Auth::user()->role; // Asumsi kolom 'role' ada di model User

        // Ubah string role dari parameter ke integer jika perlu
        // Atau kita bisa langsung bandingkan string jika role di DB juga string
        // Untuk kasus kita (0 dan 1), kita samakan tipe datanya
        $expectedRole = (int) $role;

        if ($userRole === $expectedRole) {
            // Jika role pengguna sesuai dengan yang diharapkan, lanjutkan request
            return $next($request);
        }

        // Jika role tidak sesuai, kembalikan response error (misalnya, 403 Forbidden)
        // Atau arahkan ke halaman lain yang sesuai
        // abort(403, 'ANDA TIDAK MEMILIKI AKSES UNTUK HALAMAN INI.');
        return redirect('/home')->with('error', 'Anda tidak memiliki izin untuk mengakses halaman tersebut.');
    }
}
