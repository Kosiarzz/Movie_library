@extends('layouts.app')

@section('content')
<div class="ddd p-0" style="width:100%;">
    <div class="d m-0" style="width:100%; height:50px; display:flex; flex-direction:row; border-bottom:solid 1px #d2d2d2; border-top:solid 1px #d2d2d2; background:#202020; padding:8px 20px;">
        <div class="top-category active" style="">
            Wszystkie filmy
        </div>   
        @for ($i = 1; $i <10; $i++ )
            <div class="top-category" style="">
                Horror
            </div>   
        @endfor
    </div>

    <div class="dd" style="width:1800px; min-height:500px; margin-left:25px; margin-top:35px; background:gre; display:flex; flex-wrap: wrap; border-radius:5px;">
        
        @for($i = 1; $i <20; $i++ )
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
        @endfor
    </div>
</div>
@endsection
