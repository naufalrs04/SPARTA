<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ruangan extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $ruangans = [
            [
                'kode' => 'R001',
                'nama' => 'Ruang 1',
                'kapasitas' => '50',
            ],
            [
                'kode' => 'R002',
                'nama' => 'Ruang 2',
                'kapasitas' => '50',
            ],
            [
                'kode' => 'R003',
                'nama' => 'Ruang 3',
                'kapasitas' => '50',
            ],
            [
                'kode' => 'R004',
                'nama' => 'Ruang 4',
                'kapasitas' => '50',
            ],
            [
                'kode' => 'R005',
                'nama' => 'Ruang 5',
                'kapasitas' => '50',
            ],
        ];

        DB::table('ruangans')->insert($ruangans);

    }
}
