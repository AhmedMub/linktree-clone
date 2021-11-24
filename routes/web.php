<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VisitController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('public_links.home');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

//linktree_clone.local/dashboard
Route::prefix('dashboard')->middleware(['auth'])->group(function () {

    Route::resource('links', LinkController::class);

    //user settings
    Route::prefix('settings')->group(function () {

        Route::get('edit', [UserController::class, 'edit']);
        Route::post('update', [UserController::class, 'update']);
    });
});


//to store the visits
Route::post('/visits/{link}', [VisitController::class, 'store']);

//linktree_clone/username
//*this is should be absolute last url, because laravel reads these route paths from the top down to decide when to render one, so if this slash anything route was before another defined route it would be the one to fire off the render, this called catch-all routes, and it should stay at the bottom of our routes
Route::get('/{user}', [UserController::class, 'show']);
