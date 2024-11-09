<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Dosen = [
            [
                'user_id' => 2,
                'notelp' => '081211293891',
                'status' => 1,
                
                
            ],
        ];
        DB::table('dosens')->insert($Dosen);
    }
}
