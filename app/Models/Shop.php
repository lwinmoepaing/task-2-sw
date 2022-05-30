<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
        'map_position_x',
        'map_position_y',
        'shop_name',
        'shop_address',
        'map_id',
        'user_id'
    ];
}
