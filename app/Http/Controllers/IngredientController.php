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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->merge([
            'name' => strtolower($request->input('name'))
        ]);
        $validated = $request->validate([
            "name" => "required|string|max:255|unique:ingredients"
        ]);
        Ingredient::create([
            'name' => $validated['name'],
            'user_id' => $request->user()->id
        ]);

        return response()->json([
            'message' => 'Successfully added ingredient'
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
