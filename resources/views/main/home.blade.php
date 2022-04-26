@extends('layouts.app')

@section('content')
<div class="p-0" style="width:100%;">
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
                    <img src="{{ $movie->img }}" alt="Zdjęcie">
                    <div class="movie-info">
                        <div class="movie-rate" title="Ocena">
                            {{ $movie->rate }}
                        </div>
                        <div class="movie-time" title="Czas trwania">
                            {{ $movie->time }}
                        </div>
                    </div>
                    <div class="watched" title="Obejrzane">
                        @if ($movie->watched)
                            <svg class="bi" width="28" height="28" role="img" aria-label="Obejrzane"><use xlink:href="#watched"/></svg>
                        @endif
                    </div> 
                </div>
                <div class="movie-info">
                    <div class="movie-main-category" title="Gatunek">
                        {{ $movie->genre->name }}
                    </div>
                    <div class="movie-year" title="Rok premiery">
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