<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\Ingredient;
use App\Models\Unit;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\UnitController;

Route::get('/admin', function (Request $request) {
    return Inertia::render('Admin', ['data' => $request->user()]);
});
Route::get('/createIngredient', function (Request $request) {
    return Inertia::render('CreateIngredient', [
        'user' => $request->user(),
        'ingredients' => Ingredient::all(),
    ]);
});
Route::get('/createUnit', function (Request $request) {
    return Inertia::render('CreateUnit', [
        'user' => $request->user(),
        'units' => Unit::all()
    ]);
});

Route::post("/ingredient", [IngredientController::class, "store"]);
Route::post("/unit", [UnitController::class, "store"]);
