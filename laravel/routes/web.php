<?php

use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return redirect('/posts');
//});
Route::redirect('/', '/posts');

Route::get('posts', [PostsController::class, 'index']);
Route::get('posts/show/{post}', [PostsController::class, 'show']);
