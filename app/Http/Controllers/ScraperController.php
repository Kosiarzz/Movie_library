<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Extensions\Scraper;

class ScraperController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('scrapers.movie');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getMovies(Request $request)
    {
        $scraper = new Scraper();
        $movies = $scraper->getMovies($request->name);

        return view('scrapers.movie', ['movies' => $movies]);
    }
}
