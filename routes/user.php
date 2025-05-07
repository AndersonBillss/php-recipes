<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/user', fn (Request $request) => $request->user());