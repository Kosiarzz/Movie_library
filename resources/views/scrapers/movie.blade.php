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
                      <div class="mt-2">
                        Reżyser: {{ $movie['directors'] }}
                      </div>
                      <div>
                        Aktorzy: {{ $movie['cast'] }}
                      </div>
                    </div>
                  </div>
                </div>
                <div class="buttons-right">
                  <div class="buttons">
                    <button class="button-scrap-action addMovie" data-array="{{ json_encode($movie) }}" data-type="addMovie" title="Dodaj do bazy"><svg class="bi me-2" width="25" height="25"><use xlink:href="#plus-scrap"/></svg></button>
                    <button class="button-scrap-action addMovie" data-array="{{ json_encode($movie) }}" data-type="addWatch" title="Dodaj do obejrzenia"><svg class="bi me-2" width="26" height="26"><use xlink:href="#watch-later-scrap"/></svg></button>
                    <button class="button-scrap-action editMovie" data-array="{{ json_encode($movie) }}" data-bs-toggle="modal" data-bs-target="#editMovieModal" title="Edytuj przed dodaniem"><svg class="bi me-2" width="24" height="24"><use xlink:href="#group-scrap"/></svg></button>
                  </div>
                  <div class="info">
                    @forelse ($inLibrary as $movieinLibrary)
                      @if($movieinLibrary->title == $movie['title'])
                        Film o tej nazwie znajduje się już w twojej bibliotece! <a href="{{ route('scrapToFilters', ['title' => $movie['title'] ]) }}">Sprawdź</a>
                      @break
                      @endif
                    @empty
                      
                    @endforelse
                  </div>
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
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="editMovieModalLabel">Edycja filmu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>

              <form method="POST" action="{{ route('storeScrapCustomMovie') }}" class="modal-body" enctype="multipart/form-data">
                @csrf
                <div class="movieImage mb-3">
                  <img id="movieImgAttr" src="{{asset('storage/default/default_movie_img.png')}}" alt="Zdjęcie" style="background: silver;">
                </div>
                <div class="form-group">
                  <label for="inputImgLink">Link do zdjęcia</label>
                  <input type="text" class="form-control" name="imgLink" maxlength="1000" id="inputImgLink" aria-describedby="Zdjęcie filmu - link">
                </div>
                lub
                <div class="form-group mb-3">
                  <label for="inputImgFile">Dodaj zdjęcie z komputera</label>
                  <input type="file" class="form-control" name="imgFile" id="inputImgFile" aria-describedby="Zdjęcie filmu - plik">
                  <div class="form-text"> Zalecany format zdjęcia 1080 x 1920</div>
                </div>


                <div class="form-check form-switch">
                  <input class="form-check-input" type="checkbox" name="watched" value="true" id="flexSwitchCheckChecked">
                  <label class="form-check-label" for="flexSwitchCheckChecked">Obejrzany</label>
                </div>

                <div class="form-group mb-3">
                  <label for="inputTitle">Tytuł filmu</label>
                  <input type="text" class="form-control" name="title" maxlength="100" id="inputTitle" aria-describedby="tytuł filmu" placeholder="Tytuł filmu" required>
                </div>
                
                <div class="form-group mb-3">
                  <label for="inputOriginalTitle">Oryginalny tytuł filmu</label>
                  <input type="text" class="form-control" name="original_title" maxlength="100" id="inputOriginalTitle" aria-describedby="oryginalny tytuł filmu" placeholder="Oryginalny tytuł filmu">
                </div>

                <div class="form-group mb-3">
                  <label for="inputGenre">Gatunek filmu</label>
                  <input type="text" class="form-control" name="genre" maxlength="50" id="inputGenre" aria-describedby="gatunek" placeholder="Gatunek">
                </div>

                <div class="form-group mb-3">
                  <label for="inputCountry">Kraj filmu</label>
                  <input type="text" class="form-control" name="country" maxlength="30" id="inputCountry" aria-describedby="Kraj" placeholder="Kraj">
                </div>

                <div class="form-group mb-3">
                  <label for="inputDate">Data premiery</label>
                  <input type="number" class="form-control" name="year" min="0" max="9999" id="inputDate" aria-describedby="data premiery" placeholder="Data premiery ">
                </div>

                <div class="form-group mb-3">
                  <label for="inputTime">Czas trwania</label>
                  <input type="text" class="form-control" name="time" maxlength="100" id="inputTime" aria-describedby="Czas trwania" placeholder="Czas trwania">
                </div>

                <div class="form-group mb-3">
                  <label for="inputRate">Ocena filmu</label>
                  <input type="number" class="form-control" name="rate" min="0" max="10" step="0.1" id="inputRate" aria-describedby="Ocena filmu" placeholder="Ocena filmu">
                </div>

                <div class="form-group mb-3">
                  <label for="textareaDescription">Opis filmu</label>
                  <textarea class="form-control" name="description" maxlength="500" id="textareaDescription" rows="3"></textarea>
                </div>

                <hr>
                <div class="directors mb-3">
                  Reżyserzy 
                  <div class="input-group mt-1">
                    <input type="text" id="inputDirector" maxlength="100" class="form-control" placeholder="Imię i nazwisko reżysera" aria-label="Imię i nazwisko reżysera" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button id="addDirector" class="movieSearchButton" type="button">Dodaj</button>
                    </div>
                  </div>
                  <div class="form-text">Maksymalnie 20 osób</div>
                  <ul id="listDirectors" class="ks-cboxtags">
                  
                  </ul>
                </div>

                <hr>
                <div class="actors mb-3">
                  Aktorzy
                  <div class="input-group mt-1">
                    <input type="text" id="inputActor" maxlength="100" class="form-control" placeholder="Imię i nazwisko aktora" aria-label="Imię i nazwisko aktora" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button id="addActor" class="movieSearchButton" type="button">Dodaj</button>
                    </div>
                  </div>
                  <div class="form-text">Maksymalnie 20 osób</div>
                  <div class="actors">
                    <ul id="listActors" class="ks-cboxtags">

                    </ul>
                  </div>
                </div>

                <hr>
                <div class="categories mb-3">
                  Kategorie
                  <div class="input-group mt-1">
                    <input type="text" id="inputCategory" maxlength="100" class="form-control" placeholder="Nazwa kategorii" aria-label="Nazwa kategorii" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button id="addCategory" class="movieSearchButton" type="button">Dodaj</button>
                    </div>
                  </div>
                  <div class="form-text">Maksymalnie 50 kategorii</div>
                  <div class="categories">
                    <ul id="listCategories" class="ks-cboxtags">

                    </ul>
                  </div>
                </div>

                <hr>

                Grupy
                <div class="groups">
                  <ul class="ks-cboxtags">
                    @foreach ($userGroups as $uGroup)
                      @continue($uGroup->name == "Wszystkie filmy")
                      <li><input type="checkbox" name="groups[]" id="{{ $uGroup->name }}" value="{{ $uGroup->id }}"><label for="{{ $uGroup->name }}">{{ $uGroup->name }}</label></li>
                    @endforeach
                  </ul>
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

        <!-- Alerts -->
        <div id="scrap-box-alert" class="scrap-box-alert">
          @foreach ($errors->all() as $error)
            <div class="scrap-alert-message error">{{ $error }}<button class="alert-delete">x</button></div>
          @endforeach
        </div>


    </div>
</div>
@endsection
