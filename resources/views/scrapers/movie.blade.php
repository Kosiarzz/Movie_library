@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="row">
            <div class="d-flex justify-content-center">
              <form method="GET" >
                  <input type="text" name="name" class="inputSearchMovie" placeholder="Nazwa filmu"/>
                  <input type="submit" class="movieSearchButton" value="Szukaj" />
              </form>
            </div>
        </div>

        <div class="row p-0 m-0 mt-4">
            @foreach ( $movies as $movie)
              <div class="movieBox">
                <div class="movieImage">
                  <img src="{{ $movie['img'] }}" alt="Zdjęcie" />
                </div>  
                <div class="movieInfo">
                  <div class="movieTitle">
                    {{ $movie['title'] }}
                  </div>  
                  <div class="movieOriginalTitle">
                    {{ $movie['original_title'] }}
                  </div> 
                  <div class="movieGenres">
                    {{ $movie['genres'] }}
                  </div> 
                  <div class="movieStats">
                    <div class="movieYear">
                        {{ $movie['year'] }}
                    </div> 
                    <div class="movieTime">
                        {{ $movie['time'] }}
                    </div> 
                    <div class="movieRate"> 
                        {{ $movie['rate'] }}
                    </div> 
                  </div>  
                  <div class="movieDescription">
                    {{ $movie['description'] }}
                  </div> 
                  <div class="movieBottom">
                    <div class="movieBottomLeft">
                      <div class="movieDirectors mt-2">
                        Reżyser: {{ $movie['directors'] }}
                      </div>
                      <div class="movieActors">
                        Aktorzy: {{ $movie['cast'] }}
                      </div>
                    </div>
                    <div class="movieBottomRight">
                      <button class="movieSearchButton">+</button>
                    </div>
                  </div>
                </div>
              </div>
                              
            @endforeach
        </div>
    </div>
</div>
@endsection


@push('script')
<script>
        
    $(document).ready(function () {

        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            }
        });

        var calendar = $('#calendar').fullCalendar({
            monthNames: ['Styczeń','Luty','Marzec','Kwiecień','Maj','Czerwiec','Lipiec','Sierpień','Wrzesień','Październik','Listopad','Grudzień'],
            dayNamesShort: ['Poniedziałek','Wtorek','Środa','Czwartek','Piątek','Sobota','Niedziela'],
            editable:false,
            header:{
                left:'title',
                right:'today, prev, next'
            },
            events:'{{url("/")}}/uzytkownik/wydarzenie/daty/kalendarz',
            selectable: false,
            selectHelper: false,
            editable:false,
            select:function(start, end, allDay)
            {
                var title = prompt('Event Title:');

                if(title)
                {
                    var start = $.fullCalendar.formatDate(start, 'Y-MM-DD HH:mm:ss');

                    var end = $.fullCalendar.formatDate(end, 'Y-MM-DD HH:mm:ss');

                    $.ajax({
                        url:'{{url("/")}}/full-calender/action',
                        type:"POST",
                        data:{
                            title: title,
                            start: start,
                            end: end,
                            type: 'add'
                        },
                        success:function(data)
                        {
                            calendar.fullCalendar('refetchEvents');
                            alert("Event Created Successfully");
                        }
                    })
                }
            },
        });

        $(this).find(".fc-today-button").text("Dziś");
    });


    $( "a" ).removeClass( "active" );
    $("#date").addClass("active");
</script>
@endpush