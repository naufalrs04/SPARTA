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
            $jurusan->total_ruangan = ruangan_prodi::where('nama_prodi', $jurusan->nama)->count();

            $ruangan_prodis = ruangan_prodi::where('nama_prodi', $jurusan->nama_prodi)->get();
            $ruangan_details = $ruangan_prodis->map(function ($item) {
                $ruangan = Ruangan::find($item->ruangan_id);
                return [
                    'id' => $ruangan->id,
                    'nama' => $ruangan->nama,
                    'kapasitas'=>$item->kapasitas,
                ];
            });
            
            $jurusan->ruangan_details = $ruangan_details;
        }
        // dd($prodi);

        $gedung = Gedung::all();
        

        $ruangan = Ruangan::all()->groupBy('gedung_id');

        $rekap_prodi = ruangan_prodi::all();

        $ruanganIds = ruangan_prodi::pluck('ruangan_id')->toArray();
        $ruanganDetails = Ruangan::whereIn('id', $ruanganIds)->get()->keyBy('id');

        // Gabungkan data ruangan_prodi dengan detail ruangan
        $ruanganProdi = ruangan_prodi::all()->map(function ($prodi) use ($ruanganDetails) {
            $prodi->ruangan = $ruanganDetails[$prodi->ruangan_id] ?? null;
            return $prodi;
        })->groupBy('ruangan_id');

        // dd($ruanganProdi);

        return view('/pembagiankelasInfo', compact( 'user','prodi','jurusan','ruangan','gedung','theme','ruanganProdi'));
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

public function destroy($id)
{
    // Cari data ruangan_prodi berdasarkan ruangan_id dan nama_prodi
    $ruanganProdi = ruangan_prodi::where('ruangan_id', $id)->first();

    if (!$ruanganProdi) {
        return response()->json(['error' => 'Ruangan tidak ditemukan pada prodi ini'], 404);
    }

    // Hapus entri dari tabel ruangan_prodi
    $ruanganProdi->delete();

    return response()->json(['success' => 'Ruangan berhasil dihapus dari Prodi'], 200);
}
public function storeRuangan(Request $request)
{
    $request->validate([
        'nama' => 'required|string|max:255',
        'kode' => 'required|string|max:10',
        'gedung' => 'required|string',
    ]);

    // Periksa apakah nama ruangan sudah ada
    $existingRuangan = Ruangan::where('nama', $request->input('nama'))->first();
    if ($existingRuangan) {
        return response()->json([
            'success' => false,
            'message' => 'Nama ruangan sudah ada dalam database.',
        ]);
    }

    // Ambil huruf awal dari nama gedung
    $namaGedung = $request->input('gedung');
    $hurufAwalGedung = substr($namaGedung, -1); // Ambil huruf terakhir dari "Gedung X"

    // Validasi apakah nama ruangan sesuai dengan huruf awal gedung
    if (strtoupper($request->input('nama'))[0] !== $hurufAwalGedung) {
        return response()->json([
            'success' => false,
            'message' => 'Nama ruangan harus sesuai dengan gedung yang dipilih.',
        ]);
    }

    $gedung = Gedung::where('nama', $namaGedung)->first();
    if (!$gedung) {
        return response()->json([
            'success' => false,
            'message' => 'Gedung tidak ditemukan.',
        ]);
    }

    // Simpan ruangan ke database
    Ruangan::create([
        'nama' => $request->input('nama'),
        'kode' => $request->input('kode'),
        'gedung_id' => $gedung->id,
        'kapasitas' => 0,
    ]);

    return response()->json([
        'success' => true,
        'message' => 'Ruangan berhasil ditambahkan ke ' . $gedung->nama,
    ]);
}


public function getRuangans()
{
    return Ruangan::orderBy('nama', 'asc')->get();
}

public function deleteRuangan($id)
{
    $ruangan = Ruangan::find($id);

    if (!$ruangan) {
        return response()->json(['success' => false, 'message' => 'Ruangan tidak ditemukan.'], 404);
    }

    $ruangan->delete();

    return response()->json(['success' => true, 'message' => 'Ruangan berhasil dihapus.']);
}


}
