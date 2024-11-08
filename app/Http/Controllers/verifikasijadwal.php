<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PenyusunanJadwal;
class verifikasijadwal extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();
        $verif = PenyusunanJadwal::select('prodi', 'status_pengajuan')
            ->groupBy('prodi', 'status_pengajuan')
            ->get();

        // dd($verif);
        foreach ($verif as $verifikasi) {
            $verifikasi = PenyusunanJadwal:: where('prodi', $verifikasi->prodi)->get();
        }

        
        
        
        return view('/verifikasijadwal', compact( 'user','verif'));
    }
}