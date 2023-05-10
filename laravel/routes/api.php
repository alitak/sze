<?php

use App\Http\Controllers\Api\JobsController;
use Illuminate\Support\Facades\Route;

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::get('jobs', JobsController::class);
