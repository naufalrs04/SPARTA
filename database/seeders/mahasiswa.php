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
                'nim' => '240601122120011',
                'status' => null,
                'semester' => 3,
                'prodi' => 'Informatika',
                'IPK' => 3.89,
                'IPS_Sebelumnya' => 3.94,
                'id_wali' => 1,
            ],
            [
                'nim' => '24060119130068',
                'status' => null,
                'semester' => 2,
                'prodi' => 'Informatika',
                'IPK' => 3.79,
                'IPS_Sebelumnya' => 3.91,
                'id_wali' => 1,
            ],
            [
                'nim' => '24060119157680',
                'status' => null,
                'semester' => 2,
                'prodi' => 'Informatika',
                'IPK' => 3.80,
                'IPS_Sebelumnya' => 3.50,
                'id_wali' => 1,
            ]

        ];

        DB::table('mahasiswas')->insert($data_mahasiswa);
    }


}
