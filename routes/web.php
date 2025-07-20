<?php

use App\Models\Ingredient;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

use function Pest\Laravel\post;

Route::prefix('api')->group(function () {
    require __DIR__.'/auth.php';
    require __DIR__.'/api.php';
    Route::middleware('auth:sanctum')->group(function () {
        require __DIR__.'/user.php';
    });
});

Route::get('/', function () {
    return Inertia::render('Home');
})->name('home');

Route::get('/login', function () {
    return Inertia::render('Login');
})->name('login');

Route::get('/register', function () {
    return Inertia::render('Register');
})->name('register');

Route::middleware('auth:sanctum')->group(function () {
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
});

Route::middleware('auth:sanctum', 'admin')->group(function () {
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
});
    
Route::get('/{any}', function () {
    return Inertia::render('PageNotFound');
})->where('any', '.*');