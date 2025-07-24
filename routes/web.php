<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\SettingController;
use Illuminate\Http\Request;

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

Route::get('/cron/sync', function (Request $request) {
    if ($request->query('key') !== env('CRON_SECRET')) {
        abort(403, 'Access denied');
    }

    Artisan::call('sheets:sync');

    return 'Google Sheet synced at ' . now();
});