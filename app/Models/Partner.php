<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    // Table name (optional if it follows Laravel convention "partners")
    protected $table = 'partners';

    // Fillable fields for mass assignment
    protected $fillable = [
        'icon',
        'title',
        'subtitle',
        'type',
    ];

    // Optionally, if you want to cast created_at/updated_at automatically
    protected $dates = [
        'created_at',
        'updated_at',
    ];
}


