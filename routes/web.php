<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;



/**
 * Load a route file.
 *
 * @param \SplFileInfo $file
 */
function loadRouteFile($file)
{
    

    $filePath = $file->getPathname();
    $routePath = 'routes' . DIRECTORY_SEPARATOR . $file->getRelativePathname();
    $middleware = getMiddleware($filePath);

    Route::middleware($middleware)->group(function () use ($filePath) {
        require $filePath;
    });
}

function getMiddleware($filePath)
{
    return ['web'];
}
/**
     * Load routes dynamically from the routes directory.
     */
function loadRoutes()
{
    // Load files and files in packages 
    $routeFiles = File::allFiles(base_path('routes'));
    foreach ($routeFiles as $file) {
        
        if($file->getRelativePathname() == "web.php") {continue;}
        loadRouteFile($file);
    }
}

loadRoutes();



Route::get('/', function () {
    return view('welcome');
});


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



