<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class UserProfileController extends Controller
{
    public function getUserRatedMovies()
    {
        $user = Auth::user();

        if (!$user) {
            // Handle the case where the user is not authenticated
            return redirect()->route('login'); // Redirect to login page or another appropriate action
        }

        $ratedMovies = $user->ratings ?? [];
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
}