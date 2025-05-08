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
    return Inertia::render('Login');
})->name('login');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/dashboard', function (Request $request) {        
        return Inertia::render('Dashboard', [
            'data' => $request->user()
        ]);
    });
});
    
Route::get('/{any}', function () {
    return Inertia::render('PageNotFound');
})->where('any', '.*');