<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('App');
})->name('home');
    
Route::prefix('api')->group(function () {
    require __DIR__.'/api.php';
});