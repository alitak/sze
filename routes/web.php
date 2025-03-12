<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LabelController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;


Route::get('/', HomeController::class)->name('home');

Route::get('albums', [AlbumController::class, 'index'])->name('albums.index');
Route::get('albums/{album}/show', [AlbumController::class, 'show'])->name('albums.show');

Route::get('artists', [ArtistController::class, 'index'])->name('artists.index');
Route::get('artists/{artist}/show', [ArtistController::class, 'show'])->name('artists.show');

Route::get('labels', [LabelController::class, 'index'])->name('labels.index');
Route::get('labels/{label}/show', [LabelController::class, 'show'])->name('labels.show');

Route::group([
    'middleware' => 'guest',
], function () {
    Route::group([
        'prefix' => 'register',
        'controller' => RegisterController::class,
        'as' => 'register.',
    ], function () {
        Route::get('', 'create')->name('create');
        Route::post('', 'store')->name('store');
    });

    Route::get('login', [SessionController::class, 'create'])->name('login.create');
    Route::post('login', [SessionController::class, 'store'])->name('login.store');
});

Route::delete('logout', [SessionController::class, 'destroy'])->name('login.destroy')->middleware('auth');
