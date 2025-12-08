<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MapLocation extends Model
{
    protected $fillable = [
        'title',
        'latitude',
        'longitude',
        'sort_order',
    ];
}
