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
use App\Models\irs_rekap;
use App\Models\PenyusunanJadwal;
use Illuminate\Support\Facades\DB;

class PengisianIRS extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        $mahasiswa = Mahasiswa::where('nim', $user->nim_nip)->first();
        $mahasiswa_id = $mahasiswa->id;
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

        // dd($rekap); 

        $groupedByMahasiswa = $irs_rekap->groupBy('mahasiswa_id');

        $groupedData = [];
        foreach ($groupedByMahasiswa as $mahasiswaId => $rekaps) {
            $groupedData[$mahasiswaId] = $rekaps->groupBy('semester');
        }

        // dd($groupedData);


        $list_mata_kuliah = PenyusunanJadwal::where('status_pengajuan', 'ter-Verifikasi')->get();
        // dd($list_mata_kuliah);

        return view('pengisianirs', compact('user', 'list_mata_kuliah', 'irs_rekap', 'groupedData',  'semesterMahasiswa', 'mahasiswa_id'));
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

        $mataKuliah = PenyusunanJadwal::find($validated['kode_mk']);
        $user = Auth::user();
        $mahasiswa = Mahasiswa::where('nim', $user->nim_nip)->first();

        $mahasiswa_id = $mahasiswa->id;
        $semester = $mahasiswa->semester;
        $existingIrs = irs_rekap::where('mahasiswa_id', $mahasiswa_id)
            ->where('semester', $semester)
            ->get();

        // Cek jika mata kuliah sudah diambil sebelumnya
        if ($existingIrs->contains('kode_mk', $validated['kode_mk'])) {
            return response()->json([
                'success' => false,
                'message' => 'Mata kuliah ini sudah diambil sebelumnya.'
            ], 422);
        }

        // Cek jika ada konflik jadwal
        foreach ($existingIrs as $irs) {
            $existingMataKuliah = $irs->mataKuliah;
            if ($existingMataKuliah && $this->isTimeConflict($mataKuliah, $existingMataKuliah)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Jadwal mata kuliah ini bertabrakan dengan mata kuliah yang sudah diambil.'
                ], 422);
            }
        }

        // Jika tidak ada konflik, simpan data IRS
        try {
            $irsRekap = irs_rekap::updateOrCreate(
                [
                    'mahasiswa_id' => $mahasiswa_id,
                    'semester' => $semester,
                    'jadwal_id'=>$validated['id'],
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
