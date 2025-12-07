<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeatureCardBullet extends Model
{
    protected $fillable = ['feature_card_id', 'bullet', 'order_index'];
}