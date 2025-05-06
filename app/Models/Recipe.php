<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'creation_date', 'title', 'description', 'steps'];

    protected $casts = [
        'creation_date' => 'date',
        'steps' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class)
                    ->withPivot('quantity', 'unit_id')
                    ->withTimestamps();
    }
}