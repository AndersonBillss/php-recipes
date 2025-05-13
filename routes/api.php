<?php

use App\Http\Controllers\IngredientController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum, admin')->group(function () {
    Route::post("/ingredient", [IngredientController::class, "store"]);
});
