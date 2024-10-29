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
                'nim' => 24060119140121,
                'status' => null,
                'semester' => 2,
                'prodi' => 'Informatika',
                'IPK' => 3.89,
                'IPS_Sebelumnya' => 3.94,
            ],
            [
                'user_id' => 6,
                'nim' => 24060119130068,
                'status' => null,
                'semester' => 2,
                'prodi' => 'Informatika',
                'IPK' => 3.79,
                'IPS_Sebelumnya' => 3.91,
            ],

        ];

        DB::table('mahasiswas')->insert($data_mahasiswa);
    }


}
