<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // https://stackoverflow.com/questions/42244541/laravel-migration-error-syntax-error-or-access-violation-1071-specified-key-wa
        Schema::defaultStringLength(191);

        $migrationsPath = database_path('migrations');
        $paths = $this->getAllSubdirectoriesOptimized($migrationsPath);

        $this->loadMigrationsFrom($paths);
        Paginator::useBootstrap();
    }

    function getAllSubdirectoriesOptimized($dir)
    {
        $subdirectories = [];

        $items = scandir($dir);

        foreach ($items as $item) {
            if ($item !== '.' && $item !== '..') {
                $path = $dir . DIRECTORY_SEPARATOR . $item;
                if (is_dir($path)) {
                    $subdirectories[] = $path;
                    $subdirectoriesToAdd = $this->getAllSubdirectoriesOptimized($path);
                    foreach ($subdirectoriesToAdd as $subdirToAdd) {
                        $subdirectories[] = $subdirToAdd;
                    }
                }
            }
        }

        return $subdirectories;
    }
}
