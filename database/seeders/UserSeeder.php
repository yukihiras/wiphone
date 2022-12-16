<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataUsers = [];
        for ($i = 0; $i < 10; $i++) {
            array_push($dataUsers, [
                "username" => "Vongola " . $i + 1,
                "email" => "vongola" . $i + 1 . "@gmail.com",
                "password" => Hash::make(123456),
                "avatar" => "aksjdfklajf",
                "phoneNumber" => "0398791386",
                "status" => 1,
                "role_id" => 1,
                "created_at" => date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s'),
            ]);
        }
        DB::table('users')->insert($dataUsers);
    }
}
