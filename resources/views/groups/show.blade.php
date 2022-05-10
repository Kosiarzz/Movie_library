@extends('layouts.app')

@section('content')
<div class="container mt-4 pb-5">
    <div class="row justify-content-center">
        <div class="d-flex flex-column">
            <div class="d-flex justify-content-between library-title">
                <div class="d-flex flex-row library-title-left">
                    <svg class="bi me-2 mt-1" width="28" height="28">
                        @switch($group[0]->name)
                            @case('Wszystkie filmy')
                                <use xlink:href="#history"/>
                                @break
                            @case('Do obejrzenia')
                                <use xlink:href="#watch-later-scrap"/>
                                @break
                            @default
                                <use xlink:href="#video-group"/>
                        @endswitch    
                   </svg> 
                    @if ($group[0]->name == "Wszystkie filmy")
                       Historia
                    @elseif($group[0]->name == "Do obejrzenia")
                        Do obejrzenia
                    @else
                        {{ $group[0]->name }}
                    @endif
                    ({{ count($group[0]->groupMovie) }})
                </div>
                @if ($group[0]->name != "Wszystkie filmy" && $group[0]->name != "Do obejrzenia")
                    <div class="pr-5" style="font-size:20px; color:#fff;">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editGroupModal"> Edytuj</button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteGroupModal">Usuń</button>
                    </div>
                @endif
            </div>
            <div class="d-flex flex-wrap pb-4"  style="width:1360px;">
                @forelse ($group[0]->groupMovie as $gMovie)  
                    <a class="movie-card" href="{{route('movieShow', ['id' => $gMovie->movie->id])}}">
                        <div class="movie-image">
                            @if(is_null($gMovie->movie->img) || $gMovie->movie->img == "none")
                                <img src="{{asset('storage/default/default_movie_img.png')}}" alt="Zdjęcie"  style="background: silver;">
                            @else
                                <img src="{{ $gMovie->movie->img }}" alt="Zdjęcie">
                            @endif
                            <div class="movie-info">
                                <div class="movie-rate" title="Ocena">
                                    {{ $gMovie->movie->rate }}
                                </div>
                                <div class="movie-time" title="Czas trwania">
                                    {{ $gMovie->movie->time }}
                                </div>
                            </div>
                            <div class="watched" title="Obejrzane">
                                @if ($gMovie->movie->watched)
                                    <svg class="bi" width="28" height="28" role="img" aria-label="Obejrzane"><use xlink:href="#watched"/></svg>
                                @endif
                            </div> 
                        </div>
                        <div class="movie-info">
                            <div class="movie-main-category" title="Gatunek">
                                {{ $gMovie->movie->genre->name }}
                            </div>
                            <div class="movie-year" title="Rok premiery">
                                {{ $gMovie->movie->year }}
                            </div>
                        </div>
                        <div class="movie-title" title="{{ $gMovie->movie->title }}">
                            {{ $gMovie->movie->title }}
                        </div>
                    </a>
                @empty
                    <div style="font-size:24px; color:#fff; text-align:center; width:100%; height:250px; line-height:250px;">Brak filmów</div>
                @endforelse
            </div>
        </div>


         <!-- Edit group modal -->
         <div class="modal fade" id="editGroupModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Ustawienia grupy</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="{{ route('groupUpdate') }}">
                  @csrf
                  <div class="modal-body">
                    <div class="mb-3">
                      <label for="name-group" class="form-label">Nazwa grupy</label>
                      <input type="text" name="name" class="form-control" id="name-group" value="{{ $group[0]->name }}">
                    </div>
                  </div>
                  <input type="hidden" name="id" value="{{ $group[0]->id }}">
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Anuluj</button>
                    <button type="submit" class="btn btn-primary">Zapisz zmiany</button>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <!-- Confirm delete group -->
        <div class="modal fade" id="deleteGroupModal" tabindex="-1" aria-labelledby="deleteGroupModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content" style="background: #212121; color:#fff;">
                <div class="modal-header">
                <h5 class="modal-title" id="deleteGroupModalLabel">Usuwanie grupy</h5>
                </div>
                <div class="modal-body">
                Czy na pewno chcesz usunąć tą grupe?
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Anuluj</button>
                <a class="btn btn-danger" href="{{ route('groupDestroy', ['id' => $group[0]->id]) }}">Usuń</a>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection