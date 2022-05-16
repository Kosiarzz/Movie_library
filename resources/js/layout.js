$(document).ready(function(){
    $( "#hamburger-button" ).click(function() {
        $( "#big-left-menu" ).slideToggle();
    });

    $(".editMovie").click(function(e){

        var data = JSON.parse($(this).attr("data-array"));

        data.img == null ? $('#movieImgAttr').attr('src', 'http://localhost:8000/storage/default/default_movie_img.png') : $('#movieImgAttr').attr('src', data.img);

        $("#inputImgLink").val(data.img);
        $("#inputTitle").val(data.title);
        $("#inputOriginalTitle").val(data.original_title);
        $("#inputGenre").val(data.genres);
        $("#inputCountry").val(data.country);
        $("#inputDate").val(data.year);
        $("#inputTime").val(data.time);
        $("#inputRate").val(parseInt(data.rate));
        $("#textareaDescription").val(data.description);
        $("#inputVotes").val(data.votes);
        $("#inputImg").val(data.img);

        //Clear checkbox before add
        $('#listDirectors').empty();
        $("#listActors").empty();
        $("#listCategories").empty();

        //Data separation
        directors = (data.directors).replace(/(?<=[a-z])(?=[A-Z])/g, '|').split("|");
        actors = (data.cast).replace(/(?<=[a-z])(?=[A-Z])/g, '|').split("|");

        //Add directors
        directors.forEach(createCheckboxDirectors);

        function createCheckboxDirectors(item) {

            director = '<li><input type="checkbox" name="directors[]" value="'+ item +'" id="d'+ item +'" checked><label for="d'+ item +'">'+ item +'</label></li>';
            $('#listDirectors').append(director);
        }

        //Add actors
        actors.forEach(createCheckboxActors);

        function createCheckboxActors(item) {
            
            actor = '<li><input type="checkbox" name="actors[]" value="'+ item +'" id="d'+ item +'" checked><label for="d'+ item +'">'+ item +'</label></li>';
            $("#listActors").append(actor);
        }
    });

    $(".addMovie").click(function(e){
        
        var data = $(this).attr("data-array");
        var type = $(this).attr("data-type")
        
        decode_json = JSON.parse(data)

        $.ajax({
            type:'POST',
            url:"/film/dodawanie",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{
                data:decode_json, 
                type:type
            },
            success:function(data){
                alert(data.success);
            },
            error:function(data){
                alert("error");
            },
            
        });

    });

    numberAdd = 0;

    $("#addDirector").click(function(e){
        
        inputValue = $('#inputDirector').val();

        item = '<li><input type="checkbox" name="directors[]" value="'+ inputValue +'" id="d'+ inputValue + numberAdd +'" checked><label for="d'+ inputValue + numberAdd +'">'+ inputValue +'</label></li>';
        $('#listDirectors').append(item);
        $('#inputDirector').val('');
        numberAdd++;
    });

    $("#addActor").click(function(e){
        
        inputValue = $('#inputActor').val();

        item = '<li><input type="checkbox" name="actors[]" value="'+ inputValue +'" id="a'+ inputValue + numberAdd +'" checked><label for="a'+ inputValue + numberAdd +'">'+ inputValue +'</label></li>';
        $('#listActors').append(item);
        $('#inputActor').val('');
        numberAdd++;
    });

    $("#addCategory").click(function(e){
        
        inputValue = $('#inputCategory').val();

        item = '<li><input type="checkbox" name="categories[]" value="'+ inputValue +'" id="c'+ inputValue + numberAdd +'" checked><label for="c'+ inputValue + numberAdd +'">'+ inputValue +'</label></li>';
        $('#listCategories').append(item);
        $('#inputCategory').val('');
        numberAdd++;
    });


    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
    })



});