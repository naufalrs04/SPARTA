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
                'prodi' => 'Teknik Informatika',
            ],
            [
                'kode' => 'IF1235',
                'nama' => 'Pemrograman Web',
                'sks' => 3,
                'semester' => 3,
                'prodi' => 'Teknik Informatika',
            ],
            [
                'kode' => 'IF1236',
                'nama' => 'Pemrograman Mobile',
                'sks' => 3,
                'semester' => 3,
                'prodi' => 'Teknik Informatika',
            ],
            [
                'kode' => 'IF1237',
                'nama' => 'Pemrograman Desktop',
                'sks' => 3,
                'semester' => 3,
                'prodi' => 'Teknik Informatika',
            ],
            [
                'kode' => 'IF1238',
                'nama' => 'Pemrograman Jaringan',
                'sks' => 3,
                'semester' => 3,
                'prodi' => 'Teknik Informatika',
            ],
        ];

        DB::table('mata_kuliahs')->insert($mata_kuliahs);
    }
}
