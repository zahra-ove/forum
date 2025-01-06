<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;

    protected $table = 'posts';
    protected $fillable = ['title', 'body', 'publish_at'];

    protected static function booted(): void
    {
        static::saving(function (Post $post) {
            $post->slug = Str::slug($post->title);
        });
    }


    /** ================================
     *
     *            Relations
     *
     * ================================*/

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
