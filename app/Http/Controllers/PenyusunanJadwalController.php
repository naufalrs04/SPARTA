<?php

namespace App\Http\Controllers;

use App\Models\Mata_Kuliah;
use Illuminate\Http\Request;
use App\Models\PenyusunanJadwal;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePenyusunanJadwalRequest;
use App\Http\Requests\UpdatePenyusunanJadwalRequest;
use App\Models\ruangan_prodi;
use App\Models\Ruangan;
class PenyusunanJadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $user = Auth::user();
        $matakuliahList = Mata_Kuliah::select('kode as kodemk', 'nama as namemk', 'sks as sksmk', 'semester as smtmk', 'prodi as prodimk')->get();
        foreach ($matakuliahList as $matakuliah) {
            // Ambil daftar ruangan_id yang sesuai dengan prodi mata kuliah
            $ruanganList = Ruangan_Prodi::where('nama_prodi', $matakuliah->prodimk)->select('ruangan_id')->get();  
            $namaRuanganList = [];

            foreach ($ruanganList as $ruangan) {
                // Ambil nama ruangan berdasarkan ruangan_id
                $namaRuangan = Ruangan::where('id', $ruangan->ruangan_id)->select('nama')->first();
                $namaRuanganList[] = $namaRuangan->nama;  
            }
        
            $matakuliah->ruangan_nama = $namaRuanganList;
        }
        // dd($namaRuanganList);
        $mklist = PenyusunanJadwal::all();

        // dd($mklist);

        return view('penyusunanjadwal', compact('user', 'matakuliahList', 'namaRuanganList','namaRuangan','mklist'));
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
        // Validate the request data
        $request->validate([
            'nama_mk' => 'required|exists:mata_kuliahs,nama',
            'kode_mk' => 'required|exists:mata_kuliahs,kode',
            'sks_mk' => 'required|exists:mata_kuliahs,sks',
            'semester_mk' => 'required|exists:mata_kuliahs,semester',
            'prodi' => 'required|exists:mata_kuliahs,prodi',
            'kelas' => 'required|string',
            'tahun_ajaran' => 'required|string',
            'dosen' => 'required|string',
            'ruang' => 'required|string',
            'hari' => 'required|string',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
        ]);

        // Create a new PenyusunanJadwal entry
        $penyusunanJadwal = new PenyusunanJadwal();
        $penyusunanJadwal->nama_mk = $request->nama_mk;
        $penyusunanJadwal->kode_mk = $request->kode_mk;
        $penyusunanJadwal->sks_mk = $request->sks_mk;
        $penyusunanJadwal->semester_mk = $request->semester_mk;
        $penyusunanJadwal->prodi = $request->prodi;
        $penyusunanJadwal->tahun_ajaran = $request->tahun_ajaran;
        $penyusunanJadwal->dosen = $request->dosen;
        $penyusunanJadwal->ruang = $request->ruang;
        $penyusunanJadwal->hari = $request->hari;
        $penyusunanJadwal->jam_mulai = $request->jam_mulai;
        $penyusunanJadwal->jam_selesai = $request->jam_selesai;
        $penyusunanJadwal->save();

        return response()->json([
            'success' => true,
            'message' => 'Jadwal berhasil ditambahkan',
            'data' => $penyusunanJadwal
        ]);
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
    public function destroy(PenyusunanJadwal $penyusunanJadwal)
    {
        //
    }
}
