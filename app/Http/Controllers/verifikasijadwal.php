<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PenyusunanJadwal;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

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
        ->get()
        ->map(function ($verifikasi) {
            $verifikasi->jadwal_details = PenyusunanJadwal::where('prodi', $verifikasi->prodi)->get()->map(function ($item) {
                return [
                    'id' => $item->id,
                    'nama_mk' => $item->nama_mk,
                    'kode_mk' => $item->kode_mk,
                    'sks_mk' => $item->sks_mk,
                    'semester_mk' => $item->semester_mk,
                    'kelas' => $item->kelas,
                    'tahun_ajaran' => $item->tahun_ajaran,
                    'dosen' => $item->dosen,
                    'ruang' => $item->ruang,
                    'kapasitas' => $item->kapasitas,
                    'hari' => $item->hari,
                    'jam_mulai' => $item->jam_mulai,
                    'jam_selesai' => $item->jam_selesai,
                ];
            });
            return $verifikasi;
        });

    return view('/verifikasijadwal', compact('user', 'verif'));
    }

    public function verifikasi($prodi)
    {
        Log::info('Verifikasi function triggered with prodi: ' . $prodi);
        PenyusunanJadwal::where('prodi', $prodi)
            ->update(['status_pengajuan' => 'ter-Verifikasi']);

        return response()->json(['success' => true]);
    }

    public function tolak($prodi)
    {
        PenyusunanJadwal::where('prodi', $prodi)
            ->update(['status_pengajuan' => 'Ditolak']);

        return response()->json(['success' => true]);
    }
}