<?php

namespace Database\Seeders\Quran;

use Illuminate\Database\Seeder;
use App\Models\Autorisation\Role;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;

use App\Models\User;
use App\Models\Quran\Topic;

class TopicSeeder extends Seeder
{

    public function run(): void
    {
        // truncate table data
        Schema::disableForeignKeyConstraints();
        Topic::truncate();
        Schema::enableForeignKeyConstraints();
   
        // get data from csv file
        $csvFile = fopen(base_path("database/data/topics.csv"), "r");
        $firstline = true;
        $i = 0;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {

                Topic::create([
                    "name" =>$data['0'],
                    "description" => $data['1']
                   
                ]);    
            }
            $firstline = false;
        }
   
        fclose($csvFile);


        $actions = ['index', 'show', 'create', 'store', 'edit', 'update', 'destroy', 'export', 'import'];
        foreach ($actions as $action) {
            $permissionName = $action . '-' . "TopicController";
            Permission::create(['name' => $permissionName, 'guard_name' => 'web']);
        }

        $memberRolePermissions = [
            "index-TopicController",
            "show-TopicController",
        ];

        $adminManagerRolePermissions = [
            'index-TopicController',
            'show-TopicController',
            'create-TopicController',
            'store-TopicController',
            'edit-TopicController',
            'update-TopicController',
            'destroy-TopicController',
            'export-TopicController',
            'import-TopicController'
        ];

        $membreRole = Role::where('name', User::MEMBRE)->first();
        $membreRole->givePermissionTo($memberRolePermissions);

        $chefRole = Role::where('name', User::ADMIN)->first();
        $chefRole->givePermissionTo($adminManagerRolePermissions);

    }
}
