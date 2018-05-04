<?php

namespace App\Http\Controllers\Web;

use App\Movie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MovieController extends Controller
{
    public function index(Request $request)
    {
        $list = Movie::where('id', '>', 0)->paginate();
        $carousels = $list->take(3);
        return view('web.movies.index', compact('list', 'carousels'));
    }
}
