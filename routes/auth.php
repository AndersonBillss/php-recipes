<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloController;

Route::middleware('guest')->group(function () {
    Route::get('hello', [HelloController::class, 'create'])
        ->name('hello');
});

