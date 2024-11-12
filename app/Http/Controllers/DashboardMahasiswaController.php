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
    public function index(Request $request)
{
    if (!Auth::check()) {
        return redirect()->route('login');
    }

    $user = Auth::user();

    // Get theme from cookie or default to 'light'
    $theme = $request->cookie('theme') ?? 'light';

    $mahasiswa = Mahasiswa::where('nim', $user->nim_nip)->first();
    $nama_mahasiswa = $user->nama;
    $status = $mahasiswa ? $mahasiswa->status : null;
    $nim = $mahasiswa ? $mahasiswa->nim_nip : null;
    $ipk = $mahasiswa ? $mahasiswa->IPK : null;
    $prodi = $mahasiswa ? $mahasiswa->prodi : null;
    $semester = $mahasiswa ? $mahasiswa->semester : null;
    $mahasiswa_id = $mahasiswa ? $mahasiswa->id : null;

    $data = [
        'nama' => $user->nama,
        'nim_nip' => $user->nim_nip,
        'status' => $status,
        'IPK' => $ipk,
        'prodi' => $prodi,
        'semester' => $semester
    ];

    // Retrieve approved schedules with related data
    $jadwal_kuliah = Irs_rekap::where('mahasiswa_id', $mahasiswa_id)
                    ->where('semester', $semester)
                    ->where('status_pengajuan', 'disetujui')
                    ->get();

    // Add related timing details and sort by day
    $daysOrder = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];

    foreach ($jadwal_kuliah as $jadwal) {
        $penyusunanJadwal = PenyusunanJadwal::where('kode_mk', $jadwal->kode_mk)->first();

        if ($penyusunanJadwal) {
            $jadwal->hari = $penyusunanJadwal->hari;
            $jadwal->jam_mulai = $penyusunanJadwal->jam_mulai;
            $jadwal->jam_selesai = $penyusunanJadwal->jam_selesai;
        } else {
            $jadwal->hari = null;
            $jadwal->jam_mulai = null;
            $jadwal->jam_selesai = null;
        }
    }

    // Sort by day using custom order
    $jadwal_kuliah = $jadwal_kuliah->sortBy(function ($jadwal) use ($daysOrder) {
        return array_search($jadwal->hari, $daysOrder);
    });

    return view('dashboardMahasiswa', compact('user', 'data', 'nama_mahasiswa', 'jadwal_kuliah', 'mahasiswa_id', 'theme'));
}

}
