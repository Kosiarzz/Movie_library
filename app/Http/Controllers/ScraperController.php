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
    public function getMovies(string $name)
    {
        $scraper = new Scraper();
        $movies = $scraper->getMovies($name);

        return view('x', ['movies' => $movies]);
    }
}
