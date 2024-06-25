<?php

namespace Database\Seeders\Quran;

use Illuminate\Database\Seeder;
use App\Models\Autorisation\Role;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;

use App\Models\User;
use App\Models\Quran\Ayah;
use Psy\Readline\Hoa\Console;

class AyahSeeder extends Seeder
{

    /**
                 * Number, 0
                 * Juz,1
                 * Manzil,2
                 * Page,3
                 * Ruku,4
                 * Hizbquarter,5
                 * SurahName,6
                 * SurahNumber,7
                 * NumberInSurah,8
                 * quran-simple,9
                 * quran-simple-clean,10
                 * quran-simple-enhanced,11
                 * quran-simple-min,12
                 * quran-uthmani-min,13
                 * quran-uthmani,14
                 * ar.muyassar,15
                 * ,شرح الأية,16
                 * -17
                 * ,الكافرين18
                 * ,المنافقون19
                 * ,الناس20
                 * ,قصة أدم21
                 * ,قصة موسى,قصة بني إسرائيل,طريقة تدبير القرآن22
                 * ,الفاسقون,عهد بني إسرائيل,الكتاب23
                 * ,الخٰشِعينَ,الغَيبِ14
                 * ,بني إسرائيل-محمد25
                 * ,قوم محمد26
                 */ 
    public function run(): void
    {
        // truncate table data
        Schema::disableForeignKeyConstraints();
        Ayah::truncate();
        Schema::enableForeignKeyConstraints();
   
        // get data from csv file
        $csvFile = fopen(base_path("database/data/ayahs_all.csv"), "r");
        $firstline = true;
        $i = 0;
        while (($data = fgetcsv($csvFile)) !== FALSE) {

            // var_dump($firstline);
            // var_dump($data);

            if (!$firstline) {

                Ayah::create([
                    "surah_id"=>$data['7'],
                    "number"=>$data['0'],
                    "juz" =>$data['1'],
                    "manzil" => $data['2'],
                    "page" =>$data['3'],
                    "ruku" =>$data['4'],
                    "hizb_quarter" =>$data['5'],
                    "surah_number" =>$data['7'],
                    "number_in_surah" =>$data['8'],
                    "quran_simple" =>$data['9'],
                    "quran_simple_clean" =>$data['10'],
                    "quran_simple_enhanced" =>$data['11'],
                    "quran_simple_min" =>$data['12'],
                    "quran_uthmani_min" =>$data['13'],
                    "quran_uthmani" =>$data['14'],
                    "ar_muyassar" =>$data['15']
                ]);    
            }
            $firstline = false;
        }
   
        fclose($csvFile);


        $actions = ['index', 'show', 'create', 'store', 'edit', 'update', 'destroy', 'export', 'import'];
        foreach ($actions as $action) {
            $permissionName = $action . '-' . "AyahController";
            Permission::create(['name' => $permissionName, 'guard_name' => 'web']);
        }

        $memberRolePermissions = [
            "index-AyahController",
            "show-AyahController",
        ];

        $adminManagerRolePermissions = [
            'index-AyahController',
            'show-AyahController',
            'create-AyahController',
            'store-AyahController',
            'edit-AyahController',
            'update-AyahController',
            'destroy-AyahController',
            'export-AyahController',
            'import-AyahController'
        ];

        $membreRole = Role::where('name', User::MEMBRE)->first();
        $membreRole->givePermissionTo($memberRolePermissions);

        $chefRole = Role::where('name', User::ADMIN)->first();
        $chefRole->givePermissionTo($adminManagerRolePermissions);

    }
}