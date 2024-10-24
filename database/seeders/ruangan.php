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
                'nama' => 'E101',
                'kapasitas' => '50',
                'gedung_id' => 5,
            ],
            [
                'kode' => 'R002',
                'nama' => 'A103',
                'kapasitas' => '30',
                'gedung_id' => 1,
            ],
            [
                'kode' => 'R003',
                'nama' => 'A104',
                'kapasitas' => '40',
                'gedung_id' => 1,
            ],
            [
                'kode' => 'R004',
                'nama' => 'E104',
                'kapasitas' => '40',
                'gedung_id' => 5,
            ],
            [
                'kode' => 'R005',
                'nama' => 'E105',
                'kapasitas' => '50',
                'gedung_id' => 5,
            ],
            [
                'kode' => 'R006',
                'nama' => 'E302',
                'kapasitas' => '20',
                'gedung_id' => 5,
            ],
            [
                'kode' => 'R007',
                'nama' => 'E307',
                'kapasitas' => '45',
                'gedung_id' => 5,
            ],
            [
                'kode' => 'R008',
                'nama' => 'K102',
                'kapasitas' => '55',
                'gedung_id' => 11,
            ],
            [
                'kode' => 'R009',
                'nama' => 'K104',
                'kapasitas' => '15',
                'gedung_id' => 11,
            ],
            [
                'kode' => 'R010',
                'nama' => 'B103',
                'kapasitas' => '30',
                'gedung_id' => 2,
            ],
        ];

        DB::table('ruangans')->insert($ruangans);

    }
}
