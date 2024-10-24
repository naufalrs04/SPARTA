<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Ruangan;
class pembagiankelasInfo extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        
        $user = Auth::user();
        
        return view('/pembagiankelasInfo', compact( 'user'));
    }
}
