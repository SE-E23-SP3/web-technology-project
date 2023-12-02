<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignupController;

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
});



Route::controller(SignupController::class)
->prefix('signup')
->group(function(){
    Route::get('/', 'view')->name("signup");

    Route::post('submit', 'submit');

    Route::get('hello', 'hello');
});






Route::get('/hello', function () {
    return view('hello');
});






// A heallth check endpoint to verify that the service is up and running
Route::get('/health', function () {
    return "ok";
});
