<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class mata_kuliah extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $mata_kuliahs = [
            [
                'kode' => 'IF1234',
                'nama' => 'Pemrograman Berbasis Objek',
                'sks' => 3,
                'semester' => 3,
                'prodi' => 'Informatika',
                'hari' => 'Senin',
                'jam_mulai' => '08:00:00',
                'jam_selesai' => '10:00:00',
            ],
            [
                'kode' => 'IF1235',
                'nama' => 'Pemrograman Web',
                'sks' => 3,
                'semester' => 3,
                'prodi' => 'Informatika',
                'hari' => 'Selasa',
                'jam_mulai' => '07:30:00',
                'jam_selesai' => '09:30:00',
            ],
            [
                'kode' => 'IF1236',
                'nama' => 'Pemrograman Mobile',
                'sks' => 3,
                'semester' => 3,
                'prodi' => 'Informatika',
                'hari' => 'Rabu',
                'jam_mulai' => '10:30:00',
                'jam_selesai' => '12:30:00',
            ],
            [
                'kode' => 'IF1237',
                'nama' => 'Pemrograman Desktop',
                'sks' => 3,
                'semester' => 3,
                'prodi' => 'Informatika',
                'hari' => 'Rabu',
                'jam_mulai' => '15:30:00',
                'jam_selesai' => '17:30:00',
            ],
            [
                'kode' => 'IF1238',
                'nama' => 'Pemrograman Jaringan',
                'sks' => 3,
                'semester' => 3,
                'prodi' => 'Informatika',
                'hari' => 'Kamis',
                'jam_mulai' => '15:30:00',
                'jam_selesai' => '17:30:00',
            ],
            [
                'kode' => 'IF1239',
                'nama' => 'Pemrograman Game',
                'sks' => 3,
                'semester' => 3,
                'prodi' => 'Informatika',
                'hari' => 'Jumat',
                'jam_mulai' => '07:30:00',
                'jam_selesai' => '09:30:00',
            ]
        ];

        DB::table('mata_kuliahs')->insert($mata_kuliahs);
    }
}
