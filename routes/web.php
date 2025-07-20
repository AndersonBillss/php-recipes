<?php
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

require __DIR__ . '/auth.php';
Route::middleware('auth:sanctum')->group(function () {
    require __DIR__ . '/user.php';
});
Route::middleware('auth:sanctum', 'admin')->group(function () {
    require __DIR__ . '/admin.php';
});

Route::get('/', function () {
    return Inertia::render('Home');
})->name('home');

Route::get('/{any}', function () {
    return Inertia::render('PageNotFound');
})->where('any', '.*');
