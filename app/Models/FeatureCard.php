<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeatureCard extends Model
{
    protected $fillable = ['feature_id', 'title', 'description', 'order_index'];

    public function bullets()
    {
        return $this->hasMany(FeatureCardBullet::class)->orderBy('order_index');
    }
}