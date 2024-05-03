<?php

namespace Database\Seeders\GestionProjets;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\GestionProjets\Task;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class TasksSeeder extends Seeder
{

    public function run(): void
    {

        $tasksData = [
            [
                'nom' => 'Portfolio tache',
                'description' => 'Développement d\'un site web mettant en valeur nos compétences.',
                'date_debut' => now()->addDays(2),
                'date_de_fin' => now()->addDays(20),
                'project_id' => 1,
                'user_id' => 1
            ],
            [
                'nom' => 'Arbre des compétences tache',
                'description' => 'évaluation des compétences.',
                'date_debut' => now()->addDays(),
                'date_de_fin' => now()->addDays(35),
                'project_id' => 2,
                'user_id' => 2
            ],
            [
                'nom' => 'CNMH tache',
                'description' => 'Diagramme de cas d\'utilisation.',
                'date_debut' => now()->addDays(2),
                'date_de_fin' => now()->addDays(25),
                'project_id' => 3,
                'user_id' => 3
            ]
        ];

        foreach ($tasksData as $taskData) {
            Task::create($taskData);
        }

        $actions = ['index', 'show', 'detail', 'create', 'store', 'edit', 'update', 'destroy', 'export', 'import'];
        foreach ($actions as $action) {
            $permissionName = $action . '-' . "TaskController";
            Permission::create(['name' => $permissionName, 'guard_name' => 'web']);
        }


        $memberRolePermissions = [
            "index-TaskController",
            "show-TaskController",
            "detail-TaskController",
        ];

        $projectManagerRolePermissions = [
            'index-TaskController',
            'show-TaskController',
            "detail-TaskController",
            'create-TaskController',
            'store-TaskController',
            'edit-TaskController',
            'update-TaskController',
            'destroy-TaskController',
            'export-TaskController',
            'import-TaskController'
        ];

 
        $membreRole = Role::where('name', User::MEMBRE)->first();
        $membreRole->givePermissionTo($memberRolePermissions);

        $chefRole = Role::where('name', User::CHEF_DE_PROJET)->first();
        $chefRole->givePermissionTo($projectManagerRolePermissions);


    }
}

