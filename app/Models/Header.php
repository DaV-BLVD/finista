<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Header extends Model
{
    protected $fillable = [
        'page',
        'badge_text',
        'title',
        'subtitle',
        'description',
        'button1_text',
        'button1_link',
        'button2_text',
        'button2_link',
        'image',
    ];
}
