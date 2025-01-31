<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => date('Y-m-d H:i:s', time()),
            'password' => '$2y$10$0NiDt.L2mGRvRzC32QLFeOq97zkzkAtd237UT0qbN5PoGk2hjPb6.', // 'password'
            'role' => 'admin'
        ]);
        User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'email_verified_at' => date('Y-m-d H:i:s', time()),
            'password' => '$2y$10$vyff5w3Ebpa7e6XnJ5irU.xV40pwp1c/hfHAIKNSHD6Ap2RTpGD0a', // 'password'
            'role' => 'user'
        ]);
    }
}
