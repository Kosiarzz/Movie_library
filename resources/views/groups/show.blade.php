@extends('layouts.app')

@section('content')
<div class="container mt-4 pb-5">
    <div class="row justify-content-center">
        <div class="d-flex flex-column">
            <div class="d-flex justify-content-between" style="width:1360px;">
                <div class="d-flex flex-row" style="font-size:20px; color:#fff;">
                    <svg class="bi me-2" width="28" height="28"><use xlink:href="#will-view"/></svg> {{ $group[0]->name }} {{ count($group[0]->groupMovie) }} filmów, Zaktualizowano {{ $group[0]->updated_at }}
                </div>
                <div class="" style="font-size:20px; color:#fff;">
                    Menu grupy
                </div>
            </div>
            <div class="d-flex flex-wrap pb-4"  style="width:1360px;">
                @forelse ($group[0]->groupMovie as $gMovie)  
                <a class="movie-card" href="{{route('movieShow', ['id' => $gMovie->movie->id])}}" style="width:210px; display:flex; flex-direction:column; cursor:pointer; text-decoration:none;">
                    <div class="movie-image" style="height:300px; width:100%;">
                        <img src="{{ $gMovie->movie->img }}" alt="" style="height:300px; width:210px; position:absolute; z-index:-10; border-radius:5px 5px 0 0;">
                        <div class="movie-info" style="width:100%; display:flex; justify-content:space-between; padding:5px; color:#fff;">
                            <div class="movie-time" style="background:rgb(22,22,22,0.8); padding:3px;" title="Ocena">
                                {{ $gMovie->movie->rate }}
                            </div>
                            <div class="movie-time" style="background:rgb(22,22,22,0.8); padding:3px;" title="Czas trwania">
                                {{ $gMovie->movie->time }}
                            </div>
                        </div>
                        <div style="margin-top:235px; float:right; margin-right:5px;" title="Obejrzane">
                            @if ($gMovie->movie->watched)
                                <svg class="bi" width="28" height="28" role="img" aria-label="Obejrzane"><use xlink:href="#watched"/></svg>
                            @endif
                        </div>
                    </div>
                    <div class="movie-category" style=" width:100%; display:flex; justify-content:space-between; padding:3px 3px 0 3px; color:#fff; font-size:12px; ">
                        <div class="movie-main-category" title="Gatunek">
                            {{ $gMovie->movie->genre->name }}
                        </div>
                        <div class="movie-main-category" title="Rok premiery">
                            {{ $gMovie->movie->year }}
                        </div>
                    </div>
                    <div class="movie-title" style="font-size:16px; padding:0 0 0 0; text-align:center; color:#f7f5f4;" title="Avengers: Wojna bez granic">
                        {{ $gMovie->movie->title }} 
                    </div>
                </a>
            @empty
                <div style="font-size:24px; color:#fff; text-align:center; width:100%; height:250px; line-height:250px;">Brak filmów</div>
            @endforelse
            </div>
        </div>
    </div>
</div>
@endsection