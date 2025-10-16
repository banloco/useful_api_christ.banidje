<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UrlShorten extends Model
{
    protected $fillable = [
        'user_id',
        'original_url',
        'code',
        'clicks',
    ];
}
