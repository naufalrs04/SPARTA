<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Models\irs_rekap;
use App\Models\Mata_Kuliah;
use Illuminate\Support\Facades\DB;

class verifikasiIRS extends Controller
{
    public function index()
{
    if (!Auth::check()) {
        return redirect()->route('login');
    }

    // Ambil data dosen berdasarkan NIP
    $user = Auth::user();
    $dosen = Dosen::where('nip', $user->nim_nip)->first();

    // Ambil semua mahasiswa bimbingan dosen
    $mhs_perwalian = Mahasiswa::where('id_wali', $dosen->id)->get();

    $mhs_belum_verifikasi = collect();
    // Data untuk sudah terverifikasi
    $mhs_sudah_verifikasi = collect();
    foreach ($mhs_perwalian as $mhs) {
        $mhs->nama = User::where('nim_nip', $mhs->nim)->first()->nama;
        $mhs->total_sks = irs_rekap::where('mahasiswa_id', $mhs->id)->sum('sks');
        $rekap_belum = irs_rekap::where('mahasiswa_id', $mhs->id)
                                ->where('status_pengajuan', '!=', 'disetujui')
                                ->get();
        
        // Ambil rekap IRS yang sudah disetujui
        $rekap_sudah = irs_rekap::where('mahasiswa_id', $mhs->id)
                                ->where('status_pengajuan', 'disetujui')
                                ->get();

        // Jika ada rekap yang belum disetujui
        if ($rekap_belum->isNotEmpty()) {
            $mhs_copy = clone $mhs;
            $mhs_copy->rekap = $rekap_belum;
            $mhs_copy->total_sks = $rekap_belum->sum('sks');
            $mhs_belum_verifikasi->push($mhs_copy);
        }

        // Jika ada rekap yang sudah disetujui
        if ($rekap_sudah->isNotEmpty()) {
            $mhs_copy = clone $mhs;
            $mhs_copy->rekap = $rekap_sudah;
            $mhs_copy->total_sks = $rekap_sudah->sum('sks');
            $mhs_sudah_verifikasi->push($mhs_copy);
        }
    }

    
    return view('verifikasiIRS', compact('user', 'mhs_belum_verifikasi', 'mhs_sudah_verifikasi'));
}


    public function setujuiIRS(Request $request)
    {
        $request->validate([
            'mahasiswa_id' => 'required|integer',
        ]);

        $updated = irs_rekap::where('mahasiswa_id', $request->mahasiswa_id)
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
    
        $updated = irs_rekap::where('mahasiswa_id', $request->mahasiswa_id)
                    ->update(['status_pengajuan' => 'ditolak']);
    
        if ($updated) {
            return response()->json(['success' => true, 'message' => 'IRS berhasil ditolak']);
        } else {
            return response()->json(['success' => false, 'message' => 'Gagal mengubah status penolakan'], 500);
        }
    }
}

