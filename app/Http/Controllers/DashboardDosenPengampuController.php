<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardDosenPengampuController extends Controller
{
    public function index()
    {
        $data = [
            'nama' => 'Rocky Gerung Dosen',
            'nim' => '1234567890',
        ];

        return view ('dashboardDosenPengampu', compact('data'));
    }
}
