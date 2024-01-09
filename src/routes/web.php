<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;

Route::get('/', [ContactController::class, "show"])->name("form.show");
Route::post('/confirm', [ContactController::class, "confirm"])->name("form.confirm");
Route::post('/thanks', [ContactController::class, "send"])->name("form.send");
Route::post('/management', [ContactController::class, "manage"])->name("form.manage");
Route::get('/search', [ContactController::class, "search"])->name("form.search");
Route::post('/search', [ContactController::class, "search"])->name("form.search");
Route::post('/delete', [ContactController::class, "delete"])->name("form.delete");


Route::middleware('auth')->group(function () {
    Route::get('/management',[AuthController::class,'manage']);
});

Route::post('/logout',[AuthController::class,'logout']);