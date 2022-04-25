<?php

namespace App\Http\Controllers;
use App\Models\{Movie, Genre, Group, Person};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FilterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
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

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function filters(Request $request)
    {
        $genres = Genre::orderBy('name', 'ASC')->get();

        $query = Movie::query();
        $query = $query->with(['genre']);

        if(!is_null($request->title))
        {
            $query = $query->where('title', 'LIKE', '%'.$request->title.'%');
        }

        if(!is_null($request->genre))
        {
            $query = $query->where('genre_id', $request->genre);
        }

        if(!is_null($request->year))
        {
            $query = $query->where('year', $request->year);
        }

        if(!is_null($request->watched))
        {
            $query = $query->where('watched', ($request->watched == "yes") ? true : false);
        }

        if(!is_null($request->sort))
        {
            $query = $query->orderBy($request->sort, 'DESC');
        }

        return view('main.filters', [
            'genres' => $genres,
            'movies' => $query->paginate(100),
            'oldValues' => $request,
        ]);
    }
}
