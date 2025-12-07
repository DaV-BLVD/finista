<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductFeature extends Model
{
    protected $fillable = ['product_id', 'feature', 'order_index'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
