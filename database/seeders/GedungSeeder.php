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
            ['nama_gedung' => 'Gedung A'],
            ['nama_gedung' => 'Gedung B'],
            ['nama_gedung' => 'Gedung C'],
            ['nama_gedung' => 'Gedung D'],
            ['nama_gedung' => 'Gedung E'],
            ['nama_gedung' => 'Gedung F'],
            ['nama_gedung' => 'Gedung G'],
            ['nama_gedung' => 'Gedung H'],
            ['nama_gedung' => 'Gedung I'],
            ['nama_gedung' => 'Gedung J'],
            ['nama_gedung' => 'Gedung K'],
        ];
        DB::table('gedungs')->insert($gedung);
    }
}
