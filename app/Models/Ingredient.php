<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ingredient extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'creation_time', 'title', 'description', 'steps'];

    protected $casts = [
        'creation_time' => 'date',
        'steps' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function recipes()
    {
        return $this->belongsToMany(Recipe::class)
                    ->withPivot('quantity', 'unit_id')
                    ->withTimestamps();
    }
}
