@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="row pt-5 pb-4">
            <div class="d-flex justify-content-center">
              <form method="GET" class="flex-row search-movie">
                  <input type="text" name="name" class="inputSearchMovie" placeholder="Nazwa filmu"/>
                  <Button type="submit" class="movieSearchButton" value="Szukaj">Szukaj</Button>
              </form>
            </div>
        </div>

        <div class="row p-0 m-0 mt-4">
            @foreach ( $movies as $key => $movie)
              
              <div class="movieBox">
                <div class="movieImage">
                  <img src="{{ $movie['img'] }}" alt="Zdjęcie" />
                </div>  
                <div class="movieInfo">
                  <div class="movieTitle">
                    {{ $movie['title'] }}
                  </div>  
                  <div class="movieOriginalTitle">
                    {{ $movie['original_title'] }}
                  </div> 
                  <div class="movieGenres">
                    {{ $movie['genres'] }}
                  </div> 
                  <div class="movieStats">
                    <div class="movieYear">
                      <svg class="bi" width="16" height="16" role="img" aria-label="Wyszukaj"><use xlink:href="#calendarr"/></svg> {{ $movie['year'] }}
                    </div> 
                    <div class="movieTime">
                      <svg class="bi" width="16" height="16" role="img" aria-label="Wyszukaj"><use xlink:href="#timeee"/></svg>  {{ $movie['time'] }} 
                    </div> 
                    <div class="movieRate"> 
                      <svg class="bi" width="20" height="20" role="img" aria-label="Biblioteka"><use xlink:href="#star"/></svg>  {{ $movie['rate'] }}
                    </div> 
                  </div>  
                  <div class="movieDescription">
                    {{ $movie['description'] }}
                  </div> 
                  <div class="movieBottom">
                    <div class="movieBottomLeft">
                      <div class="movieDirectors mt-2">
                        Reżyser: {{ $movie['directors'] }}
                      </div>
                      <div class="movieActors">
                        Aktorzy: {{ $movie['cast'] }}
                      </div>
                    </div>
                  </div>
                </div>
                <div class="buttons-right">
                  <button class="button-sq addMovie" data-array="{{ json_encode($movie) }}" data-type="addMovie" style="color:#fff;">+</button>
                  <button class="button-sq addMovie" data-array="{{ json_encode($movie) }}" data-type="addWatch"><svg class="bi me-2" width="26" height="26"><use xlink:href="#will-view"/></svg></button>
                  <button class="button-sq groups" ><svg class="bi me-2" width="26" height="26"><use xlink:href="#will-view"/></svg></button>
                </div>
              </div>
                              
            @endforeach
        </div>
    </div>
</div>
@endsection
