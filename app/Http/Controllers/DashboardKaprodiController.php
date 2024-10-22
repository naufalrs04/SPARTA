<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardKaprodiController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();
        
        $data = [
            'nama' => $user->nama,
            'nim_nip' => $user->nim_nip,
        ];

        return view('dashboardKaprodi', compact('data', 'user'));
    }
}
