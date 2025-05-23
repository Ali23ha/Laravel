<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12341234'),
            'role_id' => 1
        ]);
        User::create([
            'name' => 'coach',
            'email' => 'coach@gmail.com',
            'password' => Hash::make('12341234'),
            'role_id' => 2
        ]);
        User::create([
            'name' => 'trainee',
            'email' => 'trainee@gmail.com',
            'password' => Hash::make('12341234'),
            'role_id' => 3
        ]);
    }
}
