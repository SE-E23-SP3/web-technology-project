<?php
namespace App\Http\Controllers;

use App\Models\Movie;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;   
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;

class MovieInfoController extends Controller
{
        public function movieInfo($id)
        {
            $movie = Movie::with('roles', 'ratings', 'crew')->find($id);
            $averageRating = $movie->ratings->avg('movie_rating.rating');
            return view('movies/movieinfo', ['movie' => $movie]);
            
        }
}
?>