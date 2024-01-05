<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;

Route::get('/', [ContactController::class, "show"])->name("form.show");
Route::post('/confirm', [ContactController::class, "confirm"])->name("form.confirm");
Route::post('/thanks', [ContactController::class, "send"])->name("form.send");


Route::middleware('auth')->group(function () {
    Route::get('/management', [ContactController::class, 'manage']);
});

Route::post('/management', [ContactController::class, "manage"])->name("form.manage");
Route::get('/search', [ContactController::class, "search"])->name("form.search");
Route::post('/search', [ContactController::class, "search"])->name("form.search");
Route::post('/delete', [ContactController::class, "delete"])->name("form.delete");
Route::post('/login',[ContactController::class,'manage']);
Route::post('/register',[ContactController::class,'register']);