<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeadershipTeam extends Model
{
    protected $table = "leadership_team";
    protected $fillable = ['name', 'position', 'description', 'image'];
}
