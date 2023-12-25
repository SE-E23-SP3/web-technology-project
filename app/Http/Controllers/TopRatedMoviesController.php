<?php
namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Genre;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;   
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TopRatedMoviesController extends Controller
{
    public function topByRating(Request $request)
{
    $order = $request->input('order', 'desc');
    $selectedGenre = $request->input('selectedGenre', 'Default');
    session(['selectedGenre' => $selectedGenre]);

    $query = Movie::select(
        'movies.*',
        \DB::raw('AVG(movie_rating.rating) as avg_rating')
    )
        ->with(['genres', 'crew', 'ratings'])
        ->leftJoin('movie_rating', 'movies.id', '=', 'movie_rating.movie_id')
        ->groupBy('movies.id');

    if ($selectedGenre && $selectedGenre !== 'Default') {
        $query->whereHas('genres', function ($query) use ($selectedGenre) {
            $query->where('genres.id', $selectedGenre);
        });
    }

    if ($order == 'desc') {
        $query->orderByDesc('avg_rating');
    } elseif ($order == 'asc') {
        $query->orderBy('avg_rating');
    }

    $topRatedMovies = $query->paginate(10);
        $genres = Genre::select('id', 'genre_name')->distinct()->get();

        $topRatedMovies->withPath(route('top-charts', [
            'order' => $order,
            'selectedGenre' => $selectedGenre,
            'page' => $topRatedMovies->currentPage(),
        ]));

        return view('top-rated', [
            'topRatedMovies' => $topRatedMovies,
            'currentOrder' => $order,
            'genres' => $genres,
            'selectedGenre' => $selectedGenre,
        ]);
    }
}