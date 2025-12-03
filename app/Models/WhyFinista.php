<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhyFinista extends Model
{
    protected $table = "why_finista";
    protected $fillable = ['icon', 'title', 'subtitle', 'border_color'];
}
