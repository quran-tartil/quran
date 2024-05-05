<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GestionProjets\TaskController;
use App\Http\Controllers\GestionProjets\ProjetController;


Route::group(['middleware' => ['auth']], function () {

    Route::resource('projets', ProjetController::class);
    Route::get('projets/export', [ProjetController::class, 'export'])->name('projets.export');
    Route::post('projets/import', [ProjetController::class, 'import'])->name('projets.import');
});

// // Auth::routes(['register' => false]);

