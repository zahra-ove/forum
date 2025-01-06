<?php

namespace App\Actions\V1\Post;

use App\Models\Post;

class DeletePost
{
    public function handle(int $id): int
    {
        return Post::query()
                ->where('id', $id)
                ->delete();
    }
}
