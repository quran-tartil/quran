<?php

namespace Database\Seeders\Quran;

use Illuminate\Database\Seeder;
use App\Models\Autorisation\Role;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;

use App\Models\User;
use App\Models\Quran\NoteAyat;

class NoteAyatSeeder extends Seeder
{

    public function run(): void
    {
        // truncate table data
        Schema::disableForeignKeyConstraints();
        NoteAyat::truncate();
        Schema::enableForeignKeyConstraints();
   
        // get data from csv file
        $csvFile = fopen(base_path("database/data/noteAyats.csv"), "r");
        $firstline = true;
        $i = 0;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {

                NoteAyat::create([
                    "name" =>$data['0'],
                    "description" => $data['1']
                   
                ]);    
            }
            $firstline = false;
        }
   
        fclose($csvFile);


        $actions = ['index', 'show', 'create', 'store', 'edit', 'update', 'destroy', 'export', 'import'];
        foreach ($actions as $action) {
            $permissionName = $action . '-' . "NoteAyatController";
            Permission::create(['name' => $permissionName, 'guard_name' => 'web']);
        }

        $memberRolePermissions = [
            "index-NoteAyatController",
            "show-NoteAyatController",
        ];

        $adminManagerRolePermissions = [
            'index-NoteAyatController',
            'show-NoteAyatController',
            'create-NoteAyatController',
            'store-NoteAyatController',
            'edit-NoteAyatController',
            'update-NoteAyatController',
            'destroy-NoteAyatController',
            'export-NoteAyatController',
            'import-NoteAyatController'
        ];

        $membreRole = Role::where('name', User::MEMBRE)->first();
        $membreRole->givePermissionTo($memberRolePermissions);

        $chefRole = Role::where('name', User::ADMIN)->first();
        $chefRole->givePermissionTo($adminManagerRolePermissions);

    }
}
