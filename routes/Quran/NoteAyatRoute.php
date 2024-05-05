<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Quran\NoteAyatController;

Route::group(['middleware' => ['auth']], function () {
    Route::resource('noteAyats', NoteAyatController::class);
    Route::get('noteAyats/export', [NoteAyatController::class, 'export'])->name('noteAyats.export');
    Route::post('noteAyats/import', [NoteAyatController::class, 'import'])->name('noteAyats.import');
});