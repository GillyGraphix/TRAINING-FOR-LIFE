<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Programme extends Model
{
    protected $fillable = [
        'title', 'slug', 'subtitle', 'summary', 'sections', 'image', 'is_active', 'order',
    ];

    protected $casts = [
        'sections' => 'array',
        'is_active' => 'boolean',
    ];
}