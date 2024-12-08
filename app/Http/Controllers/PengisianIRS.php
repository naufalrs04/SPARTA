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

        if ($mahasiswa) {
            $dosenWali = Dosen::with('user')->find($mahasiswa->id_wali);
        
            if ($dosenWali && $dosenWali->user) {
                $dosenWaliNama = $dosenWali->user->nama;
                $dosenWaliNip = $dosenWali->user->nim_nip; 
            } else {
                $dosenWaliNama = 'Tidak ada dosen wali';
                $dosenWaliNip = 'Tidak ada NIP';
            }
        }

        $mahasiswa_id = $mahasiswa->id;
        $ips=$mahasiswa->IPS_Sebelumnya;
        $maxSKS = $ips > 3 ? 24 : 20;
        $semesterMahasiswa = $mahasiswa->semester;

        $irs_rekap = irs_rekap::where('mahasiswa_id', $mahasiswa_id)
            ->where('semester', $semesterMahasiswa)
            ->get();

        foreach ($irs_rekap as $rekap) {
            $rekap->hari = PenyusunanJadwal::where('kode_mk', $rekap->kode_mk)->first()->hari;
            $rekap->jam_mulai = PenyusunanJadwal::where('kode_mk', $rekap->kode_mk)->first()->jam_mulai;
            $rekap->jam_selesai = PenyusunanJadwal::where('kode_mk', $rekap->kode_mk)->first()->jam_selesai;
            $rekap->jadwal = $rekap->hari . ', ' . $rekap->jam_mulai . ' - ' . $rekap->jam_selesai;

            $rekap->nama_dosen = PenyusunanJadwal::where('kode_mk', $rekap->kode_mk)->pluck('dosen')->implode(', ');
        }
        $status_pengajuan = $irs_rekap->first() ? $irs_rekap->first()->status_pengajuan : null;

        $groupedByStatus = $irs_rekap->groupBy(function ($item) {
            return $item->status_pengajuan ?? null;
        });

        $status = $groupedByStatus->keys()->firstWhere(fn($value) => $value !== 'disetujui') ?? $groupedByStatus->keys()->first();

        $groupedByMahasiswa = $irs_rekap->groupBy('mahasiswa_id');

        $groupedData = [];
        foreach ($groupedByMahasiswa as $mahasiswaId => $rekaps) {
            $groupedData[$mahasiswaId] = $rekaps->groupBy('semester');
        }

        $prodi = $mahasiswa->prodi;

        $list_mata_kuliah = PenyusunanJadwal::where('status_pengajuan', 'ter-Verifikasi')
                        ->where('prodi', $prodi) 
                        ->get()
                        ->each(function ($mata_kuliah) {
                            $mata_kuliah->jumlah_pendaftar = irs_rekap::where('jadwal_id', $mata_kuliah->id)->count();
                        });
    

        $tanggalSekarang = Carbon::now();
    
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
        
        return view('pengisianirs', compact('user', 'list_mata_kuliah', 'irs_rekap','status_pengajuan', 'groupedData',  'semesterMahasiswa', 'mahasiswa_id', 'theme', 'fasePengisianIRS', 'fasePembatalanIRS', 'fasePerubahanIRS','status','maxSKS','ips', 'mahasiswa', 'dosenWali', 'dosenWaliNama', 'dosenWaliNip'));
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

    $maxSKS = 20;
    if ($ips >= 3) {
        $maxSKS = 24;
    } elseif ($ips > 0 && $ips < 3) {
        $maxSKS = 20;
    }

    $mataKuliahJadwal = PenyusunanJadwal::findOrFail($validated['id']);
    $semesterMataKuliah = $mataKuliahJadwal->semester_mk;
    $kapasitas = $validated['kapasitas'];

    $currentSKS = irs_rekap::where('mahasiswa_id', $mahasiswa_id)
                    ->where('semester', $semester)
                    ->sum('sks');

    if (($currentSKS + $validated['sks_mk']) > $maxSKS) {
        return response()->json([
            'success' => false,
            'message' => "Anda hanya dapat mengambil maksimal $maxSKS SKS berdasarkan IPS Anda."
        ], 422);
    }

    $jumlah_pendaftar = Irs_rekap::where('kode_mk', $validated['kode_mk'])
                                 ->where('kelas', $validated['kelas'])
                                 ->count();

    $prioritas = 1;
    if ($semester == $semesterMataKuliah) {
        $prioritas = 1; 
    } 
    elseif ($semester > $semesterMataKuliah) {
        $prioritas = 2; 
    }
    else {
        $prioritas = 3; 
    }
    

    if ($jumlah_pendaftar >= $kapasitas) {
        $peserta = irs_rekap::where('kode_mk', $validated['kode_mk'])
            ->where('kelas', $validated['kelas'])
            ->orderBy('prioritas', 'desc')
            ->orderBy('created_at', 'desc')
            ->first();
    
        if ($peserta) {
            if ($prioritas < $peserta->prioritas) {
                session();
                irs_rekap::where('mahasiswa_id', $peserta->mahasiswa_id)
                    ->where('kode_mk', $peserta->kode_mk)
                    ->where('kelas', $peserta->kelas)
                    ->delete();
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Kapasitas mata kuliah ini sudah penuh.'
                ], 422);
            }
        }
    }

    $existingIrs = irs_rekap::where('mahasiswa_id', $mahasiswa_id)
        ->where('semester', $semester)
        ->get();

    if ($existingIrs->contains('kode_mk', $validated['kode_mk'])) {
        return response()->json([
            'success' => false,
            'message' => 'Mata kuliah ini sudah diambil sebelumnya.'
        ], 422);
    }

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
                'prioritas' => $prioritas,
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
                'prioritas' => $prioritas,
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

    if (
        !isset($mataKuliah1->hari, $mataKuliah1->jam_mulai, $mataKuliah1->jam_selesai) ||
        !isset($mataKuliah2->hari, $mataKuliah2->jam_mulai, $mataKuliah2->jam_selesai)
    ) {
        Log::warning('Incomplete schedule information for mata kuliah comparison');
        return false; 
    }

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

        $irsRekapExists = DB::table('irs_rekap')
            ->where('mahasiswa_id', $mahasiswaId)
            ->where('kode_mk', $request->id)
            ->where('semester', $request->semester)
            ->exists();

        if ($irsRekapExists) {
            try {
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