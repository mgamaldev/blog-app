<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class PostController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(['message' => 'ok']);
    }

    public function show(Post $post): JsonResponse
    {
        return response()->json($post);
    }

    public function store(Request $request): JsonResponse
    {
        return response()->json(['message' => 'ok']);
    }

    public function update(Request $request, string $id): JsonResponse
    {
        return response()->json(['message' => 'ok']);
    }

    public function destroy(string $id): JsonResponse
    {
        return response()->json(['message' => 'ok']);
    }
}
