<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class mata_kuliah extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $mata_kuliahs = [
            [
                'kode' => 'PAIK6501',
                'nama' => 'Pengembangan Berbasis Platform',
                'sks' => 4,
                'semester' => 5,
                'prodi' => 'Informatika',
            ],
            [
                'kode' => 'PAIK6502',
                'nama' => 'Komputasi Tersebar dan Pararel',
                'sks' => 3,
                'semester' => 5,
                'prodi' => 'Informatika',
            ],
            [
                'kode' => 'PAIK6503',
                'nama' => 'Sistem Informasi',
                'sks' => 3,
                'semester' => 5,
                'prodi' => 'Informatika',
            ],
            [
                'kode' => 'PAIK6504',
                'nama' => 'Proyek Perangkat Lunak',
                'sks' => 3,
                'semester' => 5,
                'prodi' => 'Informatika',
            ],
            [
                'kode' => 'PAIK6505',
                'nama' => 'Pembelajaran Mesin',
                'sks' => 3,
                'semester' => 5,
                'prodi' => 'Informatika',
            ],
            [
                'kode' => 'UUW00008',
                'nama' => 'Kewirausahaan',
                'sks' => 2,
                'semester' => 5,
                'prodi' => 'Informatika',
            ],
            [
                'kode' => 'PAIK6702',
                'nama' => 'Teori Bahasa dan Otomata',
                'sks' => 3,
                'semester' => 7,
                'prodi' => 'Informatika',
            ],
            [
                'kode' => 'PAIK6102',
                'nama' => 'Dasar Pemrograman',
                'sks' => 3,
                'semester' => 1,
                'prodi' => 'Informatika',
            ],
            [
                'kode' => 'UUW00005',
                'nama' => 'Olahraga',
                'sks' => 1,
                'semester' => 1,
                'prodi' => 'Informatika',
            ],
            [
                'kode' => 'PAIK6104',
                'nama' => 'Logika Informatika',
                'sks' => 3,
                'semester' => 1,
                'prodi' => 'Informatika',
            ],
            [
                'kode' => 'PAIK6103',
                'nama' => 'Dasar Sistem',
                'sks' => 3,
                'semester' => 1,
                'prodi' => 'Informatika',
            ],
            [
                'kode' => 'UUW00007',
                'nama' => 'Bahasa Inggris',
                'sks' => 2,
                'semester' => 1,
                'prodi' => 'Informatika',
            ],
            [
                'kode' => 'PAIK6101',
                'nama' => 'Matematika 1',
                'sks' => 2,
                'semester' => 1,
                'prodi' => 'Informatika',
            ],
            [
                'kode' => 'PAIK6105',
                'nama' => 'Struktur Diskrit',
                'sks' => 4,
                'semester' => 1,
                'prodi' => 'Informatika',
            ],
            [
                'kode' => 'UUW00003',
                'nama' => 'Pancasila dan Kewarganegaraan',
                'sks' => 3,
                'semester' => 1,
                'prodi' => 'Informatika',
            ],
            [
                'kode' => 'PAIK6202',
                'nama' => 'Algoritma Pemrograman',
                'sks' => 4,
                'semester' => 2,
                'prodi' => 'Informatika',
            ],
            [
                'kode' => 'UUW00004',
                'nama' => 'Bahasa Indonesia',
                'sks' => 2,
                'semester' => 2,
                'prodi' => 'Informatika',
            ],
            [
                'kode' => 'UUW00006',
                'nama' => 'Internet of Things (IoT)',
                'sks' => 2,
                'semester' => 2,
                'prodi' => 'Informatika',
            ],
            [
                'kode' => 'PAIK6204',
                'nama' => 'Aljabar Linear',
                'sks' => 3,
                'semester' => 2,
                'prodi' => 'Informatika',
            ],
            [
                'kode' => 'PAIK6203',
                'nama' => 'Organisasi dan Arsitektur Komputer',
                'sks' => 3,
                'semester' => 2,
                'prodi' => 'Informatika',
            ],
            [
                'kode' => 'UUW00011',
                'nama' => 'Pendidikan Agama Islam',
                'sks' => 2,
                'semester' => 2,
                'prodi' => 'Informatika',
            ],
            [
                'kode' => 'PAIK6603',
                'nama' => 'Masyarakat dan Etika Profesi',
                'sks' => 3,
                'semester' => 6,
                'prodi' => 'Informatika',
            ],
            [
                'kode' => 'PAIK6201',
                'nama' => 'Matematika 2',
                'sks' => 2,
                'semester' => 2,
                'prodi' => 'Informatika',
            ],
            [
                'kode' => 'PAIK6402',
                'nama' => 'Jaringan Komputer',
                'sks' => 3,
                'semester' => 3,
                'prodi' => 'Informatika',
            ],
            [
                'kode' => 'PAIK6301',
                'nama' => 'Struktur Data',
                'sks' => 4,
                'semester' => 3,
                'prodi' => 'Informatika',
            ],
            [
                'kode' => 'PAIK6306',
                'nama' => 'Statistika',
                'sks' => 2,
                'semester' => 3,
                'prodi' => 'Informatika',
            ],
            [
                'kode' => 'PAIK6303',
                'nama' => 'Basis Data',
                'sks' => 4,
                'semester' => 3,
                'prodi' => 'Informatika',
            ],
            [
                'kode' => 'PAIK6506',
                'nama' => 'Keamanan dan Jaminan Informasi',
                'sks' => 3,
                'semester' => 5,
                'prodi' => 'Informatika',
            ],
            [
                'kode' => 'PAIK6302',
                'nama' => 'Sistem Operasi',
                'sks' => 3,
                'semester' => 3,
                'prodi' => 'Informatika',
            ],
            [
                'kode' => 'PAIK6305',
                'nama' => 'Interaksi Manusia dan Komputer',
                'sks' => 3,
                'semester' => 3,
                'prodi' => 'Informatika',
            ],
            [
                'kode' => 'PAIK6306',
                'nama' => 'Statistika',
                'sks' => 2,
                'semester' => 3,
                'prodi' => 'Informatika',
            ],
            [
                'kode' => 'PAIK6406',
                'nama' => 'Sistem Cerdas',
                'sks' => 3,
                'semester' => 4,
                'prodi' => 'Informatika',
            ],
            [
                'kode' => 'PAIK6404',
                'nama' => 'Grafika dan Komputasi Visual',
                'sks' => 3,
                'semester' => 4,
                'prodi' => 'Informatika',
            ],
            [
                'kode' => 'PAIK6401',
                'nama' => 'Pemrograman Berorientasi Objek',
                'sks' => 3,
                'semester' => 4,
                'prodi' => 'Informatika',
            ],
            [
                'kode' => 'PAIK6403',
                'nama' => 'Manajemen Basis Data',
                'sks' => 3,
                'semester' => 4,
                'prodi' => 'Informatika',
            ],
            [
                'kode' => 'PAIK6601',
                'nama' => 'Analisis dan Strategi Algoritma',
                'sks' => 3,
                'semester' => 6,
                'prodi' => 'Informatika',
            ],
            [
                'kode' => 'PAIK6405',
                'nama' => 'Rekayasa Perangkat Lunak',
                'sks' => 3,
                'semester' => 4,
                'prodi' => 'Informatika',
            ],
        ];

        DB::table('mata_kuliahs')->insert($mata_kuliahs);
    }
}