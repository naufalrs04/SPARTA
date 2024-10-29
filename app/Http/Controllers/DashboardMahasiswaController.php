<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\irs;
use App\Models\Mata_Kuliah;
use App\Models\Ruangan;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DashboardMahasiswaController extends Controller
{
    public function index()
    {
        // if (!Auth::check()) {
        //     return redirect()->route('login');
        // }

        // $user = Auth::user();

        // $data = Mahasiswa::where('id', Auth::id())->first();
        // $data->semester = 
        // $nama_mahasiswa = User::where('id', Auth::id())->first()->nama;

        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        // Ambil data status dari tabel mahasiswas berdasarkan user_id
        $mahasiswa = Mahasiswa::where('id', $user->id)->first();
        $nama_mahasiswa = User::where('id', Auth::id())->first()->nama;
        $status = $mahasiswa ? $mahasiswa->status : null;
        $nim = $mahasiswa ? $mahasiswa->nim_nip : null; 
        $ipk = $mahasiswa ? $mahasiswa->IPK : null;     
        $prodi = $mahasiswa ? $mahasiswa->prodi : null; 
        $semester = $mahasiswa ? $mahasiswa->semester : null; 
        

        $data = [
            'nama' => $user->nama,
            'nim_nip' => $user->nim_nip,
            'status' => $status,
            'IPK' => $ipk,
            'prodi' => $prodi,
            'semester' => $semester
        ];

        $jadwal_kuliah = irs::all();

        foreach ($jadwal_kuliah as $jadwal ){
            $jadwal -> hari = Mata_Kuliah::where('id', $jadwal->mata_kuliah_id)->first()->hari;
            $jadwal -> jam_mulai = Mata_Kuliah::where('id', $jadwal->mata_kuliah_id)->first()->jam_mulai;
            $jadwal -> jam_selesai = Mata_Kuliah::where('id', $jadwal->mata_kuliah_id)->first()->jam_selesai;
            $jadwal -> nama_matakuliah = Mata_Kuliah::where('id', $jadwal->mata_kuliah_id)->first()->nama;
            $jadwal -> nama_ruangan = Ruangan::where('id', $jadwal->ruangan_id)->first()->nama;
        }

        return view('dashboardMahasiswa', compact('user','data','nama_mahasiswa','jadwal_kuliah'));

    }
}
