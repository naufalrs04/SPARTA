<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class inputnilai extends Controller
{
    public function index(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        // Ambil tema dari cookie atau gunakan 'light' sebagai default
        $theme = $request->cookie('theme') ?? 'light';
        
        return view('/inputnilai', compact( 'user', 'theme'));
    }
}