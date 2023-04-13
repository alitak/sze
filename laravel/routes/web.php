<?php

use App\Http\Controllers\PostsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return redirect('/posts');
//});
Route::redirect('/', '/posts');

Route::get('posts', [PostsController::class, 'index']);
Route::get('posts/show/{post}', [PostsController::class, 'show']);

Route::get('register', [RegisterController::class, 'create']);
Route::post('register', [RegisterController::class, 'store']);

Route::get('login', [SessionsController::class, 'create']);
Route::post('login', [SessionsController::class, 'store']);
Route::delete('logout', [SessionsController::class, 'destroy']);
