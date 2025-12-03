<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stat extends Model
{
    // Table name (optional if following Laravel conventions)
    protected $table = 'stat';

    // Fillable fields for mass assignment
    protected $fillable = [
        'value',
        'label',
    ];

    // If you want to automatically manage created_at and updated_at
    public $timestamps = true;
}
