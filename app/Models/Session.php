<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Session extends Model
{
    use HasFactory;

    public $incrementing = false; // ID is string

    protected $primaryKey = 'id';

    protected $keyType = 'string';

    protected $fillable = ['id', 'user_id', 'ip_address', 'last_activity'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
