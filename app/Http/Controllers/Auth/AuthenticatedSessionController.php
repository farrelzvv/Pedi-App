<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $user = Auth::user();

        // Periksa peran pengguna (asumsi 0 = Guru, 1 = Murid)
        if ($user->role == 0) {
            // Jika pengguna adalah Guru, arahkan ke dashboard guru
            return redirect()->route('guru.dashboard');
        }

        // Jika bukan Guru (misalnya Murid), arahkan ke tujuan yang dimaksud sebelumnya,
        // atau jika tidak ada, ke path '/dashboard' sebagai default.
        return redirect()->intended('/dashboard'); // <-- PERUBAHAN UTAMA DI SINI
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
