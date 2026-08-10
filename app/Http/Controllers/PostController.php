<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Post;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

use App\Http\Resources\PostResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PostController extends Controller
{
    public function index(Request $request): AnonymousResourceCollection
    {
        $posts = Post::query()
            ->when($request->category_id, function ($query, $categoryId) {
                return $query->where('category_id', $categoryId);
            })
            ->when($request->author_id, function ($query, $authorId) {
                return $query->where('author_id', $authorId);
            })
            ->paginate(15);

        return PostResource::collection($posts);
    }

    public function show(Post $post): PostResource
    {
        $post->load(['category', 'author']);
        return new PostResource($post);
    }

    public function store(StorePostRequest $request): PostResource
    {
        $validated = $request->validated();
        $validated['author_id'] = $request->user()->id;
        $post = Post::create($validated);
        return new PostResource($post);
    }

    public function update(UpdatePostRequest $request, Post $post): PostResource
    {
        $this->authorize('update', $post);
        $post->update($request->validated());
        return new PostResource($post);
    }

    public function destroy(Post $post): JsonResponse
    {
        $this->authorize('delete', $post);
        $post->delete();
        return response()->json(null, 204);
    }
}
