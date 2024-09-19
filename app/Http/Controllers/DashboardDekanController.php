<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardDekanController extends Controller
{
    public function index()
    {
        $data = [
            'nama' => 'Rocky Gerung Dekan',
            'nim' => '0987654321',
        ];

        return view ('dashboardDekan', compact('data'));
    }
}
