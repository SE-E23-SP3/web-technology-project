<?php
namespace App\Http\Controllers;

use App\Models\Movie;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;   
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class addToWatchlistController extends Controller
{
public function addMovieToWatchlist(Request $request, Movie $movie) {
    $user = auth()->user();

    if ($user) {
        $user->addMovieToWatchlist($movie);
        return redirect()->back()->with('message', 'Movie added to watchlist!');
    } else {
        return redirect()->back()->with('error', 'User not found!');
    }
}
}