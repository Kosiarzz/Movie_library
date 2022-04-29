$(document).ready(function(){
    $( "#hamburger-button" ).click(function() {
        $( "#big-left-menu" ).slideToggle();
    });

    $(".editMovie").click(function(e){

        var data = JSON.parse($(this).attr("data-array"));
        
        $("#inputTitle").val(data.title);
        $("#inputOriginalTitle").val(data.original_title);
        $("#inputGenre").val(data.genres);
        $("#inputCountry").val(data.country);
        $("#inputDate").val(data.year);
        $("#inputTime").val(data.time);
        $("#inputRate").val(data.rate);
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
       
        $.ajax({
            type:'POST',
            url:"/film/dodawanie",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{data:data, type:type},
            success:function(data){
                alert(data.success);
            }
        });

    });

    $("#addDirector").click(function(e){
        
        inputValue = $('#exampleInputDirector').val();

        item = '<li><input type="checkbox" name="directors[]" value="'+ inputValue +'" id="d'+ inputValue +'" checked><label for="d'+ inputValue +'">'+ inputValue +'</label></li>';
        $('#listDirectors').append(item);
        $('#exampleInputDirector').val('');
    });

    $("#addActor").click(function(e){
        
        inputValue = $('#exampleInputActor').val();

        item = '<li><input type="checkbox" name="actors[]" value="'+ inputValue +'" id="a'+ inputValue +'" checked><label for="a'+ inputValue +'">'+ inputValue +'</label></li>';
        $('#listActors').append(item);
        $('#exampleInputActor').val('');
    });

    $("#addCategory").click(function(e){
        
        inputValue = $('#exampleInputCategory').val();

        item = '<li><input type="checkbox" name="categories[]" value="'+ inputValue +'" id="c'+ inputValue +'" checked><label for="c'+ inputValue +'">'+ inputValue +'</label></li>';
        $('#listCategories').append(item);
        $('#exampleInputCategory').val('');
    });


    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
    })



});