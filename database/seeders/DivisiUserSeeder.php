<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DivisiUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'sanjayasanti99@gmail.com'],
            [
                'name' => 'Santi Admin',
                'password' => Hash::make('password123'),
                'role' => 'admin',
                'divisi' => 'admin'
            ]
        );

        User::updateOrCreate(
            ['email' => 'bendahara@koperasi.com'],
            [
                'name' => 'Budi Bendahara',
                'password' => Hash::make('password123'),
                'role' => 'admin',
                'divisi' => 'bendahara'
            ]
        );

        User::updateOrCreate(
            ['email' => 'kasir@koperasi.com'],
            [
                'name' => 'Siti Kasir',
                'password' => Hash::make('password123'),
                'role' => 'admin',
                'divisi' => 'kasir'
            ]
        );
    }
}
