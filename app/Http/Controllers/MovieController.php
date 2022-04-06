<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\{Movie, Genre, Country, Person, MovieCast};

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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = json_decode($request->data, TRUE);

        $genre = Genre::firstOrCreate([
            'name' => $data['genres'],
        ]);

        $country = Country::firstOrCreate([
            'name' => $data['country'],
        ]);

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

        $cast = preg_replace('/([a-z])([A-Z])/', '$1 $2', $data['cast']);
        $castExplode = explode(" ", $cast, 10);

        for($i = 0; $i < count($castExplode); $i+=2)
        {
            $person = Person::firstOrCreate([
                'person' => $castExplode[$i].' '.$castExplode[$i+1],
            ]);

            $movieCast = new MovieCast;
            $movieCast->role = "actor";
            $movieCast->person_id = $person->id;
            $movieCast->movie_id = $movie->id;
            $movieCast->save();
        }

        $directors = preg_replace('/([a-z])([A-Z])/', '$1 $2', $data['directors']);
        $directorsExplode = explode(" ", $directors, 10);

        for($i = 0; $i < count($directorsExplode); $i+=2)
        {
            $person = Person::firstOrCreate([
                'person' => $directorsExplode[$i].' '.$directorsExplode[$i+1],
            ]);

            $movieCast = new MovieCast;
            $movieCast->role = "director";
            $movieCast->person_id = $person->id;
            $movieCast->movie_id = $movie->id;
            $movieCast->save();
        }

        return response()->json(['success'=>'Film został dodany']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
