<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutSection extends Model
{
    // database/migrations/xxxx_create_about_sections_table.php
    // Allow mass assignment for these fields
    protected $table = "about_sections";
    protected $fillable = ['type', 'title', 'description'];

}
