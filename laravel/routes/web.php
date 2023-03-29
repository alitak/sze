<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

//    Post::factory()->count(50)->create();

    return view('welcome');
});

Route::get('posts', function () {
//    return Post::with('user')->get();
    $output = '';
    foreach (Post::get()->load('user') as $post) {
        $output .= '<h2>'.$post->title.'</h2>'.'<h3>'.$post->user->name.'</h3>';
    }
    return $output;
});

Route::get('posts/show/{post}', function (Post $post) {
    return '<h1>'.$post->title.'</h1>'.'<h3>'.$post->user->name.'</h3>';
//    return $post->user;
});
