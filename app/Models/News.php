<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'type', 'title', 'slug', 'excerpt', 'body', 'image', 'file',
        'published_at', 'event_date', 'location', 'is_active',
        'video', 'youtube_url', 'video_source',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'published_at' => 'date',
        'event_date' => 'date',
    ];
}