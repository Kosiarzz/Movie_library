<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\{Movie, Genre, Country, Person, MovieCast, Group, GroupMovie, MovieCategory, Category};

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeCustomMovie(Request $request)
    {
        $genre = Genre::firstOrCreate([
            'name' => $request->genre,
        ]);

        $country = Country::firstOrCreate([
            'name' => $request->country,
        ]);


        $movie = Movie::create([
            "title" =>  $request->title,
            "original_title" =>  $request->original_title,
            "year" =>  $request->year,
            "time" =>  $request->time,
            "rate" =>  $request->rate,
            "description" =>  $request->description,
            "genre_id" => $genre->id,
            "country_id" => $country->id,
            "watched" => $request->watched ? true : false,
            "user_id" => $request->user()->id,
            "img" => 'none',
            "votes" => 'prop. delete',
        ]);

        foreach($request->directors as $director)
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

        foreach($request->actors as $actor)
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

        foreach($request->categories as $category)
        {
            $fCategory = Category::firstOrCreate([
                'name' => $category,
            ]);  

            MovieCategory::create([
                'movie_id' => $movie->id,
                'category_id' => $fCategory->id,
            ]);
        }

        foreach($request->groups as $group)
        {
            GroupMovie::create([
                'movie_id' => $movie->id,
                'group_id' => $group,
            ]);
        }

        return redirect(route('movieShow', ['id' => $movie->id]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            
        $nameGroup = "Wszystkie filmy";

        if($request->type == "addMovie")
        {
            $nameGroup = "Wszystkie filmy";
        }
        else if($request->type == "addWatch")
        {
            $nameGroup = "Do obejrzenia";
        }
        else
        {
            $nameGroup = "Wszystkie filmy";
        }
        //Decode json data from sraped movie
        $data = json_decode($request->data, TRUE);

        //Add a movie genre
        $genre = Genre::firstOrCreate([
            'name' => $data['genres'],
        ]);

        //Add the country of production movie
        $country = Country::firstOrCreate([
            'name' => $data['country'],
        ]);

        //Save movie information
        $movie = new Movie;
        $movie->title = $data['title'];
        $movie->description = $data['description'];
        $movie->year = $data['year'];
        $movie->original_title = $data['original_title'];
        $movie->time = $data['time'];
        $movie->rate = $data['rate'];
        $movie->votes = $data['votes'];
        $movie->img = $data['img'];
        $movie->watched = false;
        $movie->genre_id = $genre->id;
        $movie->country_id = $country->id;
        $movie->user_id = 1;
        $movie->save();

        //Separation of people (actors)
        $cast = preg_replace('/([a-z])([A-Z])/', '$1 $2', $data['cast']);
        $castExplode = explode(" ", $cast, 10);

        for($i = 0; $i < count($castExplode); $i+=2)
        {
            //Save separated people
            $person = Person::firstOrCreate([
                'person' => $castExplode[$i].' '.$castExplode[$i+1],
            ]);

            //Assing a cast to a movie
            $movieCast = new MovieCast;
            $movieCast->role = "actor";
            $movieCast->person_id = $person->id;
            $movieCast->movie_id = $movie->id;
            $movieCast->save();
        }

        //Separation of people (directors)
        $directors = preg_replace('/([a-z])([A-Z])/', '$1 $2', $data['directors']);
        $directorsExplode = explode(" ", $directors, 10);

        for($i = 0; $i < count($directorsExplode); $i+=2)
        {
            //Save separated people
            $person = Person::firstOrCreate([
                'person' => $directorsExplode[$i].' '.$directorsExplode[$i+1],
            ]);

            //Assing a cast to a movie
            $movieCast = new MovieCast;
            $movieCast->role = "director";
            $movieCast->person_id = $person->id;
            $movieCast->movie_id = $movie->id;
            $movieCast->save();
        }

        //Get the id of the default group
        $group = Group::firstOrCreate([
            'name' => $nameGroup,
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

        return redirect(route('main.home'));
    }
}
