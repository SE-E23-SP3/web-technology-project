<?php
namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Routing\Controller;
use App\Models\CrewType;
use Symfony\Component\HttpFoundation\Response;

class MovieInfoController extends Controller
{
        public function movieInfo($id)
        {
            $crewTypes = CrewType::all();
            $movie = Movie::with('roles', 'ratings', 'crew')->find($id);
            if($movie != NULL) {
            return view('movies/movieinfo', ['movie' => $movie])
                ->with('crewTypes', $crewTypes);
            } else{
                abort(Response::HTTP_NOT_FOUND, 'Movie not found');
            }
            
        }
}
?>