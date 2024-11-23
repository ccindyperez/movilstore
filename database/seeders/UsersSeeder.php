<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
                'name' => 'Cindy Juleidy Rodriguez Peres',
                'email' => 'Cindy@gmail.com',
                'password' => Hash::make('123456789'), // Encripta la contraseña
                'role' => 'admin', // Cambia a 'admin' o 'user' según corresponda
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Abnier Perez Cano',
                'email' => 'abnier19@gmail.com',
                'password' => Hash::make('123456789'), // Encripta la contraseña
                'role' => 'admin', // Cambia a 'admin' o 'user' según corresponda
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jose Alberto Martinez Vazquez',
                'email' => 'albertomart420@gmail.com',
                'password' => Hash::make('123456789'), // Encripta la contraseña
                'role' => 'user', // Cambia a 'admin' o 'user' según corresponda
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
