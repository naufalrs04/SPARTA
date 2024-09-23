<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // Fungsi untuk autentikasi user
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if (!$user) {
            return back()->withErrors(['email' => 'Email tidak terdaftar !'])->onlyInput('email');
        }

        $hashedPassword = md5($credentials['password']);
        if ($hashedPassword !== $user->password) {
            return back()->withErrors(['password' => 'Password salah !'])->onlyInput('email');
        }

        Auth::login($user);
        $request->session()->regenerate();

        // Redirect berdasarkan tipe pengguna
        if (str_contains($user->email, '@students.sparta.ac.id')) {
            return redirect()->intended('/dashboardMahasiswa');
        } 
        elseif (str_contains($user->email, '@lecturer.sparta.ac.id')) {
            if ($user->status == 'dekan') {
                return redirect()->intended('/dashboarddekan');
            }
            elseif ($user->status == 'kaprodi') {
                return redirect()->intended('/dashboardkaprodi');
            }
            else {
                return redirect()->intended('/dashboardDosen');
            }
        }
    }
}
