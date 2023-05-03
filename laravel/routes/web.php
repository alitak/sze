<?php

use App\Http\Controllers\Admin\JobsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\CheckAdminCompanyAdmin;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', HomeController::class);
Route::get('/home', HomeController::class)->name('home');

//Route::get('jobs/index', [JobsController::class, 'index'])->name('jobs.index');
//Route::get('jobs/{job}', [JobsController::class, 'show'])->name('jobs.show');
Route::resource('jobs', JobsController::class)
    ->middleware([CheckAdminCompanyAdmin::class]);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('t', function () {
    $tag = \App\Models\Tag::find(1);
    return $tag->jobs;


    $job = \App\Models\Job::find(1);
    return $job->tags;


//    return \App\Models\Post::factory()->create();
});
