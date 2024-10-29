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

class PengisianIRS extends Controller
{

    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();
        $mahasiswa_id = Mahasiswa::where('id', Auth::id())->first();

        // Data dari tabel irs
        $list_mata_kuliah = irs::all();
        foreach ($list_mata_kuliah as $mata_kuliah) {
            $mata_kuliah->kode = Mata_Kuliah::where('id', $mata_kuliah->mata_kuliah_id)->first()->kode;
            $mata_kuliah->nama = Mata_Kuliah::where('id', $mata_kuliah->mata_kuliah_id)->first()->nama;
            $mata_kuliah->sks = Mata_Kuliah::where('id', $mata_kuliah->mata_kuliah_id)->first()->sks;

            // Waktu
            $mata_kuliah->hari = Mata_Kuliah::where('id', $mata_kuliah->mata_kuliah_id)->first()->hari;
            $mata_kuliah->jam_mulai = Mata_Kuliah::where('id', $mata_kuliah->mata_kuliah_id)->first()->jam_mulai;
            $mata_kuliah->jam_selesai = Mata_Kuliah::where('id', $mata_kuliah->mata_kuliah_id)->first()->jam_selesai;
            $mata_kuliah->jadwal = $mata_kuliah->hari . ', ' . $mata_kuliah->jam_mulai . ' - ' . $mata_kuliah->jam_selesai;

            // Ruangan
            $mata_kuliah->nama_ruangan = Ruangan::where('id', $mata_kuliah->ruangan_id)->first()->nama;
            $mata_kuliah->kapasitas_ruangan = Ruangan::where('id', $mata_kuliah->ruangan_id)->first()->kapasitas;
        }

        // Data dari tabel irs_rekap

        // $semester = Mahasiswa::where('id', $mahasiswa_id)->value('semester');

        // $irs_rekap = irs_rekap::where('mahasiswa_id', Auth::id())->get();

        $mahasiswaId = Auth::id();
        $semesterMahasiswa = Mahasiswa::where('id', $mahasiswaId)->value('semester');

        // Ambil semua data dari irs_rekap berdasarkan mahasiswa_id dan semester
        $irs_rekap = irs_rekap::where('mahasiswa_id', $mahasiswaId)
            ->where('semester', $semesterMahasiswa)
            ->get();

        $groupedByMahasiswa = $irs_rekap->groupBy('mahasiswa_id');

        // Mengelompokkan setiap mahasiswa berdasarkan semester
        $groupedData = [];
        foreach ($groupedByMahasiswa as $mahasiswaId => $rekaps) {
            $groupedData[$mahasiswaId] = $rekaps->groupBy('semester');
        }

        foreach ($irs_rekap as $rekap) {
            $rekap->kode = Mata_Kuliah::where('id', $rekap->mata_kuliah_id)->first()->kode;
            $rekap->nama = Mata_Kuliah::where('id', $rekap->mata_kuliah_id)->first()->nama;
            $rekap->sks = Mata_Kuliah::where('id', $rekap->mata_kuliah_id)->first()->sks;

            // Waktu
            $rekap->hari = Mata_Kuliah::where('id', $rekap->mata_kuliah_id)->first()->hari;
            $rekap->jam_mulai = Mata_Kuliah::where('id', $rekap->mata_kuliah_id)->first()->jam_mulai;
            $rekap->jam_selesai = Mata_Kuliah::where('id', $rekap->mata_kuliah_id)->first()->jam_selesai;
            $rekap->jadwal = $rekap->hari . ', ' . $rekap->jam_mulai . ' - ' . $rekap->jam_selesai;

            // Ruangan
            $rekap->nama_ruangan = Ruangan::where('id', $rekap->ruangan_id)->first()->nama;
            $rekap->kapasitas_ruangan = Ruangan::where('id', $rekap->ruangan_id)->first()->kapasitas;
        }

        $semester =  Mahasiswa::where('id', Auth::id())->get();
        foreach ($semester as $s) {
            $s->semester = Mahasiswa::where('id', $s->id)->first()->semester;
        }

        return view('pengisianirs', compact('user', 'list_mata_kuliah', 'irs_rekap', 'groupedData', 'semester', 'semesterMahasiswa'));
    }

    public function store(Request $request)
    {

        // $user = Auth::user();
        $validated = $request->validate([
            'mata_kuliah_id' => 'required|integer|exists:mata_kuliahs,id',
            'ruangan_id' => 'required|integer|exists:ruangans,id',
        ]);

        $mahasiswa_id = Auth::id();
        $mataKuliah = Mata_Kuliah::find($validated['mata_kuliah_id']);

        // Check for existing IRS entries for the current student
        $existingIrs = irs_rekap::where('mahasiswa_id', $mahasiswa_id)->get();
        $semester = Mahasiswa::where('id', $mahasiswa_id)->value('semester');
        // Check for duplicate course
        if ($existingIrs->contains('mata_kuliah_id', $validated['mata_kuliah_id'])) {
            return response()->json([
                'success' => false,
                'message' => 'Mata kuliah ini sudah diambil sebelumnya.'
            ], 422);
        }

        // Check for time conflict
        foreach ($existingIrs as $irs) {
            $existingMataKuliah = $irs->mataKuliah;
            if ($existingMataKuliah && $this->isTimeConflict($mataKuliah, $existingMataKuliah)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Jadwal mata kuliah ini bertabrakan dengan mata kuliah yang sudah diambil.'
                ], 422);
            }
        }

        // If no conflicts, proceed with saving or updating the IRS
        try {
            $irsRekap = irs_rekap::updateOrCreate(
                [
                    'mahasiswa_id' => $mahasiswa_id,
                    'mata_kuliah_id' => $validated['mata_kuliah_id'],
                    'ruangan_id' => $validated['ruangan_id'],
                    'semester' => $semester,
                ],
                [
                    'mahasiswa_id' => $mahasiswa_id,
                    'mata_kuliah_id' => $validated['mata_kuliah_id'],
                    'ruangan_id' => $validated['ruangan_id'],
                    'semester' => $semester,
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
        // Check if both mata kuliah have the necessary schedule information
        if (
            !isset($mataKuliah1->hari, $mataKuliah1->jam_mulai, $mataKuliah1->jam_selesai) ||
            !isset($mataKuliah2->hari, $mataKuliah2->jam_mulai, $mataKuliah2->jam_selesai)
        ) {
            Log::warning('Incomplete schedule information for mata kuliah comparison');
            return false; // or handle this case as appropriate for your application
        }

        return $mataKuliah1->hari == $mataKuliah2->hari &&
            $mataKuliah1->jam_mulai < $mataKuliah2->jam_selesai &&
            $mataKuliah2->jam_mulai < $mataKuliah1->jam_selesai;
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'id' => 'required|integer'  // Hapus validasi exists karena sudah tidak diperlukan
        ]);

        $mahasiswaId = Auth::id();  // Menggunakan Auth::id() untuk mendapatkan ID user yang sedang login

        Log::info('Attempting to delete IRS record:', [
            'mata_kuliah_id' => $request->id,
            'mahasiswa_id' => $mahasiswaId
        ]);

        $irsRekap = irs_rekap::where('mata_kuliah_id', $request->id)
            ->where('mahasiswa_id', $mahasiswaId)
            ->first();

        $irsRekap->delete();

        return response()->json([
            'success' => true,
            'message' => 'Mata kuliah berhasil dibatalkan'
        ]);
    }

    // public function storeToIrsLempar(Request $request)
    // {
    //     // Validasi input
    //     $validated = $request->validate([
    //         'mata_kuliah_id' => 'required|integer|exists:mata_kuliahs,id',
    //         'ruangan_id' => 'required|integer|exists:ruangans,id',
    //     ]);

    //     $mahasiswa_id = Auth::id();

    //     // Proses untuk menyimpan data
    //     try {
    //         irs_lempar::create([
    //             'mahasiswa_id' => $mahasiswa_id,
    //             'mata_kuliah_id' => $validated['mata_kuliah_id'],
    //             'ruangan_id' => $validated['ruangan_id'],
    //             'status_mata_kuliah' => 'Baru',
    //             'status_persetujuan' => null,
    //         ]);

    //         return response()->json([
    //             'success' => true,
    //             'message' => 'Data berhasil diajukan ke IRS Lempar.'
    //         ]);
    //     } catch (\Exception $e) {
    //         Log::error('Error in storing IRS Lempar: ' . $e->getMessage());
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Terjadi kesalahan saat menyimpan data.'
    //         ], 500);
    //     }
    // }


}
