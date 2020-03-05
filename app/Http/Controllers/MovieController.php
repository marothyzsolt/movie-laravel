<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PoLaKoSz\Mafab\Search;

class MovieController extends Controller
{
    public function index(Request $request)
    {
        return view('movies');
    }

    /*
     *  -id: "avatar-28342"
    -url: "https://www.mafab.hu/movies/avatar-28342.html"
    -hungarianTitle: "Avatar"
    -originalTitle: "Avatar"
    -year: 2009
    -thumbnailImage: "https://mafab.hu/static/thumb/w60/profiles/2014/293/06/28342_3.jpg"
     */
    public function search(Request $request)
    {
        $mafab = new Search();
        $movies = $mafab->search( $request->get('name') );

        return back()->withInput($request->all())->withMovies($movies);
    }
}
