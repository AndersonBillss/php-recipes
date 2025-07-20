<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\UnitController;
use Illuminate\Support\Facades\Log;

Route::get('/admin', function (Request $request) {
    return Inertia::render('Admin', ['data' => $request->user()]);
});

Route::post("/ingredient", [IngredientController::class, "store"]);
Route::get('/ingredient', [IngredientController::class, "index"]);

Route::post("/unit", [UnitController::class, "store"]);
Route::get('/unit', [UnitController::class, "index"]);
