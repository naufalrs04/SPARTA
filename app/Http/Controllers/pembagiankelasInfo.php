<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Ruangan;
use App\Models\Gedung;
use App\Models\ruangan_prodi;
use App\Models\prodi;

class pembagiankelasInfo extends Controller
{
    public function index(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();
        
        // Ambil nilai tema dari cookie
        $theme = $request->cookie('theme') ?? 'light';
        
        $prodi=prodi::all();
        foreach ($prodi as $jurusan) {
            $jurusan->nama = prodi::where('id', $jurusan->id)->first()->nama_prodi;

        }

        $gedung = Gedung::all();
        

        $ruangan = Ruangan::all()->groupBy('gedung_id');

        $rekap_prodi = ruangan_prodi::all();
        
        
        
        return view('/pembagiankelasInfo', compact( 'user','prodi','jurusan','ruangan','gedung','theme'));
    }

    public function simpanRuangan(Request $request)
{
    $request->validate([
        'prodi' => 'required|string',
        'ruangan' => 'required|array',
        'ruangan.*' => 'exists:ruangans,id',
        'kapasitas' => 'required|integer|min:1', // Validasi kapasitas
    ]);

    $prodi = $request->input('prodi');
    $ruanganIds = $request->input('ruangan');
    $kapasitas = $request->input('kapasitas'); // Ambil kapasitas

    $existingRuangan = ruangan_prodi::where('nama_prodi', $prodi)
        ->whereIn('ruangan_id', $ruanganIds)
        ->pluck('ruangan_id')
        ->toArray();

    if (!empty($existingRuangan)) {
        $existingRuanganNames = Ruangan::whereIn('id', $existingRuangan)->pluck('nama')->implode(', ');
        return redirect()->back()->with('error', "Ruangan {$existingRuanganNames} sudah terdaftar untuk prodi {$prodi}.");
    }

    foreach ($ruanganIds as $ruanganId) {
        ruangan_prodi::create([
            'ruangan_id' => $ruanganId,
            'nama_prodi' => $prodi,
            'kapasitas' => $kapasitas, // Simpan kapasitas
        ]);
    }

    return redirect()->back()->with('success', 'Data berhasil disimpan.');
}



}
