<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Database\Seeders\Application\{
    PageSeeder
};

class ApplicationSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(ApplicationSeeder::Classes());
    }

    public static function Classes(): array
    {
        return [
            PageSeeder::class
        ];
    }
}
