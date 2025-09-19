<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'superAdmin@gmail.com'],
            [
                'nama' => 'SuperAdmin',
                'username' => 'NuhunPal',
                'jenisKlamin' => 'Laki-Laki',
                'password' => Hash::make('superadmin123'),
                'status' => 'active',
                'role' => 'admin',
            ]
        );
    }
}
