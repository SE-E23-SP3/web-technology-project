<?php
namespace App\Http\Controllers;

use App\Models\Movie;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;   
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\Response;

class addToWatchlistController extends Controller
{
public function addMovieToWatchlist(Request $request, Movie $movie) {
    $user = auth()->user();

    if ($user != NULL) {
        $user->addMovieToWatchlist($movie);
        return redirect()->back()->with('message', 'Movie added to watchlist!');
    } else{
        abort(Response::HTTP_NOT_FOUND, 'User not found');
    }
}
}