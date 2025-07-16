<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Advertisement extends Model
{
    protected $fillable = [
        'title', 'slug', 'description', 'price', 'currency', 'contact_name',
        'contact_email', 'contact_phone', 'location', 'images', 'category_id',
        'status', 'is_featured', 'expires_at'
    ];

    protected $casts = [
        'images' => 'array',
        'is_featured' => 'boolean',
        'expires_at' => 'datetime',
        'price' => 'decimal:2',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeRecent($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function getMainImageAttribute()
    {
        return $this->images ? $this->images[0] : '/images/no-image.jpg';
    }
}