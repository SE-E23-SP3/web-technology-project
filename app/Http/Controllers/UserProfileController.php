<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

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
        $username = $user->username ?? 'Username';
        $memberSince = optional($user->created_at)->format('M d, Y') ?? Carbon::now()->format('M d, Y');

        if (empty($ratedMovies)) {
            return view('user-profile.user-profile', [
                'ratedMovies' => [],
                'username' => $username,
                'memberSince' => $memberSince,
            ]);
        }

        $ratedMovies = $user->ratings;

        return view('user-profile.user-profile', [
            'ratedMovies' => $ratedMovies,
            'username' => $username,
            'memberSince' => $memberSince,
        ]);
    }
}