<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\CarouselController;
use App\Http\Controllers\CategoryController;
use App\Http\Middleware\NoAuthenticated;
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
