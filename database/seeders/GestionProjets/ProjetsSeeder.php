<?php

namespace Database\Seeders\GestionProjets;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\GestionProjets\Projet;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class ProjetsSeeder extends Seeder
{
    public function run(): void
    {

        $projetsData = [
            [
                'nom' => 'Portfolio',
                'description' => 'Développement d\'un site web mettant en valeur nos compétences.',
                'date_debut' => now()->addDays(2)->startOfDay(), // Only date part without time
                'date_de_fin' => now()->addDays(20)->startOfDay(), // Only date part without time
            ],
            [
                'nom' => 'Arbre des compétences',
                'description' => 'Création d\'une application web pour l\'évaluation des compétences.',
                'date_debut' => now()->addDays()->startOfDay(), // Only date part without time
                'date_de_fin' => now()->addDays(35)->startOfDay(), // Only date part without time
            ],
            [
                'nom' => '  CNMH',
                'description' => 'Création d\'une application web pour laa gestion des patients de centre cnmh.',
                'date_debut' => now()->addDays(2)->startOfDay(), // Only date part without time
                'date_de_fin' => now()->addDays(25)->startOfDay(), // Only date part without time
            ]
        ];

        foreach ($projetsData as $projetData) {
            Projet::create($projetData);
        }

        $actions = ['index', 'show', 'create', 'store', 'edit', 'update', 'destroy', 'export', 'import'];
        foreach ($actions as $action) {
            $permissionName = $action . '-' . "ProjetController";
            Permission::create(['name' => $permissionName, 'guard_name' => 'web']);
        }

        $memberRolePermissions = [
            "index-ProjetController",
            "show-ProjetController",
        ];

        $projectManagerRolePermissions = [
            'index-ProjetController',
            'show-ProjetController',
            'create-ProjetController',
            'store-ProjetController',
            'edit-ProjetController',
            'update-ProjetController',
            'destroy-ProjetController',
            'export-ProjetController',
            'import-ProjetController'
        ];

        $membreRole = Role::where('name', User::MEMBRE)->first();
        $membreRole->givePermissionTo($memberRolePermissions);

        $chefRole = Role::where('name', User::CHEF_DE_PROJET)->first();
        $chefRole->givePermissionTo($projectManagerRolePermissions);
       
    }
}