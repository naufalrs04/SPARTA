<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ruangan_prodi;
use App\Models\Ruangan;
use Illuminate\Support\Facades\DB;
class verifikasiRuangKuliah extends Controller
{
    public function index(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        // Ambil tema dari cookie atau gunakan 'light' sebagai default
        $theme = $request->cookie('theme') ?? 'light';

        $verif = ruangan_prodi::select('nama_prodi', 'status_pengajuan')
            ->groupBy('nama_prodi', 'status_pengajuan')
            ->get();

        foreach ($verif as $verifikasi) {
            $ruangan_prodis = ruangan_prodi::where('nama_prodi', $verifikasi->nama_prodi)->get();
            
            $ruangan_details = $ruangan_prodis->map(function ($item) {
                $ruangan = Ruangan::find($item->ruangan_id);
                return [
                    'id' => $ruangan->id,
                    'nama' => $ruangan->nama,
                    'kapasitas' => $item->kapasitas,
                ];
            });
            
            $verifikasi->ruangan_details = $ruangan_details;
        }

        return view('/verifikasiRuangKuliah', compact('user', 'verif', 'theme'));
    }

    public function verifikasi($prodi)
    {
        ruangan_prodi::where('nama_prodi', $prodi)
            ->update(['status_pengajuan' => 'ter-Verifikasi']);

        return response()->json(['success' => true]);
    }

    public function tolak($prodi)
    {
        ruangan_prodi::where('nama_prodi', $prodi)
            ->update(['status_pengajuan' => 'Ditolak']);

        return response()->json(['success' => true]);
    }
}