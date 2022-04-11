@extends('layouts.app')

@section('content')
<div class="container mt-4 mb-5">
    <div class="row justify-content-center">
      EDYCJA FILMU
      <form method="POST" action="{{ route('updateMovie') }}">
        @csrf
        <img src="{{ $movie[0]->img }}" alt="Zdjęcie" />
        <div class="form-check form-switch">
          <input class="form-check-input" type="checkbox" name="watched" value="true" id="flexSwitchCheckChecked" @if($movie[0]->watched) checked @endif>
          <label class="form-check-label" for="flexSwitchCheckChecked">Obejrzany</label>
        </div>
        <div class="form-group">
          <label for="exampleInputTitle">Tytuł filmu</label>
          <input type="text" class="form-control" name="title" id="exampleInputTitle" aria-describedby="tytuł filmu" value="{{ $movie[0]->title }}" placeholder="Tytuł filmu">
        </div>
        <div class="form-group">
          <label for="exampleInputOriginalTitle">Oryginalny tytuł filmu</label>
          <input type="text" class="form-control" name="original_title" id="exampleInputOriginalTitle" aria-describedby="oryginalny tytuł filmu" value="{{ $movie[0]->original_title }}" placeholder="Oryginalny tytuł filmu">
        </div>
        <div class="form-group">
          <label for="exampleInputGenre">Gatunek filmu</label>
          <input type="text" class="form-control" name="genre" id="exampleInputGenre" aria-describedby="gatunek" value="{{ $movie[0]->genre->name }}" placeholder="Gatunek">
        </div>
        <div class="form-group">
          <label for="exampleInputCountry">Kraj filmu</label>
          <input type="text" class="form-control" name="country" id="exampleInputCountry" aria-describedby="Kraj" value="{{ $movie[0]->country->name }}" placeholder="Kraj">
        </div>
        <div class="form-group">
          <label for="exampleInputDate">Data premiery</label>
          <input type="text" class="form-control" name="year" id="exampleInputDate" aria-describedby="data premiery" value="{{ $movie[0]->year }}" placeholder="Data premiery ">
        </div>
        <div class="form-group">
          <label for="exampleInputTime">Czas trwania</label>
          <input type="text" class="form-control" name="time" id="exampleInputTime" aria-describedby="Czas trwania" value="{{ $movie[0]->time }}" placeholder="Czas trwania">
        </div>
        <div class="form-group">
          <label for="exampleInputRate">Ocena filmu</label>
          <input type="text" class="form-control" name="rate" id="exampleInputRate" aria-describedby="Ocena filmu" value="{{ $movie[0]->rate }}" placeholder="Ocena filmu">
        </div>
        <div class="form-group">
          <label for="exampleTextareaDescription">Opis filmu</label>
          <textarea class="form-control" name="description" id="exampleTextareaDescription" rows="3">{{ $movie[0]->description }}</textarea>
        </div>

        <div class="directors">
          Reżyserzy 
          <div class="form-group">
            <label for="exampleInputDirector">Imię i nazwisko reżysera</label>
            <input type="text" class="form-control" id="exampleInputDirector" aria-describedby="Reżyser" placeholder="Reżyser">
            <button id="addDirector" type="button">Dodaj</button>
          </div>
          <ul id="listDirectors" class="ks-cboxtags">
            @foreach ($movie[0]->movieCast as $director)
              @continue($director->role == "actor")
              <li><input type="checkbox" name="directors[]" id="director{{ $director->id }}" value="{{ $director->person->person }}" checked><label for="director{{ $director->id }}">{{ $director->person->person }}</label></li>
            @endforeach
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
            @foreach ($movie[0]->movieCast as $actor)
              @continue($actor->role == "director")
              <li><input type="checkbox" name="actors[]" id="actor{{ $actor->id }}" value="{{ $actor->person->person }}" checked><label for="actor{{ $actor->id }}">{{ $actor->person->person }}</label></li>
            @endforeach
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
            @foreach ($categories as $category)
              @continue($actor->role == "director")
              <li><input type="checkbox" name="categories[]" id="category{{ $category->id }}" value="{{ $category->category->name }}" checked><label for="category{{ $category->id }}">{{ $category->category->name }}</label></li>
            @endforeach
          </ul>
        </div>


        Grupy
        <div class="groups">
          <ul class="ks-cboxtags">
            @foreach ($userGroups as $uGroup)
              @continue($uGroup->name == "Wszystkie filmy")

              @forelse($groups as $group)
                <li><input type="checkbox" name="groups[]" id="{{ $uGroup->name }}" value="{{ $uGroup->id }}" @if($group->group_id == $uGroup->id) checked @endif><label for="{{ $uGroup->name }}">{{ $uGroup->name }}</label></li>
              @empty
                <li><input type="checkbox" name="groups[]" id="{{ $uGroup->name }}" value="{{ $uGroup->id }}"><label for="{{ $uGroup->name }}">{{ $uGroup->name }}</label></li>
              @endforelse
            @endforeach
          </ul>
        </div>


        <input type="hidden" name="movie_id" value="{{ $movie[0]->id }}">
        <button type="submit" class="btn btn-primary">Zapisz zmiany</button>
      </form>


      </div>
    </div>
</div>
@endsection
