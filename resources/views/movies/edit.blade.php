@extends('layouts.app')

@section('content')
<div class="container mt-4 mb-5">
  <div class="row justify-content-center text-white">
    <h4>Edycja filmu</h4>
      <form method="POST" action="{{ route('updateMovie') }}" class="modal-body text-white" enctype="multipart/form-data" style="background: #212121; border-radius:10px; ">
        @csrf
          <div class="image-box">
            <div class="movieImage mb-3">
              @if(is_null($movie[0]->img))
                <img id="movieImgAttr" src="{{asset('storage/default/default_movie_img.png')}}" alt="Zdjęcie" style="background: silver;">
              @elseif(substr($movie[0]->img, 0, 6) == "movies")
                <img src="{{asset('storage/'.$movie[0]->img)}}" alt="Zdjęcie">
              @else
                <img src="{{$movie[0]->img}}" alt="Zdjęcie">
              @endif
            </div>
            <div class="image-box-input">
              <div class="form-group">
                <label for="inputImgLink">Link do zdjęcia</label>
                @if(is_null($movie[0]->img))
                  <input type="text" class="form-control" name="imgLink" maxlength="1000" id="inputImgLink" aria-describedby="Zdjęcie filmu - link">
                @elseif(substr($movie[0]->img, 0, 6) == "movies")
                  <input type="text" class="form-control" name="imgLink" maxlength="1000" id="inputImgLink" aria-describedby="Zdjęcie filmu - link">
                @else
                  <input type="text" class="form-control" name="imgLink" maxlength="1000" id="inputImgLink" value="{{ $movie[0]->img }}" aria-describedby="Zdjęcie filmu - link">
                @endif 
              
                @error('imgLink')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>  
              <span>lub</span>
              <div class="form-group mb-3">
                <label for="inputImgFile">Dodaj zdjęcie z komputera</label>
                <input type="file" class="form-control @error('imgFile') is-invalid @enderror" name="imgFile" id="inputImgFile" value="{{asset('storage/default/default_movie_img.png')}}" onchange="previewFile(this);" aria-describedby="Zdjęcie filmu - plik">
                  @error('imgFile')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                <div class="form-text"> Zalecany format zdjęcia 1920 x 1080</div>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="imgDelete" value="true" id="flexSwitchCheckChecked">
                <label class="form-check-label" for="flexSwitchCheckChecked">Usuń zdjęcie filmu całkowicie</label>
                @error('imgDelete')
                  <span class="" style="color:red;">
                      {{ $message }}
                  </span>
                @enderror
              </div>
            </div>
          </div>
            

          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" name="watched" value="true" id="flexSwitchCheckChecked" @if($movie[0]->watched) checked @endif>
            <label class="form-check-label" for="flexSwitchCheckChecked">Obejrzany</label>
            @error('watched')
              <span class="" style="color:red;">
                  {{ $message }}
              </span>
            @enderror
          </div>

            <div class="form-group mb-3">
              <label for="inputTitle">Tytuł filmu</label>
              <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" maxlength="100" id="inputTitle" aria-describedby="tytuł filmu" value="{{ $movie[0]->title }}" required>
              @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            
            <div class="form-group mb-3">
              <label for="inputOriginalTitle">Oryginalny tytuł filmu</label>
              <input type="text" class="form-control @error('original_title') is-invalid @enderror" name="original_title" maxlength="100" id="inputOriginalTitle" value="{{ $movie[0]->original_title }}" aria-describedby="oryginalny tytuł filmu">
              @error('original_title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="form-group mb-3">
              <label for="inputGenre">Gatunek filmu</label>
              <input type="text" class="form-control @error('genre') is-invalid @enderror" name="genre" id="inputGenre" maxlength="50" value="{{ $movie[0]->genre->name ?? '' }}" aria-describedby="gatunek">
              @error('genre')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="form-group mb-3">
              <label for="inputCountry">Kraj filmu</label>
              <input type="text" class="form-control @error('country') is-invalid @enderror" name="country" id="inputCountry" maxlength="30" value="{{ $movie[0]->country->name ?? '' }}" aria-describedby="Kraj">
              @error('country')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="form-group mb-3">
              <label for="inputDate">Data premiery</label>
              <input type="text" class="form-control @error('year') is-invalid @enderror" name="year" id="inputDate" min="0" max="9999" step="1" value="{{ $movie[0]->year }}" aria-describedby="data premiery">
              @error('year')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            
            <div class="form-group mb-3">
              <label for="inputTime">Czas trwania</label>
              <input type="time" class="form-control @error('time') is-invalid @enderror" step="1" name="time" id="inputTime" maxlength="100" value="{{ $movie[0]->time }}" aria-describedby="Czas trwania">
              @error('time')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="form-group mb-3">
              <label for="inputRate">Ocena filmu</label>
              <input type="number" class="form-control @error('rate') is-invalid @enderror" name="rate" id="inputRate" min="0" max="10" step="0.1" value="{{ floatval($movie[0]->rate) }}" aria-describedby="Ocena filmu">
              @error('rate')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="form-group mb-3">
              <label for="textareaDescription">Opis filmu</label>
              <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="textareaDescription" maxlength="500" rows="3">{{ $movie[0]->description }}</textarea>
              @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <hr>
            <div class="directors mb-3">
              Reżyserzy 
              <div class="input-group mt-1">
                <input type="text" id="inputDirector" class="form-control @error('directors') is-invalid @enderror" maxlength="100" placeholder="Imię i nazwisko reżysera" aria-label="Imię i nazwisko reżysera" aria-describedby="basic-addon2">
                <div class="input-group-append">
                  <button id="addDirector" class="movieSearchButton" type="button">Dodaj</button>
                </div>
                @error('directors')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="form-text">Maksymalnie 20 osób</div>
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
                <input type="text" id="inputActor" class="form-control @error('actors') is-invalid @enderror" maxlength="100" placeholder="Imię i nazwisko aktora" aria-label="Imię i nazwisko aktora" aria-describedby="basic-addon2">
                <div class="input-group-append">
                  <button id="addActor" class="movieSearchButton" type="button">Dodaj</button>
                </div>
                @error('actors')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="form-text">Maksymalnie 20 osób</div>
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
                <input type="text" id="inputCategory" class="form-control @error('categories') is-invalid @enderror" maxlength="100" placeholder="Nazwa kategorii" aria-label="Nazwa kategorii" aria-describedby="basic-addon2">
                <div class="input-group-append">
                  <button id="addCategory" class="movieSearchButton" type="button">Dodaj</button>
                </div>
                @error('categories')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="form-text">Maksymalnie 50 kategorii</div>
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
                @forelse($groups as $group)
                  @foreach ($userGroups as $uGroup)
                    @continue($uGroup->name == "Wszystkie filmy")
                    @if($group->group_id == $uGroup->id)
                      <li><input type="checkbox" name="groups[]" id="{{ $uGroup->name }}" value="{{ $uGroup->id }}" checked><label for="{{ $uGroup->name }}">{{ $uGroup->name }}</label></li> 
                      @unset($userGroups[$loop->index])
                    @endif
                  @endforeach
                  @empty
                @endforelse

                @foreach ($userGroups as $uGroup)
                  @continue($uGroup->name == "Wszystkie filmy")
                  <li><input type="checkbox" name="groups[]" id="{{ $uGroup->name }}" value="{{ $uGroup->id }}"><label for="{{ $uGroup->name }}">{{ $uGroup->name }}</label></li>
                @endforeach

              </ul>
            </div>
            <input type="hidden" name="movie_id" value="{{ $movie[0]->id }}">
            <input type="hidden" class="form-control" name="votes" value="5" id="inputVotes">
            <div class="modal-footer">
              <button class="btn btn-primary">Zapisz film</button>
            </div>
        </form>

  </div>
</div>
@endsection
