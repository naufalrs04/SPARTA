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
            ['id'=>1, 'email'=>'rockygerung@students.sparta.ac.id', 'password'=>MD5('rocky123'),'status'=>'mahasiswa'],
            ['id'=>2, 'email'=>'rockygerungdekan@lecturer.sparta.ac.id','password'=>MD5('rocky123'),'status'=>'dekan'],
            ['id'=>3, 'email'=>'rockygerungkaprodi@lecturer.sparta.ac.id','password'=>MD5('rocky123'),'status'=>'kaprodi'],
        ];
        DB::table('users')->insert($data);
    }
}
