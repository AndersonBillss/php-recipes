<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;


Route::prefix('api')->group(function () {
    require __DIR__.'/auth.php';
    Route::middleware('auth:sanctum')->group(function () {
        require __DIR__.'/user.php';
    });
});

Route::get('/', function () {
    return Inertia::render('Home');
})->name('home');

Route::get('/login', function () {
    return Inertia::render('Login');
})->name('login');

Route::get('/register', function () {
    return Inertia::render('Register');
})->name('register');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/dashboard', function (Request $request) {        
        return Inertia::render('Dashboard', ['data' => $request->user()]);
    });
    Route::get('/profile', function (Request $request) {        
        return Inertia::render('Profile', ['data' => $request->user()]);
    });
});
Route::middleware('auth:sanctum', 'admin')->group(function () {
    Route::get('/admin', function (Request $request) {        
        return Inertia::render('Admin', ['data' => $request->user()]);
    });
});
    
Route::get('/{any}', function () {
    return Inertia::render('PageNotFound');
})->where('any', '.*');