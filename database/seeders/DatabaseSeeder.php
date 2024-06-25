<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

use Database\Seeders\Autorisation\{
    UserSeeder,
    RoleSeeder
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
        $this->call(QuranSeeder::class);
    }
}