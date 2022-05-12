@extends('layouts.app')

@section('content')
<div class="container mt-4 mb-5">
    <div class="row justify-content-center">
      Nowy film
            @foreach ($errors->all() as $error)
            <li style="color:red;">{{ $error }}</li>
            @endforeach
            <form method="POST" action="{{ route('storeCustomMovie') }}" class="modal-body text-white" enctype="multipart/form-data">
                @csrf
                <div class="movieImage mb-3">
                  <img id="movieImgAttr" src="{{asset('storage/default/default_movie_img.png')}}" alt="Zdjęcie" style="background: silver;">
                </div>
                <div class="form-group">
                  <label for="inputImgLink">Link do zdjęcia</label>
                  <input type="text" class="form-control" name="imgLink" id="inputImgLink" aria-describedby="Zdjęcie filmu - link">
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
                  <input type="text" class="form-control" name="title" id="inputTitle" aria-describedby="tytuł filmu" placeholder="Tytuł filmu">
                </div>
                
                <div class="form-group mb-3">
                  <label for="inputOriginalTitle">Oryginalny tytuł filmu</label>
                  <input type="text" class="form-control" name="original_title" id="inputOriginalTitle" aria-describedby="oryginalny tytuł filmu" placeholder="Oryginalny tytuł filmu">
                </div>

                <div class="form-group mb-3">
                  <label for="inputGenre">Gatunek filmu</label>
                  <input type="text" class="form-control" name="genre" id="inputGenre" aria-describedby="gatunek" placeholder="Gatunek">
                </div>

                <div class="form-group mb-3">
                  <label for="inputCountry">Kraj filmu</label>
                  <input type="text" class="form-control" name="country" id="inputCountry" aria-describedby="Kraj" placeholder="Kraj">
                </div>

                <div class="form-group mb-3">
                  <label for="inputDate">Data premiery</label>
                  <input type="text" class="form-control" name="year" id="inputDate" aria-describedby="data premiery" placeholder="Data premiery ">
                </div>

                <div class="form-group mb-3">
                  <label for="inputTime">Czas trwania</label>
                  <input type="text" class="form-control" name="time" id="inputTime" aria-describedby="Czas trwania" placeholder="Czas trwania">
                </div>

                <div class="form-group mb-3">
                  <label for="inputRate">Ocena filmu</label>
                  <input type="number" class="form-control" name="rate" id="inputRate" aria-describedby="Ocena filmu" placeholder="Ocena filmu">
                </div>

                <div class="form-group mb-3">
                  <label for="textareaDescription">Opis filmu</label>
                  <textarea class="form-control" name="description" id="textareaDescription" rows="3"></textarea>
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
