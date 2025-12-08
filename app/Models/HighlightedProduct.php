<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HighlightedProduct extends Model
{
    protected $table = "highlighted_products";
    protected $fillable = ['title', 'subtitle', 'description', 'features', 'image', 'order_index'];

    protected $casts = [
        'features' => 'array', // so $product->features returns an array
    ];
}
