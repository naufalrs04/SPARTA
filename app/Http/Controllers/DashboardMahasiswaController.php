<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Irs_rekap;
use App\Models\Mata_Kuliah;
use App\Models\Ruangan;
use App\Models\Mahasiswa;
use App\Models\PenyusunanJadwal;
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

        $mahasiswa = Mahasiswa::where('nim', $user->nim_nip)->first();
        $nama_mahasiswa = User::where('id', Auth::id())->first()->nama;
        $status = $mahasiswa ? $mahasiswa->status : null;
        $nim = $mahasiswa ? $mahasiswa->nim_nip : null; 
        $ipk = $mahasiswa ? $mahasiswa->IPK : null;     
        $prodi = $mahasiswa ? $mahasiswa->prodi : null; 
        $semester = $mahasiswa ? $mahasiswa->semester : null; 
        $mahasiswa_id = $mahasiswa->id;

        $data = [
            'nama' => $user->nama,
            'nim_nip' => $user->nim_nip,
            'status' => $status,
            'IPK' => $ipk,
            'prodi' => $prodi,
            'semester' => $semester
        ];

        $jadwal_kuliah = Irs_rekap::where('mahasiswa_id', $mahasiswa_id)
                        ->where('semester',$semester)
                          ->where('status_pengajuan', 'disetujui')
                          ->get();

        // dd($jadwal_kuliah);

        foreach ($jadwal_kuliah as $jadwal ){
            $jadwal -> hari = PenyusunanJadwal::where('kode_mk', $jadwal->kode_mk)->first()->hari;
            $jadwal -> jam_mulai = PenyusunanJadwal::where('kode_mk', $jadwal->kode_mk)->first()->jam_mulai;
            $jadwal -> jam_selesai = PenyusunanJadwal::where('kode_mk', $jadwal->kode_mk)->first()->jam_selesai;
            $jadwal -> status_pengajuan = PenyusunanJadwal::where('kode_mk', $jadwal->kode_mk)->first()->status_pengajuan;
        }

        return view('dashboardMahasiswa', compact('user','data','nama_mahasiswa','jadwal_kuliah','mahasiswa_id'));

    }
}
