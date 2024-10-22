<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class irs extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $irs = [
            // Jadwal aman (tidak ada tabrakan ruangan)
            [
                'mahasiswa_id' => 1,
                'mata_kuliah_id' => 1,
                'ruangan_id' => 1,
            ],
            [
                'mahasiswa_id' => 1,
                'mata_kuliah_id' => 2,
                'ruangan_id' => 2,
            ],
            [
                'mahasiswa_id' => 1,
                'mata_kuliah_id' => 3,
                'ruangan_id' => 3,
            ],
            [
                'mahasiswa_id' => 1,
                'mata_kuliah_id' => 4,
                'ruangan_id' => 4,
            ],
            [
                'mahasiswa_id' => 1,
                'mata_kuliah_id' => 5,
                'ruangan_id' => 5,
            ],
            [
                'mahasiswa_id' => 1,
                'mata_kuliah_id' => 6,
                'ruangan_id' => 6,
            ],
            [
                'mahasiswa_id' => 1,
                'mata_kuliah_id' => 7,
                'ruangan_id' => 7,
            ],
            [
                'mahasiswa_id' => 1,
                'mata_kuliah_id' => 8,
                'ruangan_id' => 8,
            ],
            [
                'mahasiswa_id' => 1,
                'mata_kuliah_id' => 9,
                'ruangan_id' => 9,
            ],
            [
                'mahasiswa_id' => 1,
                'mata_kuliah_id' => 10,
                'ruangan_id' => 10,
            ],
        
            // Jadwal tabrakan (ruangan yang sama untuk mata kuliah yang berbeda)
            [
                'mahasiswa_id' => 1,
                'mata_kuliah_id' => 11,
                'ruangan_id' => 1, // Tabrakan dengan mata_kuliah_id 1
            ],
            [
                'mahasiswa_id' => 1,
                'mata_kuliah_id' => 12,
                'ruangan_id' => 2, // Tabrakan dengan mata_kuliah_id 2
            ],
            [
                'mahasiswa_id' => 1,
                'mata_kuliah_id' => 13,
                'ruangan_id' => 3, // Tabrakan dengan mata_kuliah_id 3
            ],
            [
                'mahasiswa_id' => 1,
                'mata_kuliah_id' => 14,
                'ruangan_id' => 4, // Tabrakan dengan mata_kuliah_id 4
            ],
            [
                'mahasiswa_id' => 1,
                'mata_kuliah_id' => 15,
                'ruangan_id' => 5, // Tabrakan dengan mata_kuliah_id 5
            ],
        
            // Jadwal aman lagi
            [
                'mahasiswa_id' => 1,
                'mata_kuliah_id' => 16,
                'ruangan_id' => 6,
            ],
            [
                'mahasiswa_id' => 1,
                'mata_kuliah_id' => 17,
                'ruangan_id' => 7,
            ],
            [
                'mahasiswa_id' => 1,
                'mata_kuliah_id' => 18,
                'ruangan_id' => 8,
            ],
            [
                'mahasiswa_id' => 1,
                'mata_kuliah_id' => 19,
                'ruangan_id' => 9,
            ],
            [
                'mahasiswa_id' => 1,
                'mata_kuliah_id' => 20,
                'ruangan_id' => 10,
            ],
        
            // Tabrakan lagi
            [
                'mahasiswa_id' => 1,
                'mata_kuliah_id' => 21,
                'ruangan_id' => 1, // Tabrakan dengan mata_kuliah_id 1 dan 11
            ],
            [
                'mahasiswa_id' => 1,
                'mata_kuliah_id' => 22,
                'ruangan_id' => 2, // Tabrakan dengan mata_kuliah_id 2 dan 12
            ],
            [
                'mahasiswa_id' => 1,
                'mata_kuliah_id' => 23,
                'ruangan_id' => 3, // Tabrakan dengan mata_kuliah_id 3 dan 13
            ],
        
            // Jadwal aman lagi
            [
                'mahasiswa_id' => 1,
                'mata_kuliah_id' => 24,
                'ruangan_id' => 4,
            ],
            [
                'mahasiswa_id' => 1,
                'mata_kuliah_id' => 25,
                'ruangan_id' => 5,
            ],
            [
                'mahasiswa_id' => 1,
                'mata_kuliah_id' => 26,
                'ruangan_id' => 6,
            ],
            [
                'mahasiswa_id' => 1,
                'mata_kuliah_id' => 27,
                'ruangan_id' => 7,
            ],
            [
                'mahasiswa_id' => 1,
                'mata_kuliah_id' => 28,
                'ruangan_id' => 8,
            ],
            [
                'mahasiswa_id' => 1,
                'mata_kuliah_id' => 29,
                'ruangan_id' => 9,
            ],
            [
                'mahasiswa_id' => 1,
                'mata_kuliah_id' => 30,
                'ruangan_id' => 10,
            ],
        
            // Tabrakan terakhir
            [
                'mahasiswa_id' => 1,
                'mata_kuliah_id' => 31,
                'ruangan_id' => 1, // Tabrakan dengan mata_kuliah_id 1, 11, 21
            ],
            [
                'mahasiswa_id' => 1,
                'mata_kuliah_id' => 32,
                'ruangan_id' => 2, // Tabrakan dengan mata_kuliah_id 2, 12, 22
            ],
        ];
        

        DB::table('irs')->insert($irs);
    }
}
