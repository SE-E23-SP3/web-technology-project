<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function getUserRatedMovies()
    {

        // Gets the authenticated user
        $user = Auth::user();

        // Check if the user has ratings
        $ratedMovies = $user->ratings ? $user->ratings : [];

        // If there are ratings, fetch them from the database
        if (!empty($ratedMovies)) {
            $ratedMovies = $user->ratings;  // Fetch ratings from the database
        }

        // Render the view with the fetched or empty ratings
        return view('user.rated-movies', ['ratedMovies' => $ratedMovies]);
        
    }
    
}