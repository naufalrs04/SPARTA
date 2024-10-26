<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\irs;
use App\Models\Mata_Kuliah;
use App\Models\Ruangan;
use App\Models\Mahasiswa;
use App\Models\irs_rekap;

class PengisianIRS extends Controller
{

    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
    
        $user = Auth::user();
    
        // Data dari tabel irs
        $list_mata_kuliah = irs::all();
        foreach ($list_mata_kuliah as $mata_kuliah) {
            $mata_kuliah->kode = Mata_Kuliah::where('id', $mata_kuliah->mata_kuliah_id)->first()->kode;
            $mata_kuliah->nama = Mata_Kuliah::where('id', $mata_kuliah->mata_kuliah_id)->first()->nama;
            $mata_kuliah->sks = Mata_Kuliah::where('id', $mata_kuliah->mata_kuliah_id)->first()->sks;
    
            // Waktu
            $mata_kuliah->hari = Mata_Kuliah::where('id', $mata_kuliah->mata_kuliah_id)->first()->hari;
            $mata_kuliah->jam_mulai = Mata_Kuliah::where('id', $mata_kuliah->mata_kuliah_id)->first()->jam_mulai;
            $mata_kuliah->jam_selesai = Mata_Kuliah::where('id', $mata_kuliah->mata_kuliah_id)->first()->jam_selesai;
            $mata_kuliah->jadwal = $mata_kuliah->hari . ', ' . $mata_kuliah->jam_mulai . ' - ' . $mata_kuliah->jam_selesai;
    
            // Ruangan
            $mata_kuliah->nama_ruangan = Ruangan::where('id', $mata_kuliah->ruangan_id)->first()->nama;
            $mata_kuliah->kapasitas_ruangan = Ruangan::where('id', $mata_kuliah->ruangan_id)->first()->kapasitas;
        }
    
        // Data dari tabel irs_rekap
        $irs_rekap = irs_rekap::all();
        foreach ($irs_rekap as $rekap) {
            $rekap->kode = Mata_Kuliah::where('id', $rekap->mata_kuliah_id)->first()->kode;
            $rekap->nama = Mata_Kuliah::where('id', $rekap->mata_kuliah_id)->first()->nama;
            $rekap->sks = Mata_Kuliah::where('id', $rekap->mata_kuliah_id)->first()->sks;
    
            // Waktu
            $rekap->hari = Mata_Kuliah::where('id', $rekap->mata_kuliah_id)->first()->hari;
            $rekap->jam_mulai = Mata_Kuliah::where('id', $rekap->mata_kuliah_id)->first()->jam_mulai;
            $rekap->jam_selesai = Mata_Kuliah::where('id', $rekap->mata_kuliah_id)->first()->jam_selesai;
            $rekap->jadwal = $rekap->hari . ', ' . $rekap->jam_mulai . ' - ' . $rekap->jam_selesai;
    
            // Ruangan
            $rekap->nama_ruangan = Ruangan::where('id', $rekap->ruangan_id)->first()->nama;
            $rekap->kapasitas_ruangan = Ruangan::where('id', $rekap->ruangan_id)->first()->kapasitas;
        }
    
        // Kirim data ke view
        return view('pengisianirs', compact('user', 'list_mata_kuliah', 'irs_rekap'));
    }
    


    public function store(Request $request)
{
    try {
        $validated = $request->validate([
            'mata_kuliah_id' => 'required|integer|exists:mata_kuliahs,id',
            'ruangan_id' => 'required|integer|exists:ruangans,id',
        ]);

        $mahasiswa_id = Auth::id();
       
        // Masukkan data ke tabel irs_rekap
        $irsRekap = irs_rekap::updateOrCreate(
            [
                'mahasiswa_id' => $mahasiswa_id,
                'mata_kuliah_id' => $validated['mata_kuliah_id'],
            ],
            [
                'ruangan_id' => $validated['ruangan_id'],
            ]
        );

        return response()->json([
            'success' => true,
            'message' => 'Mata kuliah berhasil diambil',
            'data' => $irsRekap
        ]);
    } catch (\Illuminate\Validation\ValidationException $e) {
        return response()->json([
            'success' => false,
            'message' => 'Validasi gagal',
            'errors' => $e->errors()
        ], 422);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Terjadi kesalahan: ' . $e->getMessage()
        ], 500);
    }
}



    public function delete(Request $request)
{
    $validated = $request->validate([
        'mata_kuliah_id' => 'required|integer|exists:mata_kuliahs,id',
    ]);

    try {
        $mahasiswa_id = Auth::id();

        // Hapus mata kuliah dari database
        Irs_rekap::where('mahasiswa_id', $mahasiswa_id)
            ->where('mata_kuliah_id', $validated['mata_kuliah_id'])
            ->delete();

        return response()->json(['success' => true, 'message' => 'Mata kuliah berhasil dihapus.']);
    } catch (\Exception $e) {
        return response()->json(['success' => false, 'message' => $e->getMessage()]);
    }
}

}
