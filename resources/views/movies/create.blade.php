@extends('layouts.app')

@section('content')
<div class="container mt-4 mb-5">
    <div class="row justify-content-center">
      Nowy film
      <form method="POST" action="{{ route('storeCustomMovie') }}">
        @csrf
        <img src="" alt="Zdjęcie" />
        <div class="form-check form-switch">
          <input class="form-check-input" type="checkbox" name="watched" value="true" id="flexSwitchCheckChecked">
          <label class="form-check-label" for="flexSwitchCheckChecked">Obejrzany</label>
        </div>
        <div class="form-group">
          <label for="exampleInputTitle">Tytuł filmu</label>
          <input type="text" class="form-control" name="title" id="exampleInputTitle" aria-describedby="Tytuł filmu" placeholder="Tytuł filmu">
        </div>
        <div class="form-group">
          <label for="exampleInputOriginalTitle">Oryginalny tytuł filmu</label>
          <input type="text" class="form-control" name="original_title" id="exampleInputOriginalTitle" aria-describedby="oryginalny tytuł filmu" placeholder="Oryginalny tytuł filmu">
        </div>
        <div class="form-group">
          <label for="exampleInputGenre">Gatunek filmu</label>
          <input type="text" class="form-control" name="genre" id="exampleInputGenre" aria-describedby="gatunek" placeholder="Gatunek">
        </div>
        <div class="form-group">
          <label for="exampleInputCountry">Kraj filmu</label>
          <input type="text" class="form-control" name="country" id="exampleInputCountry" aria-describedby="Kraj" placeholder="Kraj">
        </div>
        <div class="form-group">
          <label for="exampleInputDate">Data premiery</label>
          <input type="text" class="form-control" name="year" id="exampleInputDate" aria-describedby="data premiery" placeholder="Data premiery ">
        </div>
        <div class="form-group">
          <label for="exampleInputTime">Czas trwania</label>
          <input type="text" class="form-control" name="time" id="exampleInputTime" aria-describedby="Czas trwania" placeholder="Czas trwania">
        </div>
        <div class="form-group">
          <label for="exampleInputRate">Ocena filmu</label>
          <input type="text" class="form-control" name="rate" id="exampleInputRate" aria-describedby="Ocena filmu" placeholder="Ocena filmu">
        </div>
        <div class="form-group">
          <label for="exampleTextareaDescription">Opis filmu</label>
          <textarea class="form-control" name="description" id="exampleTextareaDescription" rows="3"></textarea>
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

        <button type="submit" class="btn btn-primary">Zapisz zmiany</button>
      </form>


      </div>
    </div>
</div>
@endsection
