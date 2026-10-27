<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GalleryCategory extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'sort_order' => 'integer',
        'is_active' => 'boolean',
    ];

    /**
     * Picha zinazohusishwa na category hii.
     * GalleryImage huhifadhi slug ya category kwenye column ya "category".
     */
    public function images(): HasMany
    {
        return $this->hasMany(GalleryImage::class, 'category', 'slug');
    }
}