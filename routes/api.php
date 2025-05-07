<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloController;

Route::get('/hello', [HelloController::class, 'create']);

Route::post('/register', [AuthController::class, 'register']);