<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CoreValue extends Model
{
    protected $table = 'core_values';
    protected $fillable = [
        'icon',
        'title',
        'description',
        'border_color',
        'icon_color',
    ];
}
