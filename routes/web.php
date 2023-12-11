<?php

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

Route::get('/', function () {
    return view('welcome');
})-> name("Welcome");

Route::get('/login', function (){
    return view('/account/login');
}) -> name("login");

Route::get('/signup', function(){
    return view('/account/signup');
})-> name("signup");


Route::get('/hello', function () {
    return view('hello');
});

//Route til watchlist
Route::get('/watchlist', function () {
    return view('/user-profile-page/your-watchlist');
})-> name("watchlist");


Route::get('/user-profile', function () {
    return view('/user-profile/user-profile');
}) -> name('user-profile');

Route::get('/top-rated', function () {
    return view('/top-rated');
}) -> name('top-rated');

Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

//Only individuel underneath here:
Route::get('/your-watchlist', [GenreController::class, 'yourWatchlist'])->name('your-watchlist');






// A heallth check endpoint to verify that the service is up and running
Route::get('/health', function () {
    return "ok";
});
