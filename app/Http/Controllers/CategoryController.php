<?php
namespace app\Http\Controllers;

use App\Models\Movie;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller; 

class CategoryController extends Controller
{
    public function movieCategory()
    {
        $categories = Movie::get();
        return view('welcome', ['categories' => $categories]);
    }
}



?>