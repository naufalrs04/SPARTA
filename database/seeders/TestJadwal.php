<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestJadwal extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        //
        $data_jadwal = [
            [
                'nama_mk' => 'Machine Learning',
                'kode_mk' => 'PAIK1010101',
                'sks_mk' => 3,
                'semester_mk' => 4,
                'prodi' => 'Informatika',
                'kelas' =>'A',
                'tahun_ajaran' => '2024/2025',
                'dosen' => 'fufuafa',
                'ruang' => 'A101',
                'kapasitas' => 50 ,
                'hari'=>'Senin',
                'jam_mulai' => '12:45:00',
                'jam_selesai'=> '13:00:00',
                'status_pengajuan'=> 'ter-Verifikasi'      
            ],
            [
                'nama_mk' => 'Machine Learning',
                'kode_mk' => 'PAIK1010101',
                'sks_mk' => 3,
                'semester_mk' => 4,
                'prodi' => 'Informatika',
                'kelas' =>'B',
                'tahun_ajaran' => '2024/2025',
                'dosen' => 'fufuafa',
                'ruang' => 'A101',
                'kapasitas' => 50 ,
                'hari'=>'Selasa',
                'jam_mulai' => '13:15:00',
                'jam_selesai'=> '15:30:00',
                'status_pengajuan'=> 'ter-Verifikasi' 
            ],
            [
                'nama_mk' => 'Machine Learning',
                'kode_mk' => 'PAIK1010101',
                'sks_mk' => 3,
                'semester_mk' => 4,
                'prodi' => 'Informatika',
                'kelas' =>'C',
                'tahun_ajaran' => '2024/2025',
                'dosen' => 'fufuafa',
                'ruang' => 'A101',
                'kapasitas' => 50 ,
                'hari'=>'Rabu',
                'jam_mulai' => '09:30:00',
                'jam_selesai'=> '11:00:00',
                'status_pengajuan'=> 'ter-Verifikasi' 
            ],
            [
                    'nama_mk' => 'Data Mining',
                    'kode_mk' => 'PAIK1020202',
                    'sks_mk' => 3,
                    'semester_mk' => 4,
                    'prodi' => 'Informatika',
                    'kelas' => 'A',
                    'tahun_ajaran' => '2024/2025',
                    'dosen' => 'dosenA',
                    'ruang' => 'B101',
                    'kapasitas' => 45,
                    'hari' => 'Senin',
                    'jam_mulai' => '09:00:00',
                    'jam_selesai' => '11:15:00',
                    'status_pengajuan' => 'ter-Verifikasi'
                ],
                [
                    'nama_mk' => 'Data Mining',
                    'kode_mk' => 'PAIK1020202',
                    'sks_mk' => 3,
                    'semester_mk' => 4,
                    'prodi' => 'Informatika',
                    'kelas' => 'B',
                    'tahun_ajaran' => '2024/2025',
                    'dosen' => 'dosenB',
                    'ruang' => 'B102',
                    'kapasitas' => 50,
                    'hari' => 'Selasa',
                    'jam_mulai' => '13:15:00',
                    'jam_selesai' => '15:30:00',
                    'status_pengajuan' => 'ter-Verifikasi'
                ],
                [
                    'nama_mk' => 'Data Mining',
                    'kode_mk' => 'PAIK1020202',
                    'sks_mk' => 3,
                    'semester_mk' => 4,
                    'prodi' => 'Informatika',
                    'kelas' => 'C',
                    'tahun_ajaran' => '2024/2025',
                    'dosen' => 'dosenC',
                    'ruang' => 'B103',
                    'kapasitas' => 45,
                    'hari' => 'Rabu',
                    'jam_mulai' => '10:00:00',
                    'jam_selesai' => '12:15:00',
                    'status_pengajuan' => 'ter-Verifikasi'
                ],
                [
                    'nama_mk' => 'Data Mining',
                    'kode_mk' => 'PAIK1020202',
                    'sks_mk' => 3,
                    'semester_mk' => 4,
                    'prodi' => 'Informatika',
                    'kelas' => 'D',
                    'tahun_ajaran' => '2024/2025',
                    'dosen' => 'dosenD',
                    'ruang' => 'B104',
                    'kapasitas' => 45,
                    'hari' => 'Kamis',
                    'jam_mulai' => '08:00:00',
                    'jam_selesai' => '10:15:00',
                    'status_pengajuan' => 'ter-Verifikasi'
                ],
                
                [
                    'nama_mk' => 'Computer Vision',
                    'kode_mk' => 'PAIK1030303',
                    'sks_mk' => 4,
                    'semester_mk' => 4,
                    'prodi' => 'Informatika',
                    'kelas' => 'A',
                    'tahun_ajaran' => '2024/2025',
                    'dosen' => 'dosenE',
                    'ruang' => 'C201',
                    'kapasitas' => 40,
                    'hari' => 'Jumat',
                    'jam_mulai' => '10:30:00',
                    'jam_selesai' => '13:00:00',
                    'status_pengajuan' => 'ter-Verifikasi'
                ],
                [
                    'nama_mk' => 'Computer Vision',
                    'kode_mk' => 'PAIK1030303',
                    'sks_mk' => 4,
                    'semester_mk' => 4,
                    'prodi' => 'Informatika',
                    'kelas' => 'B',
                    'tahun_ajaran' => '2024/2025',
                    'dosen' => 'dosenF',
                    'ruang' => 'C202',
                    'kapasitas' => 40,
                    'hari' => 'Senin',
                    'jam_mulai' => '12:15:00',
                    'jam_selesai' => '14:45:00',
                    'status_pengajuan' => 'ter-Verifikasi'
                ],
                [
                    'nama_mk' => 'Computer Vision',
                    'kode_mk' => 'PAIK1030303',
                    'sks_mk' => 4,
                    'semester_mk' => 4,
                    'prodi' => 'Informatika',
                    'kelas' => 'C',
                    'tahun_ajaran' => '2024/2025',
                    'dosen' => 'dosenG',
                    'ruang' => 'C203',
                    'kapasitas' => 40,
                    'hari' => 'Selasa',
                    'jam_mulai' => '14:00:00',
                    'jam_selesai' => '16:30:00',
                    'status_pengajuan' => 'ter-Verifikasi'
                ],
                [
                    'nama_mk' => 'Computer Vision',
                    'kode_mk' => 'PAIK1030303',
                    'sks_mk' => 4,
                    'semester_mk' => 4,
                    'prodi' => 'Informatika',
                    'kelas' => 'D',
                    'tahun_ajaran' => '2024/2025',
                    'dosen' => 'dosenH',
                    'ruang' => 'C204',
                    'kapasitas' => 40,
                    'hari' => 'Kamis',
                    'jam_mulai' => '09:00:00',
                    'jam_selesai' => '11:30:00',
                    'status_pengajuan' => 'ter-Verifikasi'
                ],
                
                [
                    'nama_mk' => 'Artificial Intelligence',
                    'kode_mk' => 'PAIK1040404',
                    'sks_mk' => 3,
                    'semester_mk' => 4,
                    'prodi' => 'Informatika',
                    'kelas' => 'A',
                    'tahun_ajaran' => '2024/2025',
                    'dosen' => 'dosenI',
                    'ruang' => 'D101',
                    'kapasitas' => 50,
                    'hari' => 'Rabu',
                    'jam_mulai' => '08:00:00',
                    'jam_selesai' => '10:15:00',
                    'status_pengajuan' => 'ter-Verifikasi'
                ],
                [
                    'nama_mk' => 'Artificial Intelligence',
                    'kode_mk' => 'PAIK1040404',
                    'sks_mk' => 3,
                    'semester_mk' => 4,
                    'prodi' => 'Informatika',
                    'kelas' => 'B',
                    'tahun_ajaran' => '2024/2025',
                    'dosen' => 'dosenJ',
                    'ruang' => 'D102',
                    'kapasitas' => 50,
                    'hari' => 'Jumat',
                    'jam_mulai' => '13:15:00',
                    'jam_selesai' => '15:30:00',
                    'status_pengajuan' => 'ter-Verifikasi'
                ],
                [
                    'nama_mk' => 'Artificial Intelligence',
                    'kode_mk' => 'PAIK1040404',
                    'sks_mk' => 3,
                    'semester_mk' => 4,
                    'prodi' => 'Informatika',
                    'kelas' => 'C',
                    'tahun_ajaran' => '2024/2025',
                    'dosen' => 'dosenK',
                    'ruang' => 'D103',
                    'kapasitas' => 50,
                    'hari' => 'Senin',
                    'jam_mulai' => '11:30:00',
                    'jam_selesai' => '13:45:00',
                    'status_pengajuan' => 'ter-Verifikasi'
                ],
                [
                    'nama_mk' => 'Artificial Intelligence',
                    'kode_mk' => 'PAIK1040404',
                    'sks_mk' => 3,
                    'semester_mk' => 4,
                    'prodi' => 'Informatika',
                    'kelas' => 'D',
                    'tahun_ajaran' => '2024/2025',
                    'dosen' => 'dosenL',
                    'ruang' => 'D104',
                    'kapasitas' => 50,
                    'hari' => 'Selasa',
                    'jam_mulai' => '14:30:00',
                    'jam_selesai' => '16:45:00',
                    'status_pengajuan' => 'ter-Verifikasi'
                ]
                ];
            

        DB::table('penyusunan_jadwals')->insert($data_jadwal);
    }
}
