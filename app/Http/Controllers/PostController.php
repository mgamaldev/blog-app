<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Post;

class PostController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $posts = Post::query()
            ->when($request->category_id, function ($query, $categoryId) {
                return $query->where('category_id', $categoryId);
            })
            ->when($request->author_id, function ($query, $authorId) {
                return $query->where('author_id', $authorId);
            })
            ->paginate(15);

        return response()->json($posts, 200);
    }

    public function show(Post $post): JsonResponse
    {
        return response()->json($post, 200);
    }

    public function store(Request $request): JsonResponse
    {
        $post = Post::create($request);
        return response()->json($post, 201);
    }

    public function update(Request $request, Post $post): JsonResponse
    {
        $post->update($request);
        return response()->json($post, 200);
    }

    public function destroy(Post $post): JsonResponse
    {
        $post->delete();
        return response()->json(null, 204);
    }
}
