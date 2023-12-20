<?php
namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Routing\Controller;
use App\Models\CrewType;

class MovieInfoController extends Controller
{
        public function movieInfo($id)
        {
            $crewTypes = CrewType::all();
            $movie = Movie::with('roles', 'ratings', 'crew')->find($id);
            return view('movies/movieinfo', ['movie' => $movie])
                ->with('crewTypes', $crewTypes);
            
        }
}
?>