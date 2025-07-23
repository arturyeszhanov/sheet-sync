<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecordController;

Route::get('/', function () {
    return view('index');
});

Route::post('/records/generate', [RecordController::class, 'generate'])->name('records.generate');
Route::post('/records/clear', [RecordController::class, 'clear'])->name('records.clear');

Route::resource('records', RecordController::class);
Route::post('/records/setSheetUrl', [RecordController::class, 'setSheetUrl'])->name('records.setSheetUrl');
