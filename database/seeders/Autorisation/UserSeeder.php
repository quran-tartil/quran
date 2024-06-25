<?php

namespace Database\Seeders\Autorisation;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Création des utilisateurs 
        
        User::create([
            'name' => 'membre',
            'email' => 'membre@gmail.com',
            'password' => Hash::make('membre'),
        ])->assignRole(User::MEMBRE);

        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
        ])->assignRole(User::ADMIN);;
    }
}