@extends('layouts.app')

@section('content')
<div class="container mt-4 pb-5">
    <div class="row justify-content-center">
        <div class="filters mb-4 mt-3" style="">
            <form method="GET" action="#">
                <div class="mb-3">
                    <label for="exampleInputName" class="form-label">Nazwa filmu</label>
                    <input type="text" class="form-control" id="exampleInputName" aria-describedby="nazwa filmu">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputGenre" class="form-label">Gatuenk</label>
                    <input type="text" class="form-control" id="exampleInputGenre">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputYear" class="form-label">Rok produkcji</label>
                    <input type="text" class="form-control" id="exampleInputYear">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputGenre" class="form-label">Ocena</label>
                    <input type="text" class="form-control" id="exampleInputGenre">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputGenre" class="form-label">Czas trwania</label>
                    <input type="text" class="form-control" id="exampleInputGenre">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputGenre" class="form-label">Reżyser</label>
                    <input type="text" class="form-control" id="exampleInputGenre">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputGenre" class="form-label">Aktor</label>
                    <input type="text" class="form-control" id="exampleInputGenre">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputGenre" class="form-label">Kategoria</label>
                    <input type="text" class="form-control" id="exampleInputGenre">
                  </div>
                  <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" name="watched" value="true" id="flexSwitchCheckChecked">
                    <label class="form-check-label" for="flexSwitchCheckChecked">Obejrzany</label>
                  </div>
                  
                  <button type="button" class="btn btn-primary">Wyszukaj</button>
            </form>
        </div>
        <div class="dd" style="width:1800px; min-height:500px; margin-left:25px; margin-top:35px; background:gre; display:flex; flex-wrap: wrap; border-radius:5px;">
            @if(isset($movies))
                @forelse ($movies as $movie)
                    <a class="movie-card" href="{{route('movieShow', ['id' => $movie->id])}}" style="width:210px; margin:10px 22px 40px 22px; display:flex; flex-direction:column; cursor:pointer; text-decoration:none;">
                        <div class="movie-image" style="height:300px; width:100%;">
                            <img src="{{ $movie->img }}" alt="Zdjęcie" style="height:300px; width:210px; position:absolute; z-index:-10; border-radius:5px 5px 0 0;">
                            <div class="movie-info" style="width:100%; display:flex; justify-content:space-between; padding:5px; color:#fff;">
                                <div class="movie-time" style="background:rgb(22,22,22,0.8); padding:3px;" title="Ocena">
                                    {{ $movie->rate }}
                                </div>
                                <div class="movie-time" style="background:rgb(22,22,22,0.8); padding:3px;" title="Czas trwania">
                                    {{ $movie->time }}
                                </div>
                            </div>
                            <div style="margin-top:235px; float:right; margin-right:5px;" title="Obejrzane">
                                @if ($movie->watched)
                                    <svg class="bi" width="28" height="28" role="img" aria-label="Obejrzane"><use xlink:href="#watched"/></svg>
                                @endif
                            </div> 
                        </div>
                        <div class="movie-category" style=" width:100%; display:flex; justify-content:space-between; padding:3px 3px 0 3px; color:#fff; font-size:12px; ">
                            <div class="movie-main-category" title="Gatunek">
                                {{ $movie->genre->name }}
                            </div>
                            <div class="movie-main-category" title="Rok premiery">
                                {{ $movie->year }}
                            </div>
                        </div>
                        <div class="movie-title" style="font-size:16px; padding:0 0 0 0; text-align:center; color:#f7f5f4;" title="Avengers: Wojna bez granic">
                            {{ $movie->title }}
                        </div>
                    </a>
                @empty
                    <p>Brak wyników wyszukiwania</p>     
                @endforelse
            @endif
            <a class="movie-card" href="#" style="width:210px; margin:10px 22px 40px 22px; display:flex; flex-direction:column; cursor:pointer; text-decoration:none;">
                <div class="movie-image" style="height:300px; width:100%;">
                    <img src="https://fwcdn.pl/fpo/13/41/821341/7959846.6.jpg" alt="" style="height:300px; width:210px; position:absolute; z-index:-10; border-radius:5px 5px 0 0;">
                    <div class="movie-info" style="width:100%; display:flex; justify-content:space-between; padding:5px; color:#fff;">
                        <div class="movie-time" style="background:rgb(22,22,22,0.8); padding:3px;" title="Ocena">
                            7,5
                        </div>
                        <div class="movie-time" style="background:rgb(22,22,22,0.8); padding:3px;" title="Czas trwania">
                            01:20:15
                        </div>
                    </div>
                    <div style="margin-top:235px; float:right; margin-right:5px;" title="Obejrzane">
                        <svg class="bi" width="28" height="28" role="img" aria-label="Obejrzane"><use xlink:href="#watched"/></svg>
                    </div>
                </div>
                <div class="movie-category" style=" width:100%; display:flex; justify-content:space-between; padding:3px 3px 0 3px; color:#fff; font-size:12px; ">
                    <div class="movie-main-category" title="Gatunek">
                        Horror
                    </div>
                    <div class="movie-main-category" title="Rok premiery">
                        2015
                    </div>
                </div>
                <div class="movie-title" style="font-size:16px; padding:0 0 0 0; text-align:center; color:#f7f5f4;" title="Avengers: Wojna bez granic">
                    Avengers: Wojna bezewqd granic 
                </div>
            </a>
        </div> 
    </div>
</div>
@endsection