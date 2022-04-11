<?php

namespace App\Http\Controllers;
use App\Models\{Movie, Genre, Group};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FilterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function genreFilter($id)
    {
        //Download movies with the main category
        $movies = Movie::with(['genre'])->where('user_id', Auth::id())->where('genre_id', $id)->get();

        //Download all main categories
        $genres = Genre::all();

        return view('main.home', [
            'movies' => $movies,
            'genres' => $genres,
            'selectGenre' => $id,
        ]);
    }

}
