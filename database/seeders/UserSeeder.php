<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //thêm 2 tài khoản 1 cái admin và 1 cái client
        User::create([
            'name' => 'Admin',
            'email' => 'trantungvn8@gmail.com',
            'password' => Hash::make('Tung2508'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Tunglor',
            'email' => 'trantungvn25@gmail.com',
            'password' => Hash::make('123'),
            'role' => 'user',
        ]);
    }
}
