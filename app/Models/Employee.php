<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'can_do',
        'is_active',
    ];

    // This tells Laravel to automatically handle the JSON conversion
    protected $casts = [
        'can_do' => 'array',
        'is_active' => 'boolean',
    ];
}