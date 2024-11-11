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
use Illuminate\Support\Facades\Log;

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

        // Ambil tema dari cookie atau gunakan 'light' sebagai default
        $theme = $request->cookie('theme') ?? 'light';

        $matakuliahList = Mata_Kuliah::select('kode as kodemk', 'nama as namemk', 'sks as sksmk', 'semester as smtmk', 'prodi as prodimk')->get();
        // dd($matakuliahList);
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
        // dd($matakuliah);
        // dd($ruanganDetailList);
        $mklist = PenyusunanJadwal::all();
        // dd($mklist);
        $dosen = Dosen::all();

        foreach ($dosen as $daftar_dosen) {
            $daftar_dosen->nama = User::where('nim_nip', $daftar_dosen->nip)->first()->nama;
        }
        // dd($daftar_dosen);
        // dd($mklist);
        return view('penyusunanjadwal', compact('user', 'matakuliahList','mklist','ruanganDetailList','dosen', 'theme'));
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
    Log::info($request->all()); // Log semua input yang diterima

    // Validasi data
    $validatedData = $request->validate([
        'nama_mk' => 'required|string',
        'kode_mk' => 'required|string',
        'sks_mk' => 'required|integer',
        'semester_mk' => 'required|integer',
        'prodi' => 'required|string',
        'kelas' => 'required|string',
        'tahun_ajaran' => 'required|string',
        'dosen' => 'required|array', // Pastikan ini adalah array jika bisa memilih lebih dari satu dosen
        'ruang' => 'required|string',
        'kapasitas' => 'required|integer',
        'hari' => 'required|string',
        'jam_mulai' => 'required|date_format:H:i',
        'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
    ]);

    try {
        $penyusunanJadwal = new PenyusunanJadwal();
        $penyusunanJadwal->fill($validatedData);
        $penyusunanJadwal->dosen = implode(',', $validatedData['dosen']); // Menyimpan dosen sebagai string
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
    public function destroy(PenyusunanJadwal $penyusunanJadwal)
    {
        //
    }
}
