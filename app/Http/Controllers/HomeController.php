<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Movie, Genre, Group};
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the home
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function homeView()
    {
        //Download movies with the main category
        $movies = Movie::with(['genre'])->where('user_id', Auth::id())->orderByDesc('id')->get();

        //Download all genres
        $genres = Genre::all();

        return view('main.home', [
            'movies' => $movies,
            'genres' => $genres,
            'selectGenre' => 0, //default select all genres
        ]);
    }

    /**
     * Show the library
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function libraryView()
    {
        //Download groups movies with the main category
        $groups = Group::with(['groupMovie' => function($q) 
            {
                $q->with(['movie' => function($q) 
                    {
                        $q->with('genre');
                    }
                ])->orderByDesc('movie_id');
            }
            ])->where('user_id', Auth::id())->get();

        
        return view('main.library', [
            'groups' => $groups
        ]);
    }
}
