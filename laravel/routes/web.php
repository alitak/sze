<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    Post::factory()->count(50)->create();

    return view('welcome');
});

Route::get('posts', fn () => Post::all());
Route::get('posts/show/{post}', fn (Post $post) => $post);
