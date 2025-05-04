<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloController;

Route::get('/hello', [HelloController::class, 'create'])
    ->name('hello');