<?php

namespace App\Http\Controllers;

use App\Models\Mata_Kuliah;
use Illuminate\Http\Request;
use App\Models\PenyusunanJadwal;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePenyusunanJadwalRequest;
use App\Http\Requests\UpdatePenyusunanJadwalRequest;

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

        $mklist = PenyusunanJadwal::all();

        return view('penyusunanjadwal', compact('user', 'matakuliahList', 'mklist'));
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
            'smt_mk' => 'required|exists:mata_kuliahs,semester',
            'prodi_mk' => 'required|exists:mata_kuliahs,prodi',
            'tahunajaran' => 'required|string',
            'dosen' => 'required|string',
            'kelas' => 'required|string',
            'hari' => 'required|string',
            'jammulai' => 'required',
            'jamakhir' => 'required',
        ]);

        // Create a new PenyusunanJadwal entry
        $penyusunanJadwal = new PenyusunanJadwal();
        $penyusunanJadwal->nama_mk = $request->nama_mk;
        $penyusunanJadwal->kode_mk = $request->kode_mk;
        $penyusunanJadwal->sks_mk = $request->sks_mk;
        $penyusunanJadwal->smt_mk = $request->smt_mk;
        $penyusunanJadwal->prodi_mk = $request->prodi_mk;
        $penyusunanJadwal->tahunajaran = $request->tahunajaran;
        $penyusunanJadwal->dosen = $request->dosen;
        $penyusunanJadwal->kelas = $request->kelas;
        $penyusunanJadwal->hari = $request->hari;
        $penyusunanJadwal->jammulai = $request->jammulai;
        $penyusunanJadwal->jamakhir = $request->jamakhir;
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
