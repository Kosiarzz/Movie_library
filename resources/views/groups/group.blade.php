@extends('layouts.app')

@section('content')
<div class="container mt-4 pb-5">
    <div class="row justify-content-center">
        <div class="d-flex flex-column">
            <div class="d-flex justify-content-between" style="width:1360px;">
                <div class="d-flex flex-row" style="font-size:20px; color:#fff;">
                    <svg class="bi me-2" width="28" height="28"><use xlink:href="#will-view"/></svg> Historia 17 filmów, 19 wyświetleń, Zaktualizowano wczoraj
                </div>
                <div class="" style="font-size:20px; color:#fff;">
                    Menu grupy
                </div>
            </div>
            <div class="d-flex flex-wrap pb-4"  style="width:1360px;">
                @for($i = 1; $i <5; $i++ )
                    <div class="d-flex flex-wrap pb-4"  style="width:1360px;">
                        @for($y = 1; $y <7; $y++ )
                            <a class="movie-card mb-3" href="#" style="width:210px; display:flex; flex-direction:column; cursor:pointer; text-decoration:none;">
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
                        @endfor
                    </div>
                @endfor
            </div>
        </div>
    </div>
</div>
@endsection