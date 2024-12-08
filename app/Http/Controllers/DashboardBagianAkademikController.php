<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Ruangan;
use App\Models\ruangan_prodi;
class DashboardBagianAkademikController extends Controller
{
    public function index(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        $theme = $request->cookie('theme') ?? 'light';
        $countRuanganProdi = ruangan_prodi::count();

        $countRuangan = Ruangan::count();
        $data = [
            'nama' => $user->nama,
            'nim_nip' => $user->nim_nip,
            'status' => $user->status,
            'countRuanganProdi' => $countRuanganProdi,
            'countRuangan' => $countRuangan,
        ];


        return view('dashboardBagianAkademik', compact('data', 'user', 'theme'));
    }
}
