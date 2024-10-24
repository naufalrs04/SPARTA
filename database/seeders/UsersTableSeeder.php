<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $data =[
            [
                'id' => 1, 
                'email' => 'naufalrizki@students.sparta.ac.id', 
                'password' => MD5('naufal123'), 
                'nama' => 'Naufal Rizki',
                'nim_nip' => '24060122120011', 
                'kp' => 0,
                'dk' => 0, 
                'pa' => 0, 
                'ba' => 0, 
                'ma' => 1
            ],
            [
                'id' => 2, 
                'email' => 'rockygerung@lecturer.sparta.ac.id', 
                'password' => MD5('rocky123'), 
                'nama' => 'Rocky Gerung',
                'nim_nip' => '212345678910', 
                'kp' => 0,
                'dk' => 1, 
                'pa' => 1, 
                'ba' => 0, 
                'ma' => 0
            ],
            [
                'id' => 3, 
                'email' => 'fufufafa@lecturer.sparta.ac.id', 
                'password' => MD5('fufufafa123'), 
                'nama' => 'Fufu Fafa, S.Kom., M.T.',
                'nim_nip' => '212345678910', 
                'kp' => 0,
                'dk' => 0, 
                'pa' => 1, 
                'ba' => 0, 
                'ma' => 0
            ],
            [
                'id' => 4, 
                'email' => 'mulyono@lecturer.sparta.ac.id', 
                'password' => MD5('mulyono123'), 
                'nama' => 'Mulyono',
                'nim_nip' => '212345678910', 
                'kp' => 1,
                'dk' => 0, 
                'pa' => 1, 
                'ba' => 0, 
                'ma' => 0
            ],
            [
                'id' => 5,
                'email' => 'gemoy@lecturer.sparta.ac.id',
                'password' => MD5('gemoy123'),
                'nama' => 'Gemoy',
                'nim_nip' => '212345678910',
                'kp' => 0,
                'dk' => 0,
                'pa' => 0,
                'ba' => 1,
                'ma' => 0
            ]
        ];
        
        DB::table('users')->insert($data);
    }
}
