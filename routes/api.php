<?php

use App\Http\Controllers\Api\AlbumController;
use App\Http\Controllers\Api\ArtistController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\SearchController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('albums', [AlbumController::class, 'index']);
Route::get('albums/{album}', [AlbumController::class, 'show']);

Route::get('artists', [ArtistController::class, 'index']);
Route::get('artists/{artist}', [ArtistController::class, 'show']);

Route::get('search', SearchController::class);
Route::get('home', HomeController::class);
