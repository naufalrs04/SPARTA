<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class penyusunanjadwal extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        

        $user = Auth::user();
        
        return view('/penyusunanjadwal', compact('user'));
    }
}
