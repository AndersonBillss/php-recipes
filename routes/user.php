<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Ingredient;
use App\Models\Unit;

Route::get('/user', fn(Request $request) => $request->user());
Route::get('/dashboard', function (Request $request) {
    return Inertia::render('Dashboard', ['data' => $request->user()]);
});
Route::get('/profile', function (Request $request) {
    return Inertia::render('Profile', ['data' => $request->user()]);
});
Route::get('/createRecipe', function (Request $request) {
    return Inertia::render('CreateRecipe', [
        'ingredients' => Ingredient::all(),
        'units' => Unit::all(),
        'user' => $request->user()
    ]);
});
