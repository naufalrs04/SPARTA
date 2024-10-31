<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class gedung extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gedung = [
            ['nama' => 'Gedung A'],
            ['nama' => 'Gedung B'],
            ['nama' => 'Gedung C'],
            ['nama' => 'Gedung D'],
            ['nama' => 'Gedung E'],
            ['nama' => 'Gedung F'],
            ['nama' => 'Gedung G'],
            ['nama' => 'Gedung H'],
            ['nama' => 'Gedung I'],
            ['nama' => 'Gedung J'],
            ['nama' => 'Gedung K'],
        ];
        DB::table('gedungs')->insert($gedung);
    }
}
