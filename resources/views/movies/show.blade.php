@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
      <div class="buttons mb-3">
        <a class="btn btn-primary" href="{{ route('editMovie', ['id' => $movie[0]->id]) }}">Edycja</a>
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteMovieModal">Usuń</button>
      </div>
      <div class="movieBox">
        <div class="movieImage">
          @if(is_null($movie[0]->img))
              <img src="{{asset('storage/default/default_movie_img.png')}}" alt="Zdjęcie"  style="background: silver;">
          @elseif(substr($movie[0]->img, 0, 6) == "movies")
              <img src="{{asset('storage/'.$movie[0]->img)}}" alt="Zdjęcie">
          @else
              <img src="{{$movie[0]->img}}" alt="Zdjęcie">
          @endif
        </div>  
        <div class="movieInfo">
          <div class="movieTitle">
            {{ $movie[0]->title }}
          </div>  
          <div class="movieOriginalTitle">
            {{ $movie[0]->original_title }}
          </div> 
          <div class="movieGenres">
            {{ $movie[0]->genre->name ?? 'Brak kategorii'}}
          </div> 
          <div class="movieStats">
            <div class="movieYear">
              <svg class="bi" width="16" height="16" role="img" aria-label="Wyszukaj"><use xlink:href="#calendarr"/></svg> {{ $movie[0]->year }}
            </div> 
            <div class="movieTime">
              <svg class="bi" width="16" height="16" role="img" aria-label="Wyszukaj"><use xlink:href="#timeee"/></svg> &nbsp; {{ $movie[0]->time }} 
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
              <div class="movieGroups mt-2" style="display:flex; flex-direction: row;">
                @foreach ($movie[0]->movieGroup as $mGroup)
                  @continue($mGroup->group->name == "Wszystkie filmy")
                  <a class="movie-group-box" href="{{ route('searchByGroup', ['group' => $mGroup->group->id ]) }}" style="background: #84B082; padding:1px 10px; margin-right:5px; text-decoration:none; color:#000;">{{ $mGroup->group->name }}</a>
                @endforeach
              </div>
              <div class="movieCategories mt-2" style="display:flex; flex-direction: row;">
                @foreach ($movie[0]->movieCategory as $mCategory)
                  <a class="movie-category-box" href="{{ route('searchByCategory', ['category' => $mCategory->category->name ]) }}" style="background: #72A1E5; border-radius:10px; padding:0px 10px; margin-right:5px; text-decoration:none; color:#000;">{{ $mCategory->category->name }}</a>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Confirm delete movie -->
    <div class="modal fade" id="deleteMovieModal" tabindex="-1" aria-labelledby="deleteMovieModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content" style="background: #212121; color:#fff;">
          <div class="modal-header">
            <h5 class="modal-title" id="deleteMovieModalLabel">Usuwanie filmu</h5>
          </div>
          <div class="modal-body">
            Czy na pewno chcesz usunąć ten film?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Anuluj</button>
            <a class="btn btn-danger" href="{{ route('deleteMovie', ['id' => $movie[0]->id]) }}">Usuń</a>
          </div>
        </div>
      </div>
    </div>

</div>
@endsection
