<?php

namespace App\Actions\V1\Post;

use App\DTO\V1\PostDTO;
use App\Models\Post;

class UpdatePost
{
    public function handle(int $id, PostDTO $postDTO): int
    {
        return Post::query()
                ->where('id', $id)
                ->update($postDTO->toArray());
    }
}
