<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\App;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Symfony\Component\Uid\NilUuid;

use Database\Seeders\Parameters\{
    ServicesTableSeeder
};


use Database\Seeders\Autorisation\{
    UserSeeder,
    RoleSeeder
};

use Database\Seeders\GestionProjets\{
    ProjetsSeeder,
    TasksSeeder,
};


use Database\Seeders\Quran\{
    RootSeeder,
    SurahSeeder,
    AyahSeeder,
    TopicCategorySeeder,
    TopicSeeder
};

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(AutorisationSeeder::class);
        $this->call(ParametersSeeder::class);
        $this->call(GestionProjetsSeeder::class);
        $this->call(QuranSeeder::class);
    }
}