<?php

use App\Http\Controllers\Api\AlbumController;
use App\Http\Controllers\Api\ArtistController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\SearchController;
use App\Http\Middleware\ApiIsAdminMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/tokens/create', function (Request $request) {
    if (!Auth::attempt($request->only('email', 'password'))) {
        return response()->json(['error' => 'Email/password not valid'], 422);
    }

    $token = $request->user()->createToken($request->email . '-auth_token');

    return response()->json(['token' => $token->plainTextToken]);
});

//Route::post('albums', [\App\Http\Controllers\Admin\AlbumController::class, 'store'])->middleware(['auth:sanctum', ApiIsAdminMiddleware::class]);

//Route::apiResource('albums', AlbumController::class);
Route::group([
    'prefix' => 'albums',
    'controller' => AlbumController::class,
], static function () {
    Route::get('', 'index');
    Route::get('{album}', 'show');

    Route::group([
        'middleware' => ['auth:sanctum', ApiIsAdminMiddleware::class],
    ], static function () {
        Route::post('', 'store');
        Route::put('{album}', 'update');
        Route::delete('{album}', 'destroy');
    });
});

Route::get('artists', [ArtistController::class, 'index']);
Route::get('artists/{artist}', [ArtistController::class, 'show']);

Route::get('search', SearchController::class);
Route::get('home', HomeController::class);
