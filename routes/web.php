<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::get('albums', [AlbumController::class, 'index']);
Route::get('albums/{id}/show', [AlbumController::class, 'show']);
