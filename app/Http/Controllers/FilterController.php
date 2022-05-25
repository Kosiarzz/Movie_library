<?php

namespace App\Http\Controllers;
use App\Models\{Category, Movie, Genre, Group, Person};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Database\Eloquent\ModelNotFoundException;

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

        if(!is_null($request->group))
        {
            $group_id = $request->group;

            $query = $query->whereHas('movieGroup', function ($query) use($group_id) {
                $query->where('group_id', $group_id);
            });
        }

        if(!is_null($request->director))
        {
            try{
                $director = Person::where('person', 'LIKE', '%'.$request->director.'%')->firstOrFail();

                $query = $query->whereHas('movieCast', function ($query) use($director) {
                    $query->where('person_id', $director->id);
                });
            }
            catch(ModelNotFoundException $error)
            {
                return view('main.filters', [
                    'genres' => $genres,
                    'oldValues' => $request,
                ]);
            }
            
        }

        if(!is_null($request->actor))
        {
            try{
                $actor = Person::where('person', 'LIKE', '%'.$request->actor.'%')->firstOrFail();

                $query = $query->whereHas('movieCast', function ($query) use($actor) {
                    $query->where('person_id', $actor->id);
                });
            }
            catch(ModelNotFoundException $error)
            {
                return view('main.filters', [
                    'genres' => $genres,
                    'oldValues' => $request,
                ]);
            }
            
        }

        if(!is_null($request->category))
        {
            try{
                $category = Category::where('name', 'LIKE', '%'.$request->category.'%')->firstOrFail();

                $query = $query->whereHas('movieCategory', function ($query) use($category) {
                    $query->where('category_id', $category->id);
                });
            }
            catch(ModelNotFoundException $error)
            {
                return view('main.filters', [
                    'genres' => $genres,
                    'oldValues' => $request,
                ]);
            }
            
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
