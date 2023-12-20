<?php
namespace app\Http\Controllers;

use App\Models\Movie;
use App\Models\Genre;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller; 



class CategoryController extends Controller
{
    public function movieCategory()
    {
        $genres = Genre::with('movies')->get();
        return view('welcome', ['genres' => $genres]);
    }
}



?>