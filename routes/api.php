<?php

use App\Http\Controllers\IngredientController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\UnitController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum, admin')->group(function () {
    Route::post("/ingredient", [IngredientController::class, "store"]);
    Route::post("/unit", [UnitController::class, "store"]);
});
Route::middleware('auth:sanctum')->group(function () {
    Route::post("/recipe", [RecipeController::class, "store"]);
});
