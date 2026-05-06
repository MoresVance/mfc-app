<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@mfcballoons.com'],
            [
                'name' => 'MFC Admin',
                'password' => Hash::make('Admin@1234'),
                'role' => 'admin',
                'phone' => null,
            ]
        );
    }
}