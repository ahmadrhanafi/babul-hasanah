<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RoleAndUserSeeder extends Seeder
{
    public function run(): void
    {
        // Akun Admin
        User::updateOrCreate(
            ['email' => 'admin@babulhasanah.sch.id'],
            [
                'name' => 'Super Administrator',
                'password' => Hash::make('password123'),
                'role' => 'super_admin',
            ]
        );

        // Akun Wali Santri
        User::updateOrCreate(
            ['email' => 'walisantri@gmail.com'],
            [
                'name' => 'Wali Santri Ahmad',
                'password' => Hash::make('password123'),
                'role' => 'wali_santri',
            ]
        );
    }
}