<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\CarouselController;
use App\Http\Controllers\CategoryController;
use App\Http\Middleware\NoAuthenticated;
use App\Http\Controllers\MovieInfoController;
use App\Http\Controllers\addToWatchlistController;
use App\Http\Controllers\RateMovieController;
use App\Http\Controllers\UserProfileController;
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
->middleware(NoAuthenticated::class)
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

    Route::any('logout', 'logout')->withoutMiddleware(NoAuthenticated::class)->name('logout');
});


Route::controller(AccountController::class)
->prefix('account')
->middleware('auth')
->group(function() {
    Route::get('/', 'viewAccount')->name('account');
    Route::get('debug', 'debug');

    Route::prefix("submit")
    ->group(function() {
        Route::delete('delete', 'deleteUser');
        Route::put('updateusername', 'updateUsername');
        Route::put('updateemail', 'updateEmail');
        Route::put('updatepassword', 'updatePassword');
    });
});



Route::get('/hello', function () {
    return view('hello');
});
Route::get('/secure', function() {
    return view('hello');
})->middleware('auth');






Route::get('/', [CategoryController::class, 'movieCategory'])->name('welcome');

Route::get('/api/movies', [CarouselController::class, 'getMovieInfo']);










// A heallth check endpoint to verify that the service is up and running
Route::get('/health', function () {
    return "ok";
});

Route::get('/movie/default', function () {
    return view('movies/movieinfo');
})->name('Movie Info');

Route::get('/movie/{id}', [MovieInfoController::class, 'movieInfo']) ->name('movie-id');

Route::post('/watchlist/add/{movie}', [addToWatchlistController::class, 'addMovieToWatchlist'])->name('watchlist.add')->middleware('auth');

Route::post('/movies/{movie}/rate', [rateMovieController::class, 'rate'])->name('movies.rate');

Route::get('/user-profile', [UserProfileController::class, 'getUserRatedMovies'])->name('user-profile');

Route::get('watchlist', function(){return View('user-profile-page/your-watchlist');})->name('watchlist');




