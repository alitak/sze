<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class);

Route::get('albums', [AlbumController::class, 'index']);
Route::get('albums/{album}/show', [AlbumController::class, 'show']);

Route::get('artists', [ArtistController::class, 'index']);
Route::get('artists/{id}/show', [ArtistController::class, 'show']);
