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
            'prenom' => 'membre',
            'nom' => 'membre',
            'email' => 'membre@gmail.com',
            'password' => Hash::make('membre'),
        ])->assignRole(User::MEMBRE);

        User::create([
            'prenom' => 'chef',
            'nom' => 'projet',
            'email' => 'chef@gmail.com',
            'password' => Hash::make('chef'),
        ])->assignRole(User::CHEF_DE_PROJET);

        User::create([
            'prenom' => 'admin',
            'nom' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
        ])->assignRole(User::ADMIN);;
    }
}