<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;


Route::get('/', function () {
    return Inertia::render('App');
})->name('home');
    
Route::prefix('api')->group(function () {
    require __DIR__.'/auth.php';
    Route::middleware(['auth:sanctum'])->group(function () {
        require __DIR__.'/user.php';
    });
});