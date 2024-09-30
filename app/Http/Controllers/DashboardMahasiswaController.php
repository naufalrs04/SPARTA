<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Jadwal_Kuliah;
use App\Models\Mata_Kuliah;
use App\Models\Ruangan;
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

        $jadwal_kuliah = Jadwal_Kuliah::all();

        foreach ($jadwal_kuliah as $jadwal ){
            $jadwal -> nama_matakuliah = Mata_Kuliah::where('id', $jadwal->mata_kuliah_id)->first()->nama;
            $jadwal -> nama_ruangan = Ruangan::where('id', $jadwal->ruangan_id)->first()->nama;
        }

        return view('dashboardMahasiswa', compact('user','data','jadwal_kuliah'));

    }
}
