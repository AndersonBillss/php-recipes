<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class IngredientRecipe extends Pivot
{
    protected $table = 'ingredient_recipe';

    protected $fillable = ['recipe_id', 'ingredient_id', 'unit_id', 'quantity'];
}
