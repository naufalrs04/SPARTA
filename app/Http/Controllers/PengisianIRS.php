<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\irs;
use App\Models\irs_lempar;
use App\Models\Mata_Kuliah;
use App\Models\Ruangan;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Models\irs_rekap;
use App\Models\JadwalPengisianIRS;
use App\Models\PenyusunanJadwal;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PengisianIRS extends Controller
{
    public function index(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        $theme = $request->cookie('theme') ?? 'light';

        $mahasiswa = Mahasiswa::where('nim', $user->nim_nip)->first();
        //$mahasiswa = Mahasiswa::with('dosenWali.user')->where('nim', $user->nim_nip)->first();
        // if ($mahasiswa) {
        //     $dosenWaliNama = $mahasiswa->dosenWali ? $mahasiswa->dosenWali->user->nama : 'Tidak ada dosen wali';
        // }
        if ($mahasiswa) {
            // Mengecek apakah mahasiswa memiliki dosen wali
            $dosenWali = Dosen::with('user')->find($mahasiswa->id_wali);
        
            if ($dosenWali && $dosenWali->user) {
                $dosenWaliNama = $dosenWali->user->nama;
                $dosenWaliNip = $dosenWali->user->nim_nip; 
            } else {
                $dosenWaliNama = 'Tidak ada dosen wali';
                $dosenWaliNip = 'Tidak ada NIP';
            }
        }
        //$dosenWali = Dosen::with('user')->find($mahasiswa->id_wali);
        //$dosenWaliNama = $dosenWali->user->nama;
        $mahasiswa_id = $mahasiswa->id;
        $ips=$mahasiswa->IPS_Sebelumnya;
        $maxSKS = $ips > 3 ? 24 : 20;
        $semesterMahasiswa = $mahasiswa->semester;
        // Ambil semua data dari irs_rekap berdasarkan mahasiswa_id dan semester
        $irs_rekap = irs_rekap::where('mahasiswa_id', $mahasiswa_id)
            ->where('semester', $semesterMahasiswa)
            ->get();

        foreach ($irs_rekap as $rekap) {
            // Waktu
            $rekap->hari = PenyusunanJadwal::where('kode_mk', $rekap->kode_mk)->first()->hari;
            $rekap->jam_mulai = PenyusunanJadwal::where('kode_mk', $rekap->kode_mk)->first()->jam_mulai;
            $rekap->jam_selesai = PenyusunanJadwal::where('kode_mk', $rekap->kode_mk)->first()->jam_selesai;
            $rekap->jadwal = $rekap->hari . ', ' . $rekap->jam_mulai . ' - ' . $rekap->jam_selesai;

            $rekap->nama_dosen = PenyusunanJadwal::where('kode_mk', $rekap->kode_mk)->pluck('dosen')->implode(', ');
        }
        // Group records by `status_pengajuan`, including `null` as a separate group
        $groupedByStatus = $irs_rekap->groupBy(function ($item) {
            return $item->status_pengajuan ?? null;
        });
        // dd($groupedByStatus);

        $status = $groupedByStatus->keys()->firstWhere(fn($value) => $value !== 'disetujui') ?? $groupedByStatus->keys()->first();
        
        // dd($status);
        // $status = irs_rekap::where ('mahasiswa_id', $mahasiswa_id)

        // dd($rekap); 

        $groupedByMahasiswa = $irs_rekap->groupBy('mahasiswa_id');

        $groupedData = [];
        foreach ($groupedByMahasiswa as $mahasiswaId => $rekaps) {
            $groupedData[$mahasiswaId] = $rekaps->groupBy('semester');
        }

        // dd($groupedData);


        $list_mata_kuliah = PenyusunanJadwal::where('status_pengajuan', 'ter-Verifikasi')
                        ->get()
                        ->each(function ($mata_kuliah) {
                            // Hitung jumlah mahasiswa yang telah mengambil mata kuliah berdasarkan jadwal_id
                            $mata_kuliah->jumlah_pendaftar = irs_rekap::where('jadwal_id', $mata_kuliah->id)->count();
                        });
        
        // dd($list_mata_kuliah);

        $tanggalSekarang = Carbon::now();
    
        // Cari fase 'Pengisian IRS' di tabel jadwal_pengisian_irs yang aktif
        $fasePengisianIRS = JadwalPengisianIRS::where('keterangan', 'Pengisian IRS')
            ->where('jadwalmulai', '<=', $tanggalSekarang)
            ->where('jadwalberakhir', '>=', $tanggalSekarang)
            ->first();

        $fasePembatalanIRS = JadwalPengisianIRS::where('keterangan', 'Pembatalan IRS')
            ->where('jadwalmulai', '<=', $tanggalSekarang)
            ->where('jadwalberakhir', '>=', $tanggalSekarang)
            ->first();

        $fasePerubahanIRS = JadwalPengisianIRS::where('keterangan', 'Perubahan IRS')
            ->where('jadwalmulai', '<=', $tanggalSekarang)
            ->where('jadwalberakhir', '>=', $tanggalSekarang)
            ->first(); 
        
        return view('pengisianirs', compact('user', 'list_mata_kuliah', 'irs_rekap', 'groupedData',  'semesterMahasiswa', 'mahasiswa_id', 'theme', 'fasePengisianIRS', 'fasePembatalanIRS', 'fasePerubahanIRS','status','maxSKS','ips', 'mahasiswa', 'dosenWali', 'dosenWaliNama', 'dosenWaliNip'));
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'kode_mk' => 'required|string',
        'nama_mk' => 'required|string',
        'ruang' => 'required|string',
        'kelas' => 'required|string',
        'sks_mk' => 'required|integer|min:1',
        'id' => 'required|integer|exists:penyusunan_jadwals,id',
        'kapasitas' => 'required|integer',
    ]);

    $user = Auth::user();
    $mahasiswa = Mahasiswa::where('nim', $user->nim_nip)->first();
    $mahasiswa_id = $mahasiswa->id;
    $semester = $mahasiswa->semester;
    $ips = $mahasiswa->IPS_Sebelumnya;

    // Define SKS limits based on IPS
    $maxSKS = 20;
    if ($ips >= 3) {
        $maxSKS = 24;
    } elseif ($ips > 0 && $ips < 3) {
        $maxSKS = 20;
    }

    // Calculate the current total SKS for the student in the current semester
    $currentSKS = irs_rekap::where('mahasiswa_id', $mahasiswa_id)
                    ->where('semester', $semester)
                    ->sum('sks');

    // Check if adding the new course exceeds the maximum SKS limit
    if (($currentSKS + $validated['sks_mk']) > $maxSKS) {
        return response()->json([
            'success' => false,
            'message' => "Anda hanya dapat mengambil maksimal $maxSKS SKS berdasarkan IPS Anda."
        ], 422);
    }

    // Check if course capacity is full
    $jumlah_pendaftar = Irs_rekap::where('kode_mk', $validated['kode_mk'])
                                 ->where('kelas', $validated['kelas'])
                                 ->count();

    if ($jumlah_pendaftar >= $validated['kapasitas']) {
        return response()->json([
            'success' => false,
            'message' => 'Kapasitas mata kuliah ini sudah penuh.'
        ], 422);
    }

    $existingIrs = irs_rekap::where('mahasiswa_id', $mahasiswa_id)
        ->where('semester', $semester)
        ->get();

    // Check if course has already been taken
    if ($existingIrs->contains('kode_mk', $validated['kode_mk'])) {
        return response()->json([
            'success' => false,
            'message' => 'Mata kuliah ini sudah diambil sebelumnya.'
        ], 422);
    }

    // Check for schedule conflicts
    $mataKuliah = PenyusunanJadwal::find($validated['kode_mk']);
    foreach ($existingIrs as $irs) {
        $existingMataKuliah = $irs->mataKuliah;
        if ($existingMataKuliah && $this->isTimeConflict($mataKuliah, $existingMataKuliah)) {
            return response()->json([
                'success' => false,
                'message' => 'Jadwal mata kuliah ini bertabrakan dengan mata kuliah yang sudah diambil.'
            ], 422);
        }
    }

    // Store IRS data if no conflicts
    try {
        $irsRekap = irs_rekap::updateOrCreate(
            [
                'mahasiswa_id' => $mahasiswa_id,
                'semester' => $semester,
                'jadwal_id' => $validated['id'],
                'kode_mk' => $validated['kode_mk'],
                'nama_mk' => $validated['nama_mk'],
                'kelas' => $validated['kelas'],
                'ruang' => $validated['ruang'],
                'sks' => $validated['sks_mk'],
            ],
            [
                'mahasiswa_id' => $mahasiswa_id,
                'semester' => $semester,
                'jadwal_id' => $validated['id'],
                'kode_mk' => $validated['kode_mk'],
                'nama_mk' => $validated['nama_mk'],
                'kelas' => $validated['kelas'],
                'ruang' => $validated['ruang'],
                'sks' => $validated['sks_mk'],
            ]
        );

        return response()->json([
            'success' => true,
            'message' => 'Mata kuliah berhasil diambil',
            'data' => $irsRekap
        ]);
    } catch (\Exception $e) {
        Log::error('Error in storing IRS: ' . $e->getMessage());
        return response()->json([
            'success' => false,
            'message' => 'Terjadi kesalahan saat menyimpan data.'
        ], 500);
    }
}


    private function isTimeConflict($mataKuliah1, $mataKuliah2)
{
    // Pastikan kedua mata kuliah memiliki informasi jadwal yang diperlukan
    if (
        !isset($mataKuliah1->hari, $mataKuliah1->jam_mulai, $mataKuliah1->jam_selesai) ||
        !isset($mataKuliah2->hari, $mataKuliah2->jam_mulai, $mataKuliah2->jam_selesai)
    ) {
        Log::warning('Incomplete schedule information for mata kuliah comparison');
        return false; // atau tangani sesuai kebutuhan aplikasi
    }

    // Periksa apakah jadwal hari dan waktu bertabrakan
    return $mataKuliah1->hari === $mataKuliah2->hari &&
           $mataKuliah1->jam_mulai < $mataKuliah2->jam_selesai &&
           $mataKuliah2->jam_mulai < $mataKuliah1->jam_selesai;
}

    public function destroy(Request $request)
    {
        $request->validate([
            'id' => 'required|string',
            'mahasiswa_id' => 'required|integer',
            'semester' => 'required|integer',
        ]);

        $user = Auth::user();
        $mahasiswa = Mahasiswa::where('nim', $user->nim_nip)->first();
        $mahasiswaId = $mahasiswa->id;

        // Periksa apakah data yang ingin dihapus ada
        $irsRekapExists = DB::table('irs_rekap')
            ->where('mahasiswa_id', $mahasiswaId)
            ->where('kode_mk', $request->id)
            ->where('semester', $request->semester)
            ->exists();

        if ($irsRekapExists) {
            try {
                // Lakukan penghapusan
                DB::table('irs_rekap')
                    ->where('mahasiswa_id', $mahasiswaId)
                    ->where('kode_mk', $request->id)
                    ->where('semester', $request->semester)
                    ->delete();

                return response()->json([
                    'success' => true,
                    'message' => 'Mata kuliah berhasil dibatalkan'
                ]);
            } catch (\Exception $e) {
                Log::error('Error deleting IRS: ' . $e->getMessage());
                return response()->json([
                    'success' => false,
                    'message' => 'Terjadi kesalahan saat menghapus data'
                ], 500);
            }
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data IRS tidak ditemukan atau Anda tidak memiliki akses untuk menghapusnya'
            ], 403);
        }
    }

    


}
