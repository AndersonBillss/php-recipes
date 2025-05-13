<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'units' => Ingredient::all()
        ], 200); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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

        $ingredients = Ingredient::all();

        return response()->json([
            'message' => 'Successfully added ingredient',
            'ingredients' => $ingredients
        ], 201);
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
