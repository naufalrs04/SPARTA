<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Prodi; // Pastikan untuk mengimpor model Prodi

class PembagianKelas extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();
        
        // Ambil semua data prodi untuk ditampilkan
        $prodis = Prodi::all();
        
        return view('pembagiankelas', compact('user', 'prodis'));
    }

    public function updateStatus(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'status' => 'required|in:set,not set',
        ]);

        // Temukan prodi berdasarkan ID dan perbarui status
        $prodi = Prodi::findOrFail($id);
        $prodi->status = $request->status;
        $prodi->save();

        return redirect()->back()->with('success', 'Status berhasil diperbarui.');
    }

    public function showInfo($id)
    {
        // Temukan prodi berdasarkan ID
        $prodi = Prodi::findOrFail($id);
        
        return view('prodiInfo', compact('prodi')); // Ganti 'prodiInfo' dengan nama view yang sesuai
    }
}

