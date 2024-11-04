<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class dosen extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data_dosen = [
            [
                'nip' => '2406011229078013',
                'status' => 1,
                'prodi' => "Informatika",
            ],

        ];

        DB::table('dosens')->insert($data_dosen);
    }
}
