<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\LabelController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('albums', [AlbumController::class, 'index'])->name('albums.index');
Route::get('albums/{album}/show', [AlbumController::class, 'show'])->name('albums.show');

Route::get('artists', [ArtistController::class, 'index'])->name('artists.index');
Route::get('artists/{artist}/show', [ArtistController::class, 'show'])->name('artists.show');

Route::get('labels', [LabelController::class, 'index'])->name('labels.index');
Route::get('labels/{label}/show', [LabelController::class, 'show'])->name('labels.show');

Auth::routes();

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'namespace' => 'App\Http\Controllers\Admin',
], function () {
    Route::resource('labels', \LabelController::class);
});

//Route::get('admin/labels', [\App\Http\Controllers\Admin\LabelController::class, 'index'])->name('admin.labels.index');
//Route::get('admin/labels/{label}/show', [\App\Http\Controllers\Admin\LabelController::class, 'show'])->name('admin.labels.show');
//Route::get('admin/labels/create', [\App\Http\Controllers\Admin\LabelController::class, 'create'])->name('admin.labels.create');
//Route::post('admin/labels', [\App\Http\Controllers\Admin\LabelController::class, 'store'])->name('admin.labels.store');
//Route::get('admin/labels/{label}/edit', [\App\Http\Controllers\Admin\LabelController::class, 'edit'])->name('admin.labels.edit');
//Route::put('admin/labels/{label}', [\App\Http\Controllers\Admin\LabelController::class, 'update'])->name('admin.labels.update');
//Route::delete('admin/labels/{label}', [\App\Http\Controllers\Admin\LabelController::class, 'destroy'])->name('admin.labels.destroy');

