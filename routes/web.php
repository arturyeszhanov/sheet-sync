<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\SettingController;

// Главная страница — список записей
Route::get('/', [RecordController::class, 'index'])->name('index');

// Специальные POST-маршруты
Route::post('/generate', [RecordController::class, 'generate'])->name('generate');
Route::post('/clear', [RecordController::class, 'clear'])->name('clear');
Route::post('/setSheetUrl', [SettingController::class, 'updateSheetUrl'])->name('setSheetUrl');
Route::delete('/sheet-url', [SettingController::class, 'deleteSheetUrl'])->name('deleteSheetUrl');


// CRUD-маршруты
Route::resource('records', RecordController::class)->except(['index']);


// Artisan-команда через веб
Route::get('/fetch/{count?}', function ($count = null) {
    $params = [];

    if ($count) {
        $params['--count'] = $count;
    }

    Artisan::call('sheets:fetch', $params);

    $output = Artisan::output();

    return response("<pre>$output</pre>");
});