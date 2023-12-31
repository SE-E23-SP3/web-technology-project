<?php
namespace App\Http\Controllers;

use App\Models\Movie;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;   
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\Response;

class RateMovieController extends Controller
{
public function rate(Request $request, Movie $movie)
{
    $rating = $request->input('rating');
    $user = auth()->user();
    if ($user != NULL) {

        $movie->addRating($user, $rating);

        return back()->with('message', 'Movie rated!');
    } else{
        abort(Response::HTTP_NOT_FOUND, 'User not found');
    }
}
}