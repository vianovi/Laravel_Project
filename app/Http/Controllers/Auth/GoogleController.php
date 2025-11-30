<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class GoogleController extends Controller
{
    // Arahkan user ke halaman login Google
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    // Google akan mengirim balik ke sini setelah login
    public function callback()
    {
        // Ambil data user dari Google
        $googleUser = Socialite::driver('google')->stateless()->user();

        // Cari user berdasarkan email (supaya tidak dobel)
        $user = User::where('email', $googleUser->getEmail())->first();

        // Kalau belum ada, buat user baru
        if (! $user) {
            $user = User::create([
                'name'     => $googleUser->getName() ?? $googleUser->getNickname(),
                'email'    => $googleUser->getEmail(),
                // password random saja, karena login selalu lewat Google
                'password' => bcrypt(Str::random(16)),
            ]);
        }

        // Login-kan user ke aplikasi
        Auth::login($user, true);

        // Arahkan ke dashboard atau halaman utama
        return redirect()->intended('/dashboard');
    }
}

