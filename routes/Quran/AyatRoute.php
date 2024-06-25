<?php

use App\Http\Controllers\Quran\AyahController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Quran\NoteAyatController;


Route::group(['middleware' => ['auth']], function () {
    Route::resource('ayahs', AyahController::class);
    Route::get('ayahs/export', [AyahController::class, 'export'])->name('ayahs.export');
    Route::post('ayahs/import', [AyahController::class, 'import'])->name('ayahs.import');
});
