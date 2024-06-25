<?php

namespace Database\Seeders\Quran;

use Illuminate\Database\Seeder;
use App\Models\Autorisation\Role;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;

use App\Models\User;
use App\Models\Quran\Surah;

class SurahSeeder extends Seeder
{

    public function run(): void
    {
        // truncate table data
        Schema::disableForeignKeyConstraints();
        Surah::truncate();
        Schema::enableForeignKeyConstraints();
   
        // get data from csv file
        $csvFile = fopen(base_path("database/data/surahs.csv"), "r");
        $firstline = true;
        $i = 0;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {

                Surah::create([
                    "number" =>$data['0'],
                    "name" => $data['1'],
                    "number_of_ayahs" =>$data['4'],
                    "revelation_type" =>$data['5']
                ]);    
            }
            $firstline = false;
        }
   
        fclose($csvFile);


        $actions = ['index', 'show', 'create', 'store', 'edit', 'update', 'destroy', 'export', 'import'];
        foreach ($actions as $action) {
            $permissionName = $action . '-' . "SurahController";
            Permission::create(['name' => $permissionName, 'guard_name' => 'web']);
        }

        $memberRolePermissions = [
            "index-SurahController",
            "show-SurahController",
        ];

        $adminManagerRolePermissions = [
            'index-SurahController',
            'show-SurahController',
            'create-SurahController',
            'store-SurahController',
            'edit-SurahController',
            'update-SurahController',
            'destroy-SurahController',
            'export-SurahController',
            'import-SurahController'
        ];

        $membreRole = Role::where('name', User::MEMBRE)->first();
        $membreRole->givePermissionTo($memberRolePermissions);

        $chefRole = Role::where('name', User::ADMIN)->first();
        $chefRole->givePermissionTo($adminManagerRolePermissions);

    }
}
