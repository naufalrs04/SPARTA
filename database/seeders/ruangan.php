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
                'nama' => 'A101',
                'gedung_id' => 1,
            ],
            [
                'nama' => 'A102',
                'gedung_id' => 1,
            ],
            [
                'nama' => 'A201',
                'gedung_id' => 1,
            ],
            [
                'nama' => 'A202',
                'gedung_id' => 1,
            ],
            [
                'nama' => 'B101',
                'gedung_id' => 2,
            ],
            [
                'nama' => 'B102',
                'gedung_id' => 2,
            ],
            [
                'nama' => 'B103',
                'gedung_id' => 2,
            ],
            [
                'nama' => 'C101',
                'gedung_id' => 3,
            ],
            [
                'nama' => 'C102',
                'gedung_id' => 3,
            ],
            [
                'nama' => 'C103',
                'gedung_id' => 3,
            ],
            [
                'nama' => 'D101',
                'gedung_id' => 4,
            ],
            [
                'nama' => 'D102',
                'gedung_id' => 4,
            ],
            [
                'nama' => 'D103',
                'gedung_id' => 4,
            ],
            [
                'nama' => 'E101',
                'gedung_id' => 5,
            ],
            [
                'nama' => 'E102',
                'gedung_id' => 5,
            ],
            [
                'nama' => 'E103',
                'gedung_id' => 5,
            ],
            [
                'nama' => 'F101',
                'gedung_id' => 6,
            ],
            [
                'nama' => 'F102',
                'gedung_id' => 6,
            ],
            [
                'nama' => 'F103',
                'gedung_id' => 6,
            ],
            [
                'nama' => 'G101',
                'gedung_id' => 7,
            ],
            [
                'nama' => 'G102',
                'gedung_id' => 7,
            ],
            [
                'nama' => 'G103',
                'gedung_id' => 7,
            ],
            [
                'nama' => 'H101',
                'gedung_id' => 8,
            ],
            [
                'nama' => 'H102',
                'gedung_id' => 8,
            ],
            [
                'nama' => 'H103',
                'gedung_id' => 8,
            ],
            [
                'nama' => 'I101',
                'gedung_id' => 9,
            ],
            [
                'nama' => 'I102',
                'gedung_id' => 9,
            ],
            [
                'nama' => 'I103',
                'gedung_id' => 9,
            ],
            [
                'nama' => 'J101',
                'gedung_id' => 10,
            ],
            [
                'nama' => 'J102',
                'gedung_id' => 10,
            ],
            [
                'nama' => 'J103',
                'gedung_id' => 10,
            ],
            [
                'nama' => 'K101',
                'gedung_id' => 11,
            ],
            [
                'nama' => 'K102',
                'gedung_id' => 11,
            ],
            [
                'nama' => 'K103',
                'gedung_id' => 11,
            ],
        ];

        DB::table('ruangans')->insert($ruangans);

    }
}
