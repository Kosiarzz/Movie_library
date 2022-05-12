@extends('layouts.app')

@section('content')
<div class="container mt-4 mb-5">
    <div class="row justify-content-center">
      EDYCJA FILMU
        <form method="POST" action="{{ route('updateMovie') }}" class="modal-body text-white" enctype="multipart/form-data">
          @csrf
          <div class="movieImage mb-3">
            @if(is_null($movie[0]->img))
              <img id="movieImgAttr" src="{{asset('storage/default/default_movie_img.png')}}" alt="Zdjęcie" style="background: silver;">
            @elseif(substr($movie[0]->img, 0, 6) == "movies")
              <img src="{{asset('storage/'.$movie[0]->img)}}" alt="Zdjęcie">
            @else
              <img src="{{$movie[0]->img}}" alt="Zdjęcie">
            @endif
          </div>

          <div class="form-group">
            <label for="inputImgLink">Link do zdjęcia</label>
            
            @if(is_null($movie[0]->img))
              <input type="text" class="form-control" name="imgLink" id="inputImgLink" aria-describedby="Zdjęcie filmu - link">
            @elseif(substr($movie[0]->img, 0, 6) == "movies")
              <input type="text" class="form-control" name="imgLink" id="inputImgLink" aria-describedby="Zdjęcie filmu - link">
            @else
              <input type="text" class="form-control" name="imgLink" id="inputImgLink" value="{{ $movie[0]->img }}" aria-describedby="Zdjęcie filmu - link">
            @endif
          </div>
          lub
          <div class="form-group mb-3">
            <label for="inputImgFile">Dodaj zdjęcie z komputera</label>
            <input type="file" class="form-control" name="imgFile" id="inputImgFile" aria-describedby="Zdjęcie filmu - plik">
            <div class="form-text"> Zalecany format zdjęcia 1080 x 1920</div>
          </div>


          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" name="watched" value="true" id="flexSwitchCheckChecked" @if($movie[0]->watched) checked @endif>
            <label class="form-check-label" for="flexSwitchCheckChecked">Obejrzany</label>
          </div>

          <div class="form-group mb-3">
            <label for="inputTitle">Tytuł filmu</label>
            <input type="text" class="form-control" name="title" id="inputTitle" value="{{ $movie[0]->title }}" aria-describedby="tytuł filmu" placeholder="Tytuł filmu">
          </div>
          
          <div class="form-group mb-3">
            <label for="inputOriginalTitle">Oryginalny tytuł filmu</label>
            <input type="text" class="form-control" name="original_title" id="inputOriginalTitle" value="{{ $movie[0]->original_title }}" aria-describedby="oryginalny tytuł filmu" placeholder="Oryginalny tytuł filmu">
          </div>

          <div class="form-group mb-3">
            <label for="inputGenre">Gatunek filmu</label>
            <input type="text" class="form-control" name="genre" id="inputGenre" value="{{ $movie[0]->genre->name ?? '' }}" aria-describedby="gatunek" placeholder="Gatunek">
          </div>

          <div class="form-group mb-3">
            <label for="inputCountry">Kraj filmu</label>
            <input type="text" class="form-control" name="country" id="inputCountry" value="{{ $movie[0]->country->name ?? '' }}" aria-describedby="Kraj" placeholder="Kraj">
          </div>

          <div class="form-group mb-3">
            <label for="inputDate">Data premiery</label>
            <input type="text" class="form-control" name="year" id="inputDate" value="{{ $movie[0]->year }}" aria-describedby="data premiery" placeholder="Data premiery ">
          </div>

          <div class="form-group mb-3">
            <label for="inputTime">Czas trwania</label>
            <input type="text" class="form-control" name="time" id="inputTime" value="{{ $movie[0]->time }}" aria-describedby="Czas trwania" placeholder="Czas trwania">
          </div>

          <div class="form-group mb-3">
            <label for="inputRate">Ocena filmu</label>
            <input type="number" class="form-control" name="rate" id="inputRate" value="{{ $movie[0]->rate }}" aria-describedby="Ocena filmu" placeholder="Ocena filmu">
          </div>

          <div class="form-group mb-3">
            <label for="textareaDescription">Opis filmu</label>
            <textarea class="form-control" name="description" id="textareaDescription" rows="3">{{ $movie[0]->description }}</textarea>
          </div>

          <hr>
          <div class="directors mb-3">
            Reżyserzy 
            <div class="input-group mt-1">
              <input type="text" id="inputDirector" class="form-control" placeholder="Imię i nazwisko reżysera" aria-label="Imię i nazwisko reżysera" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button id="addDirector" class="movieSearchButton" type="button">Dodaj</button>
              </div>
            </div>
            <ul id="listDirectors" class="ks-cboxtags">
              @foreach ($movie[0]->movieCast as $director)
                @continue($director->role == "actor")
                <li><input type="checkbox" name="directors[]" id="director{{ $director->id }}" value="{{ $director->person->person }}" checked><label for="director{{ $director->id }}">{{ $director->person->person }}</label></li>
              @endforeach
            </ul>
          </div>

          <hr>
          <div class="actors mb-3">
            Aktorzy
            <div class="input-group mt-1">
              <input type="text" id="inputActor" class="form-control" placeholder="Imię i nazwisko aktora" aria-label="Imię i nazwisko aktora" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button id="addActor" class="movieSearchButton" type="button">Dodaj</button>
              </div>
            </div>
            <div class="actors">
              <ul id="listActors" class="ks-cboxtags">
                @foreach ($movie[0]->movieCast as $actor)
                  @continue($actor->role == "director")
                  <li><input type="checkbox" name="actors[]" id="actor{{ $actor->id }}" value="{{ $actor->person->person }}" checked><label for="actor{{ $actor->id }}">{{ $actor->person->person }}</label></li>
                @endforeach
              </ul>
            </div>
          </div>

          <hr>
          <div class="categories mb-3">
            Kategorie
            <div class="input-group mt-1">
              <input type="text" id="inputCategory" class="form-control" placeholder="Nazwa kategorii" aria-label="Nazwa kategorii" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button id="addCategory" class="movieSearchButton" type="button">Dodaj</button>
              </div>
            </div>
            <div class="categories">
              <ul id="listCategories" class="ks-cboxtags">
                @foreach ($categories as $category)
                  @continue($actor->role == "director")
                  <li><input type="checkbox" name="categories[]" id="category{{ $category->id }}" value="{{ $category->category->name }}" checked><label for="category{{ $category->id }}">{{ $category->category->name }}</label></li>
                @endforeach
              </ul>
            </div>
          </div>

          <hr>

          Grupy
          <div class="groups">
            <ul class="ks-cboxtags">
              @foreach ($userGroups as $uGroup)
                @continue($uGroup->name == "Wszystkie filmy")
                @forelse($groups as $group)
                  1<li><input type="checkbox" name="groups[]" id="{{ $uGroup->name }}" value="{{ $uGroup->id }}" @if($group->group_id == $uGroup->id) checked @endif><label for="{{ $uGroup->name }}">{{ $uGroup->name }}</label></li>
                @empty
                  2<li><input type="checkbox" name="groups[]" id="{{ $uGroup->name }}" value="{{ $uGroup->id }}"><label for="{{ $uGroup->name }}">{{ $uGroup->name }}</label></li>
                @endforelse
              @endforeach
            </ul>
          </div>

          <input type="hidden" name="movie_id" value="{{ $movie[0]->id }}">
          <input type="hidden" class="form-control" name="votes" value="5" id="inputVotes">
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zamknij</button>
          <button class="btn btn-primary">Zapisz film</button>
        </div>
      </form>


      </div>
    </div>
</div>
@endsection
