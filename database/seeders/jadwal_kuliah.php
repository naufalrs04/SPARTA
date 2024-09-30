<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class jadwal_kuliah extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $jadwal_kuliah = [
            [
                'mata_kuliah_id' => 1,
                'ruangan_id' => 1,    
                'hari' => 'Senin',
                'jam_mulai' => '08:00:00',
                'jam_selesai' => '10:00:00',
            ],
            [
                'mata_kuliah_id' => 2,
                'ruangan_id' => 1,
                'hari' => 'Rabu',
                'jam_mulai' => '10:00:00',
                'jam_selesai' => '12:00:00',
            ],
        ];

        DB::table('jadwal_kuliah')->insert($jadwal_kuliah);

    }
}
