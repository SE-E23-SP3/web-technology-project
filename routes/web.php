<?php

use Illuminate\Support\Facades\Route;

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



//Route::get('/', function (){return view('welcome');})->name('welcome');
Route::get('/', [CategoryController::class, 'movieCategory'])->name('welcome');

Route::get('/api/movies', [CarouselController::class, 'getMovieInfo']);

Route::get('/login', function (){
    return view('/account/login');
}) -> name("login");

Route::get('/signup', function(){
    return view('/account/signup');
})-> name("signup");


Route::get('/hello', function () {
    return view('hello');
});






// A heallth check endpoint to verify that the service is up and running
Route::get('/health', function () {
    return "ok";
});
