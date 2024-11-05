<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class prodi extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data_prodi = [
            ['nama_prodi' => 'Informatika'],
            ['nama_prodi' => 'Fisika'],
            ['nama_prodi' => 'Matematika'],
            ['nama_prodi' => 'Statistika'],
            ['nama_prodi' => 'Kimia'],
            ['nama_prodi' => 'Biologi'],
        ];

        DB::table('prodis')->insert($data_prodi);
    }
}
