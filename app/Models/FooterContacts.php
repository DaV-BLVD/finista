<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FooterContacts extends Model
{
    protected $table = 'footer_contacts';
    protected $fillable = [
        'gmail',
        'phone_no',
        'address',
        'sort_order',
    ];
}
