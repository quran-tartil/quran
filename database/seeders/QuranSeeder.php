<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Symfony\Component\Uid\NilUuid;

use Database\Seeders\Quran\{
    RootSeeder,
    SurahSeeder,
    AyahSeeder,
    TopicCategorySeeder,
    TopicSeeder
};


class QuranSeeder extends Seeder
{

    public function run(): void
    {
        $this->call(QuranSeeder::Classes());
    }

    public static function Classes(): array
    {
        return [
            RootSeeder::class,
            SurahSeeder::class,
            AyahSeeder::class,
            TopicCategorySeeder::class,
            TopicSeeder::class
        ];
    }
}