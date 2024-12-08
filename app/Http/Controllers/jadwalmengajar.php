<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class jadwalmengajar extends Controller
{
    public function index(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();
        $theme = $request->cookie('theme') ?? 'light';
        
        return view('/jadwalmengajar', compact('user', 'theme'));
    }
}