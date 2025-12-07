<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['title', 'subtitle', 'description', 'image', 'color', 'layout', 'order_index'];

    public function features()
    {
        return $this->hasMany(ProductFeature::class)->orderBy('order_index');
    }
}
