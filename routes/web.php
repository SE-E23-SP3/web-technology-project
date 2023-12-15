<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GenreController;

use App\Http\Controllers\CarouselController;
use App\Http\Controllers\CategoryController;
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





Route::controller(AuthController::class)
->group(function(){
    Route::prefix("signup")
    ->group(function(){
        Route::get('/', 'viewSignup')->name("signup");

        Route::post('submit', 'submitSignup');

        Route::get('hello', 'hello');
    });

    Route::prefix("login")
    ->group(function(){
        Route::get('/', 'viewLogin')->name("login");

        Route::post('submit', 'submitLogin');

        Route::get('hello', 'hello');
    });

    Route::any('logout', 'logout')->name('logout');
});
Route::get('/', [CategoryController::class, 'movieCategory'])->name('welcome');

Route::get('/api/movies', [CarouselController::class, 'getMovieInfo']);



Route::get('/hello', function () {
    return view('hello');
});
Route::get('/secure', function() {
    return view('hello');
})->middleware('auth');

Route::get('/user-profile', function () {
    return view('/user-profile/user-profile');
}) -> name('user-profile');

Route::get('/top-rated', function () {
    return view('/top-rated');
}) -> name('top-rated');

Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

//Only individuel underneath here:
Route::get('/watchlist', [GenreController::class, 'yourWatchlist'])->name('watchlist');






// A heallth check endpoint to verify that the service is up and running
Route::get('/health', function () {
    return "ok";
});
