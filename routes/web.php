<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\LabController;

use App\Http\Middleware\CheckAge;

Route::get('/lab1', [LabController::class, 'index']);
Route::get('/about', [LabController::class, 'about'])->middleware(CheckAge::class);
Route::get('/contact', [LabController::class, 'contact']);
Route::get('/hobby', [LabController::class, 'hobby']);

Route::resource("feedback", FeedbackController::class);
Route::resource("membership", MembershipController::class);
Route::resource("product", ProductController::class);
Route::resource("purchase", PurchaseController::class);
Route::resource("trainer", TrainerController::class);
Route::resource("trainersession", TrainerController::class);
Route::resource("user", UserController::class);

// Route::get('/about', [LabController::class, 'about'])->middleware('check.age');