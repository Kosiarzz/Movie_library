@extends('layouts.app')

@section('content')
<div class="container mt-4 pb-5">
    <div class="row justify-content-center">
        <div class="d-flex flex-column">
            @foreach ($groups as $group)
                @continue($group->name == "Do obejrzenia")
                @continue($group->type == "user")

                <div class="d-flex justify-content-between library-title">
                    <div class="d-flex flex-row library-title-left">
                        <svg class="bi me-2 mt-1" width="28" height="28"><use xlink:href="#history"/></svg> Historia
                    </div>
                    <a class="library-title-right" href="{{route('groupShow', ['id' => $group->id])}}">
                        Pokaż wszystko
                    </a>
                </div>
                <div class="d-flex pb-1 library-movie-contener">
                    @foreach ($group->groupMovie as $gMovie)
                        <a class="movie-card" href="{{route('movieShow', ['id' => $gMovie->movie->id])}}">
                            <div class="movie-image">
                                @if(is_null($gMovie->movie->img))
                                    <img src="{{asset('storage/default/default_movie_img.png')}}" alt="Zdjęcie"  style="background: silver;">
                                @elseif(substr($gMovie->movie->img, 0, 6) == "movies")
                                    <img src="{{asset('storage/'.$gMovie->movie->img)}}" alt="Zdjęcie">
                                @else
                                    <img src="{{$gMovie->movie->img}}" alt="Zdjęcie">
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
                        @break($loop->index == 4)
                    @endforeach
                </div>
            @endforeach
        </div>

        <div class="d-flex flex-column mt-4">
            @foreach ($groups as $group)
                @continue($group->name == "Wszystkie filmy")
                @continue($group->type == "user")

                <div class="d-flex justify-content-between library-title">
                    <div class="d-flex flex-row library-title-left">
                        <svg class="bi me-2 mt-1" width="28" height="28"><use xlink:href="#watch-later-scrap"/></svg> Do obejrzenia
                    </div>
                    <a class="library-title-right" href="{{route('groupShow', ['id' => $group->id])}}">
                        Pokaż wszystko
                    </a>
                </div>
                <div class="d-flex pb-4 library-movie-contener">
                    @foreach ($group->groupMovie as $gMovie)
                        <a class="movie-card" href="{{route('movieShow', ['id' => $gMovie->movie->id])}}">
                            <div class="movie-image">
                                @if(is_null($gMovie->movie->img))
                                    <img src="{{asset('storage/default/default_movie_img.png')}}" alt="Zdjęcie"  style="background: silver;">
                                @elseif(substr($gMovie->movie->img, 0, 6) == "movies")
                                    <img src="{{asset('storage/'.$gMovie->movie->img)}}" alt="Zdjęcie">
                                @else
                                    <img src="{{$gMovie->movie->img}}" alt="Zdjęcie">
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
                        @break($loop->index == 4)
                    @endforeach
                </div>    
            @endforeach
        </div>
        
        @foreach ($groups as $group)
            <div class="d-flex flex-column mt-4">
                @continue($group->type == "default")
                <div class="d-flex justify-content-between library-title">
                    <div class="d-flex flex-row library-title-left">
                        <svg class="bi me-2 mt-1" width="28" height="28"><use xlink:href="#video-group"/></svg> {{ $group->name }}
                    </div>
                    <a class="library-title-right" href="{{route('groupShow', ['id' => $group->id])}}">
                        Pokaż wszystko
                    </a>
                </div>
                <div class="d-flex pb-4 library-movie-contener">
                    @forelse ($group->groupMovie as $gMovie)  
                        <a class="movie-card" href="{{route('movieShow', ['id' => $gMovie->movie->id])}}">
                            <div class="movie-image">
                                @if(is_null($gMovie->movie->img))
                                    <img src="{{asset('storage/default/default_movie_img.png')}}" alt="Zdjęcie"  style="background: silver;">
                                @elseif(substr($gMovie->movie->img, 0, 6) == "movies")
                                    <img src="{{asset('storage/'.$gMovie->movie->img)}}" alt="Zdjęcie">
                                @else
                                    <img src="{{$gMovie->movie->img}}" alt="Zdjęcie">
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
                        @break($loop->index == 4)
                    @empty
                        <div class="no-movies-library">Brak filmów</div>
                    @endforelse
                </div>
            </div>
        @endforeach  
    </div>
</div>
@endsection