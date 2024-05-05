<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Quran\TopicController;

Route::group(['middleware' => ['auth']], function () {
    Route::resource('topics', TopicController::class);
    Route::get('topics/export', [TopicController::class, 'export'])->name('topics.export');
    Route::post('topics/import', [TopicController::class, 'import'])->name('topics.import');
});