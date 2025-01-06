<?php

namespace App\Actions\V1\Post;

use App\DTO\V1\PostDTO;
use App\Models\Post;

class CreatePost
{
    public function handle(PostDTO $data): Post
    {
        return Post::create([
            ...$data->toArray(),
            'published' => $data->publish_at ? true : false,
        ]);
    }
}
