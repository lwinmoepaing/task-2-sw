<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Map extends Model
{
    use HasFactory;

    protected $fillable = [
        'url',
        'user_id',
    ];

    public function shops()
    {
        return $this->hasMany(Shop::class);
    }
}
