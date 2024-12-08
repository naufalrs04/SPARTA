<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dosen;
use App\Models\Ruangan;
use App\Models\Mata_Kuliah;
use Illuminate\Http\Request;
use App\Models\ruangan_prodi;
use Illuminate\Support\Carbon;
use App\Models\PenyusunanJadwal;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Database\Seeders\PenyusunanJadwalSeeder;
use App\Http\Requests\StorePenyusunanJadwalRequest;
use App\Http\Requests\UpdatePenyusunanJadwalRequest;

class PenyusunanJadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $user = Auth::user();
        $countmatakuliah = PenyusunanJadwal::count();
        $theme = $request->cookie('theme') ?? 'light';

        $matakuliahList = Mata_Kuliah::select('kode as kodemk', 'nama as namemk', 'sks as sksmk', 'semester as smtmk', 'prodi as prodimk')->get();
        foreach ($matakuliahList as $matakuliah) {
            $ruanganList = ruangan_prodi::where('nama_prodi', $matakuliah->prodimk)
                        ->where('status_pengajuan', 'ter-Verifikasi') 
                        ->select('ruangan_id','kapasitas')
                        ->get();    
            $ruanganDetailList = [];
            foreach ($ruanganList as $ruangan) {
                $namaRuangan = Ruangan::where('id', $ruangan->ruangan_id)->select('nama')->first();
                $ruanganDetailList[] = [
                    'nama' => $namaRuangan->nama,
                    'kapasitas' => $ruangan->kapasitas
                ];
            }
            $matakuliah->ruangan_detail = $ruanganDetailList;
        }

        $mklist = PenyusunanJadwal::all();
        $dosen = Dosen::all();

        $matakuliah = Mata_Kuliah::all();

        foreach ($dosen as $daftar_dosen) {
            $daftar_dosen->nama = User::where('nim_nip', $daftar_dosen->nip)->first()->nama;
        }
        return view('penyusunanjadwal', compact('user', 'matakuliahList','mklist','ruanganDetailList','dosen', 'theme','countmatakuliah', 'matakuliah'));
    }

    public function penyusunanjadwalkuliah() 
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    Log::info($request->all()); 

    $validatedData = $request->validate([
        'nama_mk' => 'required|string',
        'kode_mk' => 'required|string',
        'sks_mk' => 'required|integer',
        'semester_mk' => 'required|integer',
        'prodi' => 'required|string',
        'kelas' => 'required|string',
        'tahun_ajaran' => 'required|string',
        'dosen' => 'required|array', 
        'ruang' => 'required|string',
        'kapasitas' => 'required|integer',
        'hari' => 'required|string',
        'jam_mulai' => 'required|date_format:H:i',
        'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
    ]);

    try {
        $jamMulai = Carbon::createFromFormat('H:i', $validatedData['jam_mulai']);
        $jamSelesai = Carbon::createFromFormat('H:i', $validatedData['jam_selesai']);

        $conflictingSchedule = PenyusunanJadwal::where('hari', $validatedData['hari'])
            ->where('ruang', $validatedData['ruang'])
            ->where(function ($query) use ($jamMulai, $jamSelesai) {
                $query->whereBetween('jam_mulai', [$jamMulai, $jamSelesai])
                    ->orWhereBetween('jam_selesai', [$jamMulai, $jamSelesai])
                    ->orWhere(function ($query) use ($jamMulai, $jamSelesai) {
                        $query->where('jam_mulai', '<=', $jamMulai)
                              ->where('jam_selesai', '>=', $jamSelesai);
                    });
            })
            ->first();

        if ($conflictingSchedule) {
            return response()->json([
                'success' => false,
                'message' => 'Jadwal bertabrakan dengan jadwal lain di ruangan yang sama.',
                'conflict' => $conflictingSchedule
            ], 422);
        }

        $penyusunanJadwal = new PenyusunanJadwal();
        $penyusunanJadwal->fill($validatedData);
        $penyusunanJadwal->dosen = implode(',', $validatedData['dosen']); 
        $penyusunanJadwal->save();

        return response()->json([
            'success' => true,
            'message' => 'Jadwal berhasil ditambahkan',
            'data' => $penyusunanJadwal
        ]);
    } catch (\Exception $e) {
        Log::error('Error saving schedule: ' . $e->getMessage());
        return response()->json([
            'success' => false,
            'message' => 'Gagal menambahkan jadwal. Silakan coba lagi.'
        ], 500);
    }
}
    /**
     * Display the specified resource.
     */
    public function show(PenyusunanJadwal $penyusunanJadwal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PenyusunanJadwal $penyusunanJadwal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePenyusunanJadwalRequest $request, PenyusunanJadwal $penyusunanJadwal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    try {
        $penyusunanJadwal = PenyusunanJadwal::find($id);

        if (!$penyusunanJadwal) {
            return response()->json([
                'success' => false,
                'message' => 'Mata kuliah tidak ditemukan.'
            ], 404);
        }

        $penyusunanJadwal->delete();

        return response()->json([
            'success' => true,
            'message' => 'Mata kuliah berhasil dihapus.'
        ]);
    } catch (\Exception $e) {
        Log::error('Error saat menghapus mata kuliah: ' . $e->getMessage());

        return response()->json([
            'success' => false,
            'message' => 'Terjadi kesalahan saat menghapus mata kuliah.'
        ], 500);
    }
}

    public function storeMataKuliah(Request $request) {
    $validated = $request->validate([
        'kodeMK' => 'required|string|max:50|unique:mata_kuliahs,kode',
        'namaMK' => 'required|string|max:255',
        'sksMK' => 'required|integer|min:1',
        'smtMK' => 'required|integer|min:1|max:8',
        'prodiMK' => 'required|string|max:100',
    ]);

    $existingmatakuliah = Mata_Kuliah::where('kode', $request->input('kodeMK'))->first();

    if ($existingmatakuliah) {
        return response()->json([
            'success' => false,
            'message' => 'Mata Kuliah sudah ada.',
        ]);
    }

    Mata_Kuliah::create([
        'kode' => $validated['kodeMK'],
        'nama' => $validated['namaMK'],
        'sks' => $validated['sksMK'],
        'semester' => $validated['smtMK'],
        'prodi' => $validated['prodiMK'],
    ]);

    return response()->json([
        'success' => true,
        'message' => 'Mata Kuliah berhasil ditambahkan.',
    ]);
}


    public function getMataKuliah($id)
    {
        $matkul = Mata_Kuliah::find($id);

        if ($matkul) {
            return response()->json([
                'success' => true,
                'matkul' => $matkul,
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Mata Kuliah tidak ditemukan.',
        ]);
    }

    public function hapusMataKuliah(Request $request)
    {
    $request->validate([
        'namaMK' => 'required|string',
    ]);

    try {
        $mataKuliah = Mata_Kuliah::where('nama', $request->namaMK)->first();

        if (!$mataKuliah) {
            return response()->json([
                'success' => false,
                'message' => 'Mata Kuliah tidak ditemukan!',
            ], 404);
        }

        $mataKuliah->delete();

        return response()->json([
            'success' => true,
            'message' => 'Mata Kuliah berhasil dihapus.',
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Terjadi kesalahan saat menghapus Mata Kuliah.',
        ], 500);
    }
}


    
}
