<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class irs extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $irs = [
            [
                'mahasiswa_id' => 1,
                'mata_kuliah_id' => 1,
                'ruangan_id' => 1,
            ],
            [
                'mahasiswa_id' => 1,
                'mata_kuliah_id' => 2,
                'ruangan_id' => 2,
            ],
            [
                'mahasiswa_id' => 1,
                'mata_kuliah_id' => 3,
                'ruangan_id' => 3,
            ],
            [
                'mahasiswa_id' => 1,
                'mata_kuliah_id' => 4,
                'ruangan_id' => 4,
            ],
            [
                'mahasiswa_id' => 1,
                'mata_kuliah_id' => 5,
                'ruangan_id' => 5,
            ],
            [
                'mahasiswa_id' => 1,
                'mata_kuliah_id' => 6,
                'ruangan_id' => 6,
            ],
        ];

        DB::table('irs')->insert($irs);
    }
}
