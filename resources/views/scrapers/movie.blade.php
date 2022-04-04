@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="row">
            <div class="d-flex justify-content-center">
              <form method="GET" >
                  <input type="text" name="name" class="inputSearchMovie" placeholder="Nazwa filmu"/>
                  <input type="submit" class="movieSearchButton" value="Szukaj" />
              </form>
            </div>
        </div>

        <div class="row p-0 m-0 mt-4">
            @foreach ( $movies as $movie)
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
                        {{ $movie['year'] }}
                    </div> 
                    <div class="movieTime">
                        {{ $movie['time'] }}
                    </div> 
                    <div class="movieRate"> 
                        {{ $movie['rate'] }}
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
                    <div class="movieBottomRight">
                      <button class="movieSearchButton">+</button>
                    </div>
                  </div>
                </div>
              </div>
                              
            @endforeach
        </div>
    </div>
</div>
@endsection


@push('script')
<script>
  
</script>
@endpush