<?php

declare(strict_types=1);

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LabelController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\Settings\PasswordController;
use App\Http\Middleware\IsAdminMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::get('/search', SearchController::class)->name('search');

Route::get('albums', [AlbumController::class, 'index'])->name('albums.index');
Route::get('albums/{album}/show', [AlbumController::class, 'show'])->name('albums.show');

Route::get('artists', [ArtistController::class, 'index'])->name('artists.index');
Route::get('artists/{artist}/show', [ArtistController::class, 'show'])->name('artists.show');

Route::get('labels', [LabelController::class, 'index'])->name('labels.index')
    ->middleware('auth');
Route::get('labels/{label}/show', [LabelController::class, 'show'])->name('labels.show');

Auth::routes();

Route::get('settings/password-change', [PasswordController::class, 'edit'])
    ->name('settings.password-change');
Route::put('settings/password-change', [PasswordController::class, 'update']);

Route::group([
    'prefix'     => 'admin',
    'as'         => 'admin.',
    'namespace'  => 'App\Http\Controllers\Admin',
    'middleware' => [IsAdminMiddleware::class],
], function () {
    Route::resource('albums', \AlbumController::class);
    Route::resource('labels', \LabelController::class);
    Route::resource('artists', \ArtistController::class);
});

// home page, search
// in random order
// users crud
// crud search
// profile page
// api
// enum
// roles
