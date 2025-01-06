<?php

namespace App\Http\Controllers\V1;

use App\Actions\V1\Post\createPost;
use App\Actions\V1\Post\DeletePost;
use App\Actions\V1\Post\GetAllPosts;
use App\Actions\V1\Post\updatePost;
use App\DTO\V1\PostDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Post\StorePostRequest;
use App\Http\Requests\V1\Post\UpdatePostRequest;
use App\Http\Resources\V1\PostResource;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response as HttpResponse;
use Spatie\QueryBuilder\QueryBuilder;
use Symfony\Component\HttpFoundation\Response;

class PostController extends Controller
{
    public function index(GetAllPosts $action): JsonResponse
    {
        $posts = $action->handle();
        $result = PostResource::collection($posts);

        return response()->json($result, Response::HTTP_OK);
    }

    public function store(StorePostRequest $request, createPost $action): JsonResponse
    {
        $post = $action->handle(PostDTO::fromRequest($request->validated()));

        return response()->json($post, Response::HTTP_CREATED);
    }

    public function show(Post $post): JsonResponse
    {
        $post = PostResource::make($post);

        return response()->json($post, Response::HTTP_OK);
    }

    public function update(UpdatePostRequest $request, int $postId, updatePost $action): JsonResponse
    {
        $result = $action->handle($postId, PostDTO::fromRequest($request->validated()));

        return response()->json($result, Response::HTTP_OK);
    }

    public function destroy(int $postId, deletePost $action): HttpResponse
    {
        $action->handle($postId);

        return response()->noContent();
    }
}
