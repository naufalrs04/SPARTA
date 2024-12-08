<?php

namespace App\Http\Controllers;

use App\Models\PenyusunanJadwal;
use App\Models\ruangan_prodi;
use Database\Seeders\jadwal_kuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardDekanController extends Controller
{    public function index(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        $theme = $request->cookie('theme') ?? 'light';
        $countRuangandisetujui = ruangan_prodi::where('status_pengajuan', 'ter-verifikasi')->count();
        $countRuangantidakdisetujui = ruangan_prodi::where('status_pengajuan', 'Ditolak')->orWhereNull('status_pengajuan')->count();
        $countJadwalDisetujui = PenyusunanJadwal::where('status_pengajuan', 'ter-verifikasi')->count();
        $countJadwalTidakDisetujui = PenyusunanJadwal::where('status_pengajuan', 'Ditolak')->orWhereNull('status_pengajuan')->count();


        $data = [
            'nama' => $user->nama,
            'nim_nip' => $user->nim_nip,
            'status' => $user->status,
            'countRuangandisetujui' => $countRuangandisetujui,
            'countRuangantidakdisetujui' => $countRuangantidakdisetujui,
            'countJadwaldisetujui' => $countJadwalDisetujui,
            'countJadwaltidakdisetujui' => $countJadwalTidakDisetujui,
        ];

        return view('dashboardDekan', compact('data', 'user', 'theme'));
    }
}
