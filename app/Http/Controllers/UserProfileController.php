<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

use App\Models\Watchlist;
use App\Models\Genre;

class UserProfileController extends Controller
{
    public function getUserRatedMovies()
    {
        $user = Auth::user();

        if (!$user) {
            // Handle the case where the user is not authenticated
            return redirect()->route('login'); // Redirect to login page or another appropriate action
        }

        $ratedMovies = DB::table('movie_rating')
            ->join('movies', 'movie_rating.movie_id', '=', 'movies.id')
            ->where('movie_rating.user_id', $user->id)
            ->select('movies.*', 'movie_rating.rating')
            ->get();

        $watchlistMovies = DB::table('watchlist')
            ->join('movies', 'watchlist.movie_id', '=', 'movies.id')
            ->where('watchlist.user_id', $user->id)
            ->select('movies.*')
            ->get();

        $username = $user->username ?? 'Username';
        $memberSince = optional($user->created_at)->format('M d, Y') ?? Carbon::now()->format('M d, Y');

        if (empty($ratedMovies) && $watchlistMovies->isEmpty()) {
            return view('user-profile.user-profile', [
                'ratedMovies' => [],
                'watchlistMovies' => [],
                'username' => $username,
                'memberSince' => $memberSince,
            ]);
        }

        return view('user-profile.user-profile', [
            'ratedMovies' => $ratedMovies,
            'watchlistMovies' => $watchlistMovies,
            'username' => $username,
            'memberSince' => $memberSince,
        ]);
    }

public function getWatchlistedMovies()
{
    $user = Auth::user();

    if (!$user) {
        // Handle the case where the user is not authenticated
        return redirect()->route('login'); // Redirect to login page or another appropriate action
    }

    $genres = Genre::with('movies')->get();

    $watchlistMovies = DB::table('watchlist')
        ->join('movies', 'watchlist.movie_id', '=', 'movies.id')
        ->join('genre_movie', 'movies.id', '=', 'genre_movie.movie_id')
        ->join('genres', 'genre_movie.genre_id', '=', 'genres.id')
        ->where('watchlist.user_id', $user->id)
        ->select('movies.*', 'genres.genre_name')
        ->get();

    $username = $user->username ?? 'Username';
    $memberSince = optional($user->created_at)->format('M d, Y') ?? Carbon::now()->format('M d, Y');

    return view('user-profile-page.your-watchlist', [
        'watchlistMovies' => $watchlistMovies,
        'genres' => $genres
    ]);
}


    public function getRatedMovies()
    {
        $user = Auth::user();

        if (!$user) {
            // Handle the case where the user is not authenticated
            return redirect()->route('login'); // Redirect to login page or another appropriate action
        }

        $ratedMovies = DB::table('movie_rating')
            ->join('movies', 'movie_rating.movie_id', '=', 'movies.id')
            ->where('movie_rating.user_id', $user->id)
            ->select('movies.*', 'movie_rating.rating')
            ->get();

        return view('user-profile-page.your-rated-list', [
            'ratedMovies' => $ratedMovies,
        ]);
    }
}