<?php
namespace App\Http\Controllers;

use App\Models\Movie;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;   
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;

class Movieinfo extends Controller
{
        public function movieInfo($id)
        {
            $movie = Movie::find($id);
            return view('movies/movieinfo', ['movie' => $movie]);
        }
}
?>