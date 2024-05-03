<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Autorisation\RolesController;


Route::group(['middleware' => ['auth'], 'prefix' => 'Autorisations'], function () {


    // Routes for managing Roles
    Route::resource('/roles', RolesController::class);
    Route::get('roles/export', [RolesController::class, 'export'])->name('role.export');
    Route::post('roles/import', [RolesController::class, 'import'])->name('roles.import');

});

Auth::routes();
