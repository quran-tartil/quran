<?php

namespace App\Providers;

use App\Models\Application\Page;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // https://stackoverflow.com/questions/42244541/laravel-migration-error-syntax-error-or-access-violation-1071-specified-key-wa
        Schema::defaultStringLength(191);

        $migrationsPath = database_path('migrations');
        $paths = $this->getAllSubdirectoriesOptimized($migrationsPath);
        $this->loadMigrationsFrom($paths);

        // ??
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

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        // Autorisation pour Admin
        Gate::before(function ($user, $ability) {
            return $user->hasRole(User::ADMIN) ? true : null;
        });


        // TODO : à migrate dans un provider nommé : Menu

        $this->app['events']->listen(BuildingMenu::class, function (BuildingMenu $event) {

       

            $items = Page::all()->map(function ($page) use ($event) {
                $event->menu->add([
                    'text' => __($page->label) ,
                    'url' => route($page->route),
                    'icon' => $page->icon
                ]);
            });
        });



      

    }
}
