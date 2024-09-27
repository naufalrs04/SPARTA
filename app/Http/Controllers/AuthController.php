<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
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
            if ($user->kp==1 && $user->pa==1){
                return redirect()->intended('/dashboardKaprodi');
            }
            else if ($user->dk==1 && $user->pa==1){
                return redirect()->intended('/dashboardDekan');
            }
            else if ($user->pa==1) {
                return redirect()->intended('/dashboardPembimbingAkademik');
            }
            else {
                return redirect()->intended('/dashboardBagianAkademik');
            }
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
