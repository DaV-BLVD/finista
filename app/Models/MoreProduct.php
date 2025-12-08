<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MoreProduct extends Model
{
    protected $fillable = [
        'type',
        'title',
        'description',
        'icon',
        'image',
        'color',
        'column_span',
        'button_text',
        'button_url',
        'order_index',
    ];
}
