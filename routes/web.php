<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\SettingController;

Route::get('/', function () {
    return view('index');
});

Route::post('/records/generate', [RecordController::class, 'generate'])->name('records.generate');
Route::post('/records/clear', [RecordController::class, 'clear'])->name('records.clear');
Route::post('/records/setSheetUrl', [SettingController::class, 'update'])->name('records.setSheetUrl');

Route::resource('records', RecordController::class);

