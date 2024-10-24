<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GedungSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gedung = [
            ['id' => 1, 'nama_gedung' => 'Gedung A'],
            ['id' => 2, 'nama_gedung' => 'Gedung B'],
            ['id' => 3, 'nama_gedung' => 'Gedung C'],
            ['id' => 4, 'nama_gedung' => 'Gedung D'],
            ['id' => 5, 'nama_gedung' => 'Gedung E'],
            ['id' => 6, 'nama_gedung' => 'Gedung F'],
            ['id' => 7, 'nama_gedung' => 'Gedung G'],
            ['id' => 8, 'nama_gedung' => 'Gedung H'],
            ['id' => 9, 'nama_gedung' => 'Gedung I'],
            ['id' => 10, 'nama_gedung' => 'Gedung J'],
            ['id' => 11, 'nama_gedung' => 'Gedung K'],
        ];
        DB::table('gedungs')->insert($gedung);
    }
}
