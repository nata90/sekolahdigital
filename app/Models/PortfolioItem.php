<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'school_type', 'region', 'thumbnail', 'slug',
        'description', 'features', 'live_url', 'is_published', 'sort_order',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'features' => 'array',
    ];
}