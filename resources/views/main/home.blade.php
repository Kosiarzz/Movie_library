@extends('layouts.app')

@section('content')
<div class="home-contener">
    <div class="top-category-contener m-0">
        <a href="{{route('home')}}" class="top-category @if($selectGenre == 0) active @endif">
            Wszystkie filmy
        </a>   
        @foreach ($genres as $genre)
            <a href="{{route('genreFilter', ['id' => $genre->id])}}" class="top-category  @if($genre->id == $selectGenre) active @endif">
                {{ $genre->name }}
            </a> 
        @endforeach
    </div>  
    <div class="movies-contener">
        @foreach ($movies as $movie)
            <a class="movie-card" href="{{route('movieShow', ['id' => $movie->id])}}">
                <div class="movie-image">
                    @if(is_null($movie->img))
                        <img src="{{asset('storage/default/default_movie_img.png')}}" alt="Zdjęcie">
                    @elseif(substr($movie->img, 0, 6) == "movies")
                        <img src="{{asset('storage/'.$movie->img)}}" alt="Zdjęcie">
                    @else
                        <img src="{{$movie->img}}" alt="Zdjęcie">
                    @endif
                    <div class="movie-info">
                        <div class="movie-rate" title="Ocena">
                            {{ $movie->rate }}
                        </div>
                        <div class="movie-time" title="Czas trwania">
                            {{ $movie->time }}
                        </div>
                    </div>
                    <div class="movie-watched" title="Obejrzane">
                        @if ($movie->watched)
                            <svg class="bi" width="28" height="28" role="img" aria-label="Obejrzane"><use xlink:href="#watched"/></svg>
                        @endif
                    </div> 
                </div>
                <div class="movie-info">
                    <div title="Gatunek">
                        {{ $movie->genre->name ?? '' }}
                    </div>
                    <div title="Rok premiery">
                        {{ $movie->year }}
                    </div>
                </div>
                <div class="movie-title" title="{{ $movie->title }}">
                    {{ $movie->title }}
                </div>
            </a>
        @endforeach
    </div>
</div>
@endsection
