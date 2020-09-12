<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $casts = [
        'short_description' => 'array',
        'description' => 'array'
    ];
}
