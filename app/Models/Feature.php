<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Feature extends Model
{
    use HasFactory;

    protected $fillable = ['category', 'title', 'subtitle', 'description', 'image', 'order_index'];

    public function cards()
    {
        return $this->hasMany(FeatureCard::class)->orderBy('order_index');
    }
}