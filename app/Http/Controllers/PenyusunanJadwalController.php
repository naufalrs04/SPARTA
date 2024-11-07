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
use App\Models\Dosen;
use App\Models\User;
use Database\Seeders\PenyusunanJadwalSeeder;

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
        
            // Tambahkan daftar ruangan dengan detail kapasitas ke objek mata kuliah
            $matakuliah->ruangan_detail = $ruanganDetailList;
        }
        // dd($ruanganDetailList);

        $mklist = PenyusunanJadwal::all();

        $dosen = Dosen::all();

        foreach ($dosen as $daftar_dosen) {
            $daftar_dosen->nama = User::where('nim_nip', $daftar_dosen->nip)->first()->nama;
        }
        
        // dd($daftar_dosen);

        // dd($mklist);

        return view('penyusunanjadwal', compact('user', 'matakuliahList','mklist','ruanganDetailList','dosen'));
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
        'dosen' => 'required|array', 
        'ruang' => 'required|string',
        'hari' => 'required|string',
        'jam_mulai' => 'required|date_format:H:i', 
        'jam_selesai' => 'required|date_format:H:i|after:jam_mulai', 
    ]);

    
    $penyusunanJadwal = new PenyusunanJadwal();
    $penyusunanJadwal->nama_mk = $request->nama_mk;
    $penyusunanJadwal->kode_mk = $request->kode_mk;
    $penyusunanJadwal->sks_mk = $request->sks_mk;
    $penyusunanJadwal->semester_mk = $request->semester_mk;
    $penyusunanJadwal->prodi = $request->prodi;
    $penyusunanJadwal->tahun_ajaran = $request->tahun_ajaran;
    $penyusunanJadwal->ruang = $request->ruang;
    $penyusunanJadwal->hari = $request->hari;
    $penyusunanJadwal->jam_mulai = $request->jam_mulai;
    $penyusunanJadwal->jam_selesai = $request->jam_selesai;

   
    $penyusunanJadwal->save();

 
    $penyusunanJadwal->dosen()->sync($request->dosen); 

    // Return a JSON response
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
