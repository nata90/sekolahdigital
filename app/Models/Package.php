<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'price_display', 'timeline', 'highlight', 'description',
        'included', 'not_included', 'cta_text', 'is_popular', 'is_active', 'sort_order',
    ];

    protected $casts = [
        'included' => 'array',
        'not_included' => 'array',
        'is_popular' => 'boolean',
        'is_active' => 'boolean',
    ];
}