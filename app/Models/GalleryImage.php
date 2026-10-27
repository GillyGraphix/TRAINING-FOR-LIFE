<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GalleryImage extends Model
{
    protected $fillable = [
        'category',
        'image_path',
        'description',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'sort_order' => 'integer',
        'is_active' => 'boolean',
    ];

    /**
     * Category ya picha hii, inayolinganishwa kwa slug.
     */
    public function galleryCategory(): BelongsTo
    {
        return $this->belongsTo(GalleryCategory::class, 'category', 'slug');
    }
}