<?php

namespace Database\Seeders\Application;

use Illuminate\Database\Seeder;
use App\Models\Autorisation\Role;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;

use App\Models\User;
use App\Models\Application\Page;
use Psy\Readline\Hoa\Console;

class PageSeeder extends Seeder
{

    public function run(): void
    {
        // truncate table data
        Schema::disableForeignKeyConstraints();
        Page::truncate();
        Schema::enableForeignKeyConstraints();
   
        // get data from csv file
        $csvFile = fopen(base_path("database/data/pages.csv"), "r");
        $firstline = true;
        $i = 0;
        while (($data = fgetcsv($csvFile)) !== FALSE) {

            // var_dump($firstline);
            // var_dump($data);

            if (!$firstline) {

                Page::create([
                    "label"=>$data['0'],
                    "icon"=>$data['1'],
                    "route" =>$data['2'],
                    "permission" => $data['3'],
                ]);    
            }
            $firstline = false;
        }
   
        fclose($csvFile);
    }
}