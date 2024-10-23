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
            ['gedung_id' => '1', 'nama_gedung' => 'Gedung A'],
            ['gedung_id' => '2', 'nama_gedung' => 'Gedung B'],
            ['gedung_id' => '3', 'nama_gedung' => 'Gedung C'],
            ['gedung_id' => '4', 'nama_gedung' => 'Gedung D'],
            ['gedung_id' => '5', 'nama_gedung' => 'Gedung E'],
            ['gedung_id' => '6', 'nama_gedung' => 'Gedung F'],
            ['gedung_id' => '7', 'nama_gedung' => 'Gedung G'],
            ['gedung_id' => '8', 'nama_gedung' => 'Gedung H'],
            ['gedung_id' => '9', 'nama_gedung' => 'Gedung I'],
            ['gedung_id' => '10', 'nama_gedung' => 'Gedung J'],
            ['gedung_id' => '11', 'nama_gedung' => 'Gedung K'],
        ];
        DB::table('gedungs')->insert($gedung);
    }
}
