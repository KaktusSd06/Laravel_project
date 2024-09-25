<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\LabController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\TrainingSessionController;
use App\Http\Controllers\UserController;

use App\Http\Middleware\CheckAge;

Route::get('/lab1', [LabController::class, 'index']);
Route::get('/about', [LabController::class, 'about'])->middleware(CheckAge::class);
Route::get('/contact', [LabController::class, 'contact']);
Route::get('/hobby', [LabController::class, 'hobby']);

Route::resource("feedback", FeedbackController::class);
Route::resource("membership", MembershipController::class);
Route::resource('products', ProductController::class);
Route::resource("purchase", PurchaseController::class);
Route::resource("trainer", TrainerController::class);
Route::resource('training_session', TrainingSessionController::class);
Route::resource('user', UserController::class);