<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JadwalPengisianIRS;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreJadwalPengisianIRSRequest;
use App\Http\Requests\UpdateJadwalPengisianIRSRequest;

class JadwalPengisianIRSController extends Controller
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

        $theme = $request->cookie('theme') ?? 'light';

        $jadwalpengisian = JadwalPengisianIRS::all();
        
        return view('/jadwalpengisianIRS', compact('user', 'jadwalpengisian', 'theme'));
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
    public function store(StoreJadwalPengisianIRSRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(JadwalPengisianIRS $jadwalPengisianIRS)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'keterangan' => 'required|string',
            'jadwalmulai' => 'nullable|date',
            'jadwalberakhir' => 'nullable|date',
        ]);
    
        $jadwal = JadwalPengisianIRS::find($id);
        if (!$jadwal) {
            return response()->json(['error' => 'Jadwal not found.'], 404);
        }
    
        try {
            Log::debug('Updating jadwal with ID: ' . $id);  // Debugging log
            Log::debug('Data received: ', $request->all()); // Log the received data
    
            $jadwal->update([
                'keterangan' => $request->keterangan,
                'jadwalmulai' => $request->jadwalmulai,
                'jadwalberakhir' => $request->jadwalberakhir,
            ]);
    
            return response()->json(['success' => 'Jadwal updated successfully.']);
        } catch (\Exception $e) {
            Log::error('Failed to update jadwal: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to update jadwal. Please try again.'], 500);
        }
    
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JadwalPengisianIRS $jadwalPengisianIRS)
    {
        //
    }
}
