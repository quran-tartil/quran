<?php

namespace Database\Seeders\Quran;

use Illuminate\Support\Facades\Schema;
use App\Models\Quran\Root;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RootSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Schema::disableForeignKeyConstraints();
        Root::truncate();
        Schema::enableForeignKeyConstraints();
   
        $csvFile = fopen(base_path("database/data/roots.csv"), "r");
  
        $firstline = true;
        $i = 0;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                Root::create([
                    "root" =>$data['1'],
                    "global_meaning" => $data['3'],
                    "quantity_words" =>$data['2']

                     
                ]);    
            }
            $firstline = false;
        }
   
        fclose($csvFile);
    }
}
