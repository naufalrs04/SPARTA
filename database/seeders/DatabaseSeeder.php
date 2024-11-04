<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $this->call([
            UsersTableSeeder::class,
            dosen::class,
            bagian_akademik::class,
            prodi::class,
            mahasiswa::class,
            gedung::class,
            ruangan::class,
            mata_kuliah::class,
            irs::class,
            jadwal_kuliah::class
        ]);
    }
}
