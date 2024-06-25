<?php

namespace Database\Seeders\Quran;

use Illuminate\Support\Facades\Schema;
use App\Models\Quran\Root;
use App\Models\Quran\Word;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Schema::disableForeignKeyConstraints();
        Word::truncate();
        Schema::enableForeignKeyConstraints();
   
        $csvFile = fopen(base_path("database/data/words.csv"), "r");
  
        $firstline = true;
        $i = 0;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {

                // printf($data['2']);
                // dd($data['2']);
                $root = Root::where("root",$data['2'])->first();
                $root_id = null;
                if($root != null){
                    $root_id = $root->id;
                }

                

                Word::create([
                    "code" =>$data['0'],
                    "number_occurrences" => $data['1'],
                    "root_id" => $root_id
                ]);    
            }
            $firstline = false;
        }
   
        fclose($csvFile);
    }
}
