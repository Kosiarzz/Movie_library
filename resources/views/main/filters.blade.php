@extends('layouts.app')

@section('content')
<div class="container mt-4 pb-5">
    <div class="row justify-content-center">
        <div class="filters mb-4 mt-3" style="">
            <form method="GET" action="{{ route('filters') }}" class="row pt-2" style="border:1px solid #fff;">

                <div class="col-md-3 mb-3">
                    <label for="inputTitle" class="form-label ">Nazwa filmu</label>
                    <input type="text" class="form-control" name="title" id="inputTitle" maxlength="100" value="{{ $oldValues['title'] ?? ''}}" aria-describedby="Nazwa filmu">
                </div>

                <div class="col-md-2 mb-3">
                    <label for="inputYear" class="form-label">Rok premiery</label>
                    <input type="number" min="0" max="9999" class="form-control" name="year" min="0" max="9999" id="inputYear" value="{{ $oldValues['year'] ?? ''}}" aria-describedby="Rok premiery">
                </div>

                <div class="col-md-3 mb-3">
                    <label for="inputDirector" class="form-label">Reżyser</label>
                    <input type="text" class="form-control" name="director"  id="inputDirector" maxlength="100" value="{{ $oldValues['director'] ?? ''}}" aria-describedby="Reżyser">
                </div>

                <div class="col-md-3 mb-3">
                    <label for="inputActor" class="form-label">Aktor</label>
                    <input type="text" class="form-control" name="actor" id="inputActor" maxlength="100" value="{{ $oldValues['actor'] ?? ''}}" aria-describedby="Aktor">
                </div>

                <div class="col-md-2 mb-3">
                    <label for="selectGenre" class="form-label">Gatuenk</label>
                    <select class="form-select form-select-mb mb-3" name="genre" id="selectGenre" aria-label=".form-select-sm example">
                        <option value="">Wszystkie</option>
                        @foreach ($genres as $genre)
                            <option value="{{ $genre->id }}" {{ (($oldValues['genre'] ?? '') == $genre->id) ? 'selected' : ''}}>{{ $genre->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-2 mb-3">
                    <label for="selectStatus" class="form-label">Status filmu</label>
                    <select class="form-select form-select-mb mb-3"  name="watched" id="selectStatus" aria-label=".form-select-sm example">
                        <option value="">Wszystkie</option>
                        <option value="yes" {{ (($oldValues['watched'] ?? '') == "yes" ) ? 'selected' : ''}}>Obejrzane</option>
                        <option value="no" {{ (($oldValues['watched'] ?? '') == "no") ? 'selected' : ''}}>Nie obejrzane</option>
                    </select>
                </div>
  
                <div class="col-md-2 mb-3">
                    <label for="selectGroup" class="form-label">Grupa</label>
                    <select class="form-select form-select-mb mb-3"  name="group" id="selectGroup" aria-label=".form-select-sm example">
                        <option value="">Wszystkie</option>
                        @foreach($userGroups as $uGroup)
                            @continue($uGroup->type == "default")
                            <option value="{{ $uGroup->id }}" {{ (($oldValues['group'] ?? '') == $uGroup->id ) ? 'selected' : ''}}>{{ $uGroup->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3 mb-3">
                    <label for="selectSort" class="form-label">Sortuj po:</label>
                    <select class="form-select form-select-mb mb-3"  name="sort" id="selectSort" aria-label=".form-select-sm example">
                        <option value="">Brak sortowania</option>
                        <option value="rate" {{ (($oldValues['sort'] ?? '') == "rate" ) ? 'selected' : ''}}>Sortuj po ocenie - malejąco</option>
                        <option value="time" {{ (($oldValues['sort'] ?? '') == "time" ) ? 'selected' : ''}}>Sortuj po czasie trwania - malejąco</option>
                        <option value="year" {{ (($oldValues['sort'] ?? '') == "year" ) ? 'selected' : ''}}>Sortuj po roku premiery - malejąco</option>
                        <option value="votes" {{ (($oldValues['sort'] ?? '') == "votes" ) ? 'selected' : ''}}>Sortuj po popularności - malejąco</option>
                    </select>
                </div>

                <div class="col-md-2 mb-3">
                    <label for="inputCategory" class="form-label">Kategorie</label>
                    <input type="text" class="form-control" name="category" maxlength="100" id="inputCategory">
                </div>

                <button class="btn btn-primary" style="width:150px; height:40px;">Wyszukaj</button>
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
                                {{ $movie->genre->name ?? '' }}
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

                {{ $movies->onEachSide(5)->links() }}
            @endif
        </div> 
        
    </div>
</div>
@endsection