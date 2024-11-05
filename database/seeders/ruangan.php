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
                'nama' => 'A101',
                'kapasitas' => '50',
                'gedung_id' => 1,
            ],
            [
                'kode' => 'R002',
                'nama' => 'A102',
                'kapasitas' => '30',
                'gedung_id' => 1,
            ],
            [
                'kode' => 'R003',
                'nama' => 'A201',
                'kapasitas' => '40',
                'gedung_id' => 1,
            ],
            [
                'kode' => 'R004',
                'nama' => 'A202',
                'kapasitas' => '40',
                'gedung_id' => 1,
            ],
            [
                'kode' => 'R005',
                'nama' => 'B101',
                'kapasitas' => '50',
                'gedung_id' => 2,
            ],
            [
                'kode' => 'R006',
                'nama' => 'B102',
                'kapasitas' => '20',
                'gedung_id' => 2,
            ],
            [
                'kode' => 'R007',
                'nama' => 'B103',
                'kapasitas' => '45',
                'gedung_id' => 2,
            ],
            [
                'kode' => 'R008',
                'nama' => 'C101',
                'kapasitas' => '55',
                'gedung_id' => 3,
            ],
            [
                'kode' => 'R009',
                'nama' => 'C102',
                'kapasitas' => '15',
                'gedung_id' => 3,
            ],
            [
                'kode' => 'R010',
                'nama' => 'C103',
                'kapasitas' => '30',
                'gedung_id' => 3,
            ],
            [
                'kode' => 'R011',
                'nama' => 'D101',
                'kapasitas' => '50',
                'gedung_id' => 4,
            ],
            [
                'kode' => 'R012',
                'nama' => 'D102',
                'kapasitas' => '40',
                'gedung_id' => 4,
            ],
            [
                'kode' => 'R013',
                'nama' => 'D103',
                'kapasitas' => '30',
                'gedung_id' => 4,
            ],
            [
                'kode' => 'R014',
                'nama' => 'E101',
                'kapasitas' => '50',
                'gedung_id' => 5,
            ],
            [
                'kode' => 'R015',
                'nama' => 'E102',
                'kapasitas' => '45',
                'gedung_id' => 5,
            ],
            [
                'kode' => 'R016',
                'nama' => 'E103',
                'kapasitas' => '45',
                'gedung_id' => 5,
            ],
            [
                'kode' => 'R017',
                'nama' => 'F101',
                'kapasitas' => '50',
                'gedung_id' => 6,
            ],
            [
                'kode' => 'R018',
                'nama' => 'F102',
                'kapasitas' => '40',
                'gedung_id' => 6,
            ],
            [
                'kode' => 'R019',
                'nama' => 'F103',
                'kapasitas' => '45',
                'gedung_id' => 6,
            ],
            [
                'kode' => 'R020',
                'nama' => 'G101',
                'kapasitas' => '50',
                'gedung_id' => 7,
            ],
            [
                'kode' => 'R021',
                'nama' => 'G102',
                'kapasitas' => '40',
                'gedung_id' => 7,
            ],
            [
                'kode' => 'R022',
                'nama' => 'G103',
                'kapasitas' => '45',
                'gedung_id' => 7,
            ],
            [
                'kode' => 'R023',
                'nama' => 'H101',
                'kapasitas' => '50',
                'gedung_id' => 8,
            ],
            [
                'kode' => 'R024',
                'nama' => 'H102',
                'kapasitas' => '45',
                'gedung_id' => 8,
            ],
            [
                'kode' => 'R025',
                'nama' => 'H103',
                'kapasitas' => '40',
                'gedung_id' => 8,
            ],
            [
                'kode' => 'R026',
                'nama' => 'I101',
                'kapasitas' => '50',
                'gedung_id' => 9,
            ],
            [
                'kode' => 'R027',
                'nama' => 'I102',
                'kapasitas' => '45',
                'gedung_id' => 9,
            ],
            [
                'kode' => 'R028',
                'nama' => 'I103',
                'kapasitas' => '40',
                'gedung_id' => 9,
            ],
            [
                'kode' => 'R029',
                'nama' => 'J101',
                'kapasitas' => '50',
                'gedung_id' => 10,
            ],
            [
                'kode' => 'R030',
                'nama' => 'J102',
                'kapasitas' => '45',
                'gedung_id' => 10,
            ],
            [
                'kode' => 'R031',
                'nama' => 'J103',
                'kapasitas' => '40',
                'gedung_id' => 10,
            ],
            [
                'kode' => 'R032',
                'nama' => 'K101',
                'kapasitas' => '50',
                'gedung_id' => 11,
            ],
            [
                'kode' => 'R033',
                'nama' => 'K102',
                'kapasitas' => '50',
                'gedung_id' => 11,
            ],
            [
                'kode' => 'R034',
                'nama' => 'K103',
                'kapasitas' => '50',
                'gedung_id' => 11,
            ],
        ];

        DB::table('ruangans')->insert($ruangans);

    }
}
