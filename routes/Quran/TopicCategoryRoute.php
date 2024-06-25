<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Quran\TopicCategoryController;

Route::group(['middleware' => ['auth']], function () {
    Route::resource('topicCategories', TopicCategoryController::class);
    Route::get('topicCategories/export', [TopicCategoryController::class, 'export'])->name('topicCategories.export');
    Route::post('topicCategories/import', [TopicCategoryController::class, 'import'])->name('topicCategories.import');
});