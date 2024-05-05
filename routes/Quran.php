<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Quran\AyahController;
use App\Http\Controllers\Quran\SurahController;
use App\Http\Controllers\Quran\TopicCategoryController;

Route::group(['middleware' => ['auth']], function () {
    
    Route::resource('surahs', SurahController::class);
    Route::get('surahs/export', [SurahController::class, 'export'])->name('surahs.export');
    Route::post('surahs/import', [SurahController::class, 'import'])->name('surahs.import');

    Route::resource('ayahs', AyahController::class);
    Route::get('ayahs/export', [AyahController::class, 'export'])->name('ayahs.export');
    Route::post('ayahs/import', [AyahController::class, 'import'])->name('ayahs.import');

    Route::resource('topicCategories', TopicCategoryController::class);
    Route::get('topicCategories/export', [TopicCategoryController::class, 'export'])->name('topicCategories.export');
    Route::post('topicCategories/import', [TopicCategoryController::class, 'import'])->name('topicCategories.import');

});

// Auth::routes(['register' => false]);

