<?php

namespace App\Actions\V1\Post;

use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;
use Spatie\QueryBuilder\QueryBuilder;

class GetAllPosts
{
    public function handle(): Collection
    {
        return QueryBuilder::for(Post::class)
            ->allowedFilters('title')
            ->allowedIncludes('comments')
            ->allowedSorts('created_at')
            ->get();
    }
}
