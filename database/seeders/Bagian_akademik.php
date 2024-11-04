<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Bagian_akademik extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data_bagianAkademik = [
            [
                'nip' => '240601122120015',
                'status' => 1,
            ],

        ];

        DB::table('bagian_akademiks')->insert($data_bagianAkademik);
    }
}
