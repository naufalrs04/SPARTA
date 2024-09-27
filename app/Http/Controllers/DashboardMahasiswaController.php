<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardMahasiswaController extends Controller
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

        return view('dashboardMahasiswa', compact('data', 'user'));
    }
}
