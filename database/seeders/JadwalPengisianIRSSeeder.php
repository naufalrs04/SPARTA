<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JadwalPengisianIRSSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jadwalirs = [
            [
                'keterangan' => 'Pengisian IRS',
                'jadwalmulai' => null,
                'jadwalberakhir' => null
            ],
            [
                'keterangan' => 'Pembatalan IRS',
                'jadwalmulai' => null,
                'jadwalberakhir' => null
            ],
            [
                'keterangan' => 'Perubahan IRS',
                'jadwalmulai' => null,
                'jadwalberakhir' => null
            ],
        ];

        DB::table('jadwal_pengisian_i_r_s')->insert($jadwalirs);
    }
}
