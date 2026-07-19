<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;

Route::apiResource('posts', PostController::class);
Route::apiResource('categories', CategoryController::class);
