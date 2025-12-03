<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Admin\HeaderImagesController;

class HeaderImages extends Model
{
    protected $fillable = ['title', 'description', 'sort_order', 'image'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (!$model->sort_order) {
                $model->sort_order = HeaderImagesController::max('sort_order') + 1;
            }
        });
    }
}
