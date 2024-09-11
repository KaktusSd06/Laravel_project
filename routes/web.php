<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\LabController;

Route::get('/lab1', [LabController::class, 'index']);
Route::get('/about', [LabController::class, 'about']);
Route::get('/contact', [LabController::class, 'contact']);
Route::get('/hobby', [LabController::class, 'hobby']);

// Route::get('/about', [LabController::class, 'about'])->middleware('check.age');