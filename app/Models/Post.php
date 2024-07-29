<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property bool $published
 * @property Carbon $published_at
 *  
 */

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'published_at',
        'user_id',
        'title',
        'published',
        'content',
    ];

    protected $casts = [
        'published' => 'boolean',
        'published_at' => 'datetime',

    ];

    public function isPublished(): bool
    {
        return $this->published && $this->published_at;
    }
}
