<?php
namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller; 

class GenreController extends Controller
{
    public function yourWatchlist()
    {
        $movies = Movie::all();
        return view('user-profile-page.your-watchlist', ['movies' => $movies]);
    }
}
?>
