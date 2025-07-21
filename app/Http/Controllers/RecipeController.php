<?php

namespace App\Http\Controllers;

use App\Models\IngredientRecipe;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Inertia::render("Recipes");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            "title" => "required|string|max:255",
            "description" => "required|string|max:255",
            "ingredients" => "required|array|min:1",
            "ingredients.*.note" => "nullable|string",
            "ingredients.*.amount" => "required|numeric|min:0.01",
            "ingredients.*.unit.id" => "nullable|exists:units,id",
            "ingredients.*.ingredient.id" => "required|exists:ingredients,id",
            "steps" => "required|array|min:1",
            "steps.*.title" => "required|string",
            "steps.*.text" => "required|string"
        ]);

        $recipe = Recipe::create([
            "user_id" => $request->user()["id"],
            "title" => $request["title"],
            "description" => $request["description"],
            "steps" => $request["steps"]
        ]);

        $ingredientRecipe = array_map(function ($item) use ($recipe) {
            return [
                "recipe_id" => $recipe["id"],
                "unit_id" => isset($item["unit"]["id"]) ? $item["unit"]["id"] : null,
                "ingredient_id" => $item["ingredient"]["id"],
                "quantity" => $item["amount"],
                "note" => $item["note"]
            ];
        }, $request["ingredients"]);
        
        IngredientRecipe::insert($ingredientRecipe);

        return response(NULL, 204);
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
