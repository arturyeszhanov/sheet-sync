<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\SettingController;

// Главная страница — список записей
Route::get('/', [RecordController::class, 'index'])->name('index');

// Специальные POST-маршруты
Route::post('/generate', [RecordController::class, 'generate'])->name('generate');
Route::post('/clear', [RecordController::class, 'clear'])->name('clear');
Route::post('/setSheetUrl', [SettingController::class, 'update'])->name('setSheetUrl');

// CRUD-маршруты
Route::resource('/', RecordController::class, [
    'except' => ['index'],
    'as' => '',
    'parameters' => ['' => 'record'],
]);

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