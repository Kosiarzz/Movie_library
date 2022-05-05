<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\{StoreCustomMovieRequest, StoreAjaxMovieRequest};

use App\Models\{Movie, Genre, Country, Person, MovieCast, Group, GroupMovie, MovieCategory, Category};
use App\Extensions\Movies;

use Barryvdh\Debugbar\Facades\Debugbar;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('movies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreCustomMovieRequest $request
     * @return \Illuminate\Http\Response
     */
    public function storeCustomMovie(StoreCustomMovieRequest $request)
    {
        
        $dataMovie = $request->validated();

        $genre = Genre::firstOrCreate([
            'name' => $dataMovie['genre'],
        ]);

        $country = Country::firstOrCreate([
            'name' => $dataMovie['country'],
        ]);

        $img = '';
        
        if($request->hasFile('imgFile'))
        {
            //Image file
            $img = $request->file('imgFile')->store('movies');
        }
        else if(!is_null($dataMovie['imgLink']))
        {
            //Image link
            $img = $dataMovie['imgLink'];
        }
        else
        {
            //No image
            $img = null;
        }

        $movie = Movie::create([
            "title" =>  $dataMovie['title'],
            "original_title" =>  $dataMovie['original_title'],
            "year" =>  $dataMovie['year'],
            "time" =>  $dataMovie['time'],
            "rate" =>  $dataMovie['rate'],
            "description" => $dataMovie['description'],
            "genre_id" => $genre->id,
            "country_id" => $country->id,
            "watched" => $dataMovie['watched'] ?? true,
            "user_id" => $request->user()->id,
            "img" => $img,
            "votes" => $dataMovie['votes'],
        ]);


        if(isset($dataMovie['directors'])){
            foreach($dataMovie['directors'] as $director)
            {
                $person = Person::firstOrCreate([
                    'person' => $director,
                ]);  

                MovieCast::create([
                    'movie_id' => $movie->id,
                    'person_id' => $person->id,
                    'role' => 'director',
                ]);
            }
        }

        if(isset($dataMovie['actors'])){
            foreach($dataMovie['actors'] as $actor)
            {
                $person = Person::firstOrCreate([
                    'person' => $actor,
                ]);  

                MovieCast::create([
                    'movie_id' => $movie->id,
                    'person_id' => $person->id,
                    'role' => 'actor',
                ]);
            }
        }

        if(isset($dataMovie['categories'])){
            foreach($dataMovie['categories'] as $category)
            {
                $fCategory = Category::firstOrCreate([
                    'name' => $category,
                ]);  

                MovieCategory::create([
                    'movie_id' => $movie->id,
                    'category_id' => $fCategory->id,
                ]);
            }
        }

        if(isset($dataMovie['groups'])){
            foreach($dataMovie['groups'] as $group)
            {
                GroupMovie::create([
                    'movie_id' => $movie->id,
                    'group_id' => $group,
                ]);
            }
        }
        
        if ($request->routeIs('storeScrapCustomMovie')) {

            return redirect()->back();
        }

        return redirect(route('movieShow', ['id' => $movie->id]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeAjaxMovie(Request $request)
    {  
        //Decode json data from sraped movie
        $json_decode = json_decode($request->data, TRUE);
        Debugbar::info($request);
        Debugbar::info("test");
        Debugbar::info($json_decode);

        $dataMovie = $json_decode;

        //Add a movie genre
        $genre = Genre::firstOrCreate([
            'name' => $dataMovie['genres'],
        ]);

        //Add the country of dataMovieion movie
        $country = Country::firstOrCreate([
            'name' => $dataMovie['country'],
        ]);
       
        
        //Save movie information
        $movie = new Movie;
        $movie->title = $dataMovie['title'];
        $movie->description = $dataMovie['description'];
        $movie->year = $dataMovie['year'];
        $movie->original_title = $dataMovie['original_title'];
        $movie->time = $dataMovie['time'];
        $movie->rate = $dataMovie['rate'];
        $movie->votes = $dataMovie['votes'];
        $movie->img = $dataMovie['img'];
        $movie->watched = false;
        $movie->genre_id = $genre->id;
        $movie->country_id = $country->id;
        $movie->user_id = $request->user()->id;
        $movie->save();

        //Separation of people (actors)
        $movies = new Movies();
        $castExplode = $movies->getCastWithoutSpaces($dataMovie['cast']);

        for($i = 0; $i < count($castExplode); $i++)
        {
            //Save separated people
            $person = Person::firstOrCreate([
                'person' => $castExplode[$i],
            ]);

            //Assing a cast to a movie
            $movieCast = new MovieCast;
            $movieCast->role = "actor";
            $movieCast->person_id = $person->id;
            $movieCast->movie_id = $movie->id;
            $movieCast->save();
        }

        //Separation of people (directors)
        $directorsExplode = $movies->getCastWithoutSpaces($dataMovie['directors']);

        for($i = 0; $i < count($directorsExplode); $i+=2)
        {
            //Save separated people
            $person = Person::firstOrCreate([
                'person' => $directorsExplode[$i],
            ]);

            //Assing a cast to a movie
            $movieCast = new MovieCast;
            $movieCast->role = "director";
            $movieCast->person_id = $person->id;
            $movieCast->movie_id = $movie->id;
            $movieCast->save();
        }

        if($request->type == "addWatch")
        {
            //Get the id of the default group 'Do obejrzenia'
            $groupWatch = Group::firstOrCreate([
                'name' => 'Do obejrzenia',
                'type' => 'default',
                'user_id' => $request->user()->id,
            ]);

            GroupMovie::create([
                'movie_id' => $movie->id,
                'group_id' => $groupWatch->id,
            ]);
        }

        //Get the id of the default group 'Wszystkie filmy'
        $group = Group::firstOrCreate([
            'name' => 'Wszystkie filmy',
            'type' => 'default',
            'user_id' => $request->user()->id,
        ]);

        //Add the movie to the default group
        GroupMovie::create([
            'movie_id' => $movie->id,
            'group_id' => $group->id,
        ]);

        return response()->json(['success' => 'Film został dodany']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movie = Movie::with(['genre','movieCast.person'])->where('id', $id)->get();

        return view('movies.show', ['movie' => $movie]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movie = Movie::with(['genre', 'movieCast.person', 'country'])->where('id', $id)->get();
        $groups = GroupMovie::where('movie_id', $id)->get();
        $categories = MovieCategory::with('category')->where('movie_id', $id)->get();

        return view('movies.edit', [
            'movie' => $movie,
            'groups' => $groups,
            'categories' => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $genre = Genre::firstOrCreate([
            'name' => $request->genre,
        ]);

        $country = Country::firstOrCreate([
            'name' => $request->country,
        ]);


        Movie::where('id', $request->movie_id)->where('user_id', $request->user()->id)->update([
            "title" =>  $request->title,
            "original_title" =>  $request->original_title,
            "year" =>  $request->year,
            "time" =>  $request->time,
            "rate" =>  $request->rate,
            "description" =>  $request->description,
            "genre_id" => $genre->id,
            "country_id" => $country->id,
            "watched" => $request->watched ? true : false,
        ]);

        MovieCast::where('movie_id', $request->movie_id)->delete();

        foreach($request->directors as $director)
        {
            $person = Person::firstOrCreate([
                'person' => $director,
            ]);  

            MovieCast::create([
                'movie_id' => $request->movie_id,
                'person_id' => $person->id,
                'role' => 'director',
            ]);
        }

        foreach($request->actors as $actor)
        {
            $person = Person::firstOrCreate([
                'person' => $actor,
            ]);  

            MovieCast::create([
                'movie_id' => $request->movie_id,
                'person_id' => $person->id,
                'role' => 'actor',
            ]);
        }

        MovieCategory::where('movie_id', $request->movie_id)->delete();

        foreach($request->categories as $category)
        {
            $fCategory = Category::firstOrCreate([
                'name' => $category,
            ]);  

            MovieCategory::create([
                'movie_id' => $request->movie_id,
                'category_id' => $fCategory->id,
            ]);
        }

        GroupMovie::where('movie_id', $request->movie_id)->delete();
       
        foreach($request->groups as $group)
        {
            GroupMovie::create([
                'movie_id' => $request->movie_id,
                'group_id' => $group,
            ]);
        }

        return redirect(route('movieShow', ['id' => $request->movie_id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Movie::find($id)->delete();

        return redirect(route('home'));
    }
}
