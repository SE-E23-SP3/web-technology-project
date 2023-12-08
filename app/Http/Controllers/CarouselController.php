<?php
namespace app\Http\Controllers;

use App\Models\Movie;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller; 

class CarouselController extends Controller
{
    public function getMovieInfo()
    {
        $movies = Movie::select('title', 'poster_url', 'description')->take(5)->get();
        return response()->json($movies);
    }
}



?>