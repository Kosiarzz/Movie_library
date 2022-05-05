@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="row pt-5 pb-4">
            <div class="d-flex justify-content-center">
              <form method="GET" action="{{ route('scrapMovies') }}" class="flex-row search-movie">
                  <input type="text" name="name" class="inputSearchMovie" placeholder="Nazwa filmu"/>
                  <Button type="submit" class="movieSearchButton" value="Szukaj">Szukaj</Button>
              </form>
            </div>
        </div>

        @foreach ($errors->all() as $error)
            <li style="color:red;">{{ $error }}</li>
        @endforeach

        <div class="row p-0 m-0 mt-4">
          @if(isset($movies))
            @forelse ( $movies as $key => $movie)
              <div class="movieBox">
                <div class="movieImage">
                  @if(is_null($movie['img']) || $movie['img'] == "none")
                    <img src="{{asset('storage/default/default_movie_img.png')}}" alt="Zdjęcie"  style="background: silver;">
                  @else
                    <img src="{{ $movie['img'] }}" alt="Zdjęcie">
                  @endif
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
                  <button class="button-sq addMovie" data-array="{{ json_encode($movie) }}" data-type="addMovie" title="Dodaj do bazy" style="color:#fff;"><svg class="bi me-2" width="25" height="25"><use xlink:href="#plus-scrap"/></svg></button>
                  <button class="button-sq addMovie" data-array="{{ json_encode($movie) }}" data-type="addWatch" title="Dodaj do obejrzenia"><svg class="bi me-2" width="26" height="26"><use xlink:href="#watch-later-scrap"/></svg></button>
                  <button class="button-sq editMovie" data-array="{{ json_encode($movie) }}" data-bs-toggle="modal" data-bs-target="#editMovieModal" title="Edytuj przed dodaniem"><svg class="bi me-2" width="24" height="24"><use xlink:href="#group-scrap"/></svg></button>
                </div>
              </div>
            @empty
              <div class="no-movies">Brak wyników wyszukiwania</div>              
            @endforelse
          @endif
        </div>

        <!-- Modal for custom movie -->
        <div class="modal fade" id="editMovieModal" tabindex="-1" aria-labelledby="editMovieModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content" style="background: #212121; color:#fff;">
              <div class="modal-header">
                <h5 class="modal-title" id="editMovieModalLabel">Edycja filmu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>

              <form method="POST" action="{{ route('storeScrapCustomMovie') }}" class="modal-body">
                @csrf
                
                <div class="form-group">
                  <label for="inputTitle">Tytuł filmu</label>
                  <input type="text" class="form-control" name="title" id="inputTitle" aria-describedby="tytuł filmu" placeholder="Tytuł filmu">
                </div>
                
                <div class="form-group">
                  <label for="inputOriginalTitle">Oryginalny tytuł filmu</label>
                  <input type="text" class="form-control" name="original_title" id="inputOriginalTitle" aria-describedby="oryginalny tytuł filmu" placeholder="Oryginalny tytuł filmu">
                </div>

                <div class="form-group">
                  <label for="inputGenre">Gatunek filmu</label>
                  <input type="text" class="form-control" name="genre" id="inputGenre" aria-describedby="gatunek" placeholder="Gatunek">
                </div>

                <div class="form-group">
                  <label for="inputCountry">Kraj filmu</label>
                  <input type="text" class="form-control" name="country" id="inputCountry" aria-describedby="Kraj" placeholder="Kraj">
                </div>

                <div class="form-group">
                  <label for="inputDate">Data premiery</label>
                  <input type="text" class="form-control" name="year" id="inputDate" aria-describedby="data premiery" placeholder="Data premiery ">
                </div>

                <div class="form-group">
                  <label for="inputTime">Czas trwania</label>
                  <input type="text" class="form-control" name="time" id="inputTime" aria-describedby="Czas trwania" placeholder="Czas trwania">
                </div>

                <div class="form-group">
                  <label for="inputRate">Ocena filmu</label>
                  <input type="number" class="form-control" name="rate" id="inputRate" aria-describedby="Ocena filmu" placeholder="Ocena filmu">
                </div>

                <div class="form-group">
                  <label for="textareaDescription">Opis filmu</label>
                  <textarea class="form-control" name="description" id="textareaDescription" rows="3"></textarea>
                </div>


                <div class="directors">
                  Reżyserzy 
                  <div class="form-group">
                    <label for="exampleInputDirector">Imię i nazwisko reżysera</label>
                    <input type="text" class="form-control" id="exampleInputDirector" aria-describedby="Reżyser" placeholder="Reżyser">
                    <button id="addDirector" type="button">Dodaj</button>
                  </div>
                  <ul id="listDirectors" class="ks-cboxtags">
                  
                  </ul>
                </div>
                Aktorzy
                <div class="form-group">
                  <label for="exampleInputActor">Imię i nazwisko aktora</label>
                  <input type="text" class="form-control" id="exampleInputActor" aria-describedby="Aktor" placeholder="Aktor">
                  <button id="addActor" type="button">Dodaj</button>
                </div>
                <div class="actors">
                  <ul id="listActors" class="ks-cboxtags">

                  </ul>
                </div>
        
                Kategorie
                <div class="form-group">
                  <label for="exampleInputCategory">Nazwa kategorii</label>
                  <input type="text" class="form-control" id="exampleInputCategory" aria-describedby="Kategoria" placeholder="Kategoria">
                  <button id="addCategory" type="button">Dodaj</button>
                </div>
                <div class="categories">
                  <ul id="listCategories" class="ks-cboxtags">

                  </ul>
                </div>
        
                Grupy
                <div class="groups">
                  <ul class="ks-cboxtags">
                    @foreach ($userGroups as $uGroup)
                      @continue($uGroup->name == "Wszystkie filmy")
                      <li><input type="checkbox" name="groups[]" id="{{ $uGroup->name }}" value="{{ $uGroup->id }}"><label for="{{ $uGroup->name }}">{{ $uGroup->name }}</label></li>
                    @endforeach
                  </ul>
                </div>
                <div class="form-check form-switch">
                  <input class="form-check-input" type="checkbox" name="watched" value="true" id="flexSwitchCheckChecked">
                  <label class="form-check-label" for="flexSwitchCheckChecked">Obejrzany</label>
                </div>

                <input type="hidden" class="form-control" name="votes" id="inputVotes">
                <input type="hidden" class="form-control" name="img" id="inputImg">
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zamknij</button>
                <button class="btn btn-primary">Zapisz film</button>
              </div>
            </form>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
