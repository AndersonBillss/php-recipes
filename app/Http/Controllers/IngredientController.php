<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use Inertia\Inertia;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return Inertia::render('Ingredient', [
            'user' => $request->user(),
            'ingredients' => Ingredient::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->merge([
            'name' => trim(strtolower($request->input('name')))
        ]);
        $validated = $request->validate([
            "name" => "required|string|max:255|unique:ingredients"
        ]);
        Ingredient::create([
            'name' => $validated['name'],
            'user_id' => $request->user()->id
        ]);

        return response(null, 204);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
