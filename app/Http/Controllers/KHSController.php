<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KHSController extends Controller
{
    public function index(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        $theme = $request->cookie('theme') ?? 'light';

        $data = [
            'nama' => $user->nama,
            'nim_nip' => $user->nim_nip,
        ];
        
        return view('/khs', compact('data', 'user', 'theme'));
    }
}
