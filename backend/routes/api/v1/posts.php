<?php

use App\Http\Controllers\V1\PostController;
use Illuminate\Support\Facades\Route;

Route::get('posts/{post}/{slug?}', [PostController::class, 'show'])->name('posts.show');
Route::apiResource('posts', PostController::class)->only(['index', 'store', 'update', 'destroy']);

