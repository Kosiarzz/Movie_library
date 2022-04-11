@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
      <a href="{{ route('editMovie', ['id' => $movie[0]->id]) }}">Edycja</a>
      <div class="movieBox">
        <div class="movieImage">
          <img src="{{ $movie[0]->img }}" alt="Zdjęcie" />
        </div>  
        <div class="movieInfo">
          <div class="movieTitle">
            {{ $movie[0]->title }}
          </div>  
          <div class="movieOriginalTitle">
            {{ $movie[0]->original_title }}
          </div> 
          <div class="movieGenres">
            {{ $movie[0]->genre->name }}
          </div> 
          <div class="movieStats">
            <div class="movieYear">
              <svg class="bi" width="16" height="16" role="img" aria-label="Wyszukaj"><use xlink:href="#calendarr"/></svg> {{ $movie[0]->year }}
            </div> 
            <div class="movieTime">
              <svg class="bi" width="16" height="16" role="img" aria-label="Wyszukaj"><use xlink:href="#timeee"/></svg>  {{ $movie[0]->time }} 
            </div> 
            <div class="movieRate"> 
              <svg class="bi" width="20" height="20" role="img" aria-label="Biblioteka"><use xlink:href="#star"/></svg>  {{ $movie[0]->rate }}
            </div> 
          </div>  
          <div class="movieDescription">
            {{ $movie[0]->description }}
          </div> 
          <div class="movieBottom">
            <div class="movieBottomLeft">
              <div class="movieDirectors mt-2">
                Reżyser: 
                @foreach ($movie[0]->movieCast as $director)
                  @continue($director->role == "actor")
                  {{ $director->person->person }},
                @endforeach
              </div>
              <div class="movieActors">
                Aktorzy: 
                @foreach ($movie[0]->movieCast as $actor)
                  @continue($actor->role == "director")
                  {{ $actor->person->person }},
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
