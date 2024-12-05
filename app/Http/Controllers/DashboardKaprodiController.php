<?php

namespace App\Http\Controllers;

use App\Models\Mata_Kuliah;
use App\Models\PenyusunanJadwal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardKaprodiController extends Controller
{
    public function index(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        // Get the theme from cookies or default to 'light'
        $theme = $request->cookie('theme') ?? 'light';
        $countmatakuliah = PenyusunanJadwal::where('status_pengajuan', 'ter-verifikasi')->count();
        $countmatakuliahBelum = PenyusunanJadwal::where('status_pengajuan','Ditolak')->orWhereNull('status_pengajuan')->count();

        $data = [
            'nama' => $user->nama,
            'nim_nip' => $user->nim_nip,
            'countmatakuliah' => $countmatakuliah,
            'countmatakuliahBelum' => $countmatakuliahBelum
        ];
        

        return view('dashboardKaprodi', compact('data', 'user', 'theme'));
    }
}
