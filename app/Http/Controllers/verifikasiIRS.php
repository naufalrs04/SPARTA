<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Mahasiswa;
use App\Models\PenyusunanJadwal;
use App\Models\Dosen;
use App\Models\Irs_rekap;
use App\Models\Mata_Kuliah;
use Illuminate\Support\Facades\DB;

class verifikasiIRS extends Controller
{
    public function index(Request $request)
{
    if (!Auth::check()) {
        return redirect()->route('login');
    }

    $user = Auth::user();

    $theme = $request->cookie('theme') ?? 'light';

    $dosen = Dosen::where('nip', $user->nim_nip)->first();

    $mhs_perwalian = Mahasiswa::where('id_wali', $dosen->id)->get();
    
    $mhs_belum_verifikasi = collect();
    $mhs_sudah_verifikasi = collect();

    $rekap = irs_rekap::select('kode_mk')->get();
    
    foreach ($mhs_perwalian as $mhs) {
        $mhs->nama = User::where('nim_nip', $mhs->nim)->first()->nama;
        $mhs->total_sks = Irs_rekap::where('mahasiswa_id', $mhs->id)->sum('sks');

        $mhs->mata_kuliah = Irs_rekap::where('mahasiswa_id', $mhs->id)->get()
        ->map(function ($rekap) {
            $jadwal = PenyusunanJadwal::where('kode_mk', $rekap->kode_mk)
                                       ->where('kelas', $rekap->kelas)
                                       ->first();
            $rekap->dosen = $jadwal ? $jadwal->dosen : 'Dosen Tidak Ditemukan';
            return $rekap;
        });

        $rekap_belum = Irs_rekap::where('mahasiswa_id', $mhs->id)
                                ->where('status_pengajuan', null)
                                ->get();

        $rekap_sudah = Irs_rekap::where('mahasiswa_id', $mhs->id)
                                ->where('status_pengajuan', '!=', null)
                                ->get();

        $rekap_pertama = Irs_rekap::where('mahasiswa_id', $mhs->id)->first();
        $mhs->status_pengajuan = $rekap_pertama ? $rekap_pertama->status_pengajuan : null;

        if ($rekap_belum->isNotEmpty()) {
            $mhs_copy = clone $mhs;
            $mhs_copy->rekap = $rekap_belum;
            $mhs_copy->total_sks = $rekap_belum->sum('sks');
            $mhs_belum_verifikasi->push($mhs_copy);
        }

        if ($rekap_sudah->isNotEmpty()) {
            $mhs_copy = clone $mhs;
            $mhs_copy->rekap = $rekap_sudah;
            $mhs_copy->total_sks = $rekap_sudah->sum('sks');
            $mhs_sudah_verifikasi->push($mhs_copy);
        }
    }

    return view('verifikasiIRS', compact('user', 'mhs_belum_verifikasi', 'mhs_sudah_verifikasi', 'theme'));
}

    public function setujuiIRS(Request $request)
    {
        $request->validate([
            'mahasiswa_id' => 'required|integer',
        ]);

        $updated = Irs_rekap::where('mahasiswa_id', $request->mahasiswa_id)
                    ->update(['status_pengajuan' => 'disetujui']);

        if ($updated) {
            return response()->json(['success' => true, 'message' => 'IRS berhasil disetujui']);
        } else {
            return response()->json(['success' => false, 'message' => 'Gagal mengubah status persetujuan'], 500);
        }
    }

    public function tolakIRS(Request $request)
    {
        $request->validate([
            'mahasiswa_id' => 'required|integer',
        ]);
    
        $updated = Irs_rekap::where('mahasiswa_id', $request->mahasiswa_id)
                    ->update(['status_pengajuan' => 'ditolak']);
    
        if ($updated) {
            return response()->json(['success' => true, 'message' => 'IRS berhasil ditolak']);
        } else {
            return response()->json(['success' => false, 'message' => 'Gagal mengubah status penolakan'], 500);
        }
    }

    public function batalkanIRS(Request $request)
    {
        $request->validate([
            'mahasiswa_id' => 'required|integer',
        ]);
    
        $updated = Irs_rekap::where('mahasiswa_id', $request->mahasiswa_id)
                    ->update(['status_pengajuan' => null]);
    
        if ($updated) {
            return response()->json(['success' => true, 'message' => 'IRS berhasil dibatalkan']);
        } else {
            return response()->json(['success' => false, 'message' => 'Gagal mengubah status pembatalan'], 500);
        }
    }
    public function setujuiSemua()
    {
        $updated = Irs_rekap::where('status_pengajuan', null)
                    ->update(['status_pengajuan' => 'disetujui']);

        if ($updated) {
            return response()->json(['success' => true, 'message' => 'Semua mahasiswa berhasil disetujui']);
        } else {
            return response()->json(['success' => false, 'message' => 'Gagal menyetujui semua mahasiswa'], 500);
        }
    }

}