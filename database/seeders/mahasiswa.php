<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class mahasiswa extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data_mahasiswa = [
            [
                'user_id' => 1,
                'status' => null,
                'semester' => 1,
                'prodi' => 'Informatika',
                'IPK' => 3.89,
            ],

        ];

        DB::table('mahasiswas')->insert($data_mahasiswa);
    }


}
