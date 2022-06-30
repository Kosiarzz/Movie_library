$(document).ready(function(){
    //drop-down menu
    $( "#hamburger-button" ).click(function() {
        $( "#big-left-menu" ).slideToggle();
    });

    //delete alert, scrap view
    $(".alert-delete").click(function(e){
        $(this).parent('div').remove();
    });

    //preview image from input type file
    $('#inputImgFile').change(function(){
        const file = this.files[0];

        if (file){
          let reader = new FileReader();

          reader.onload = function(event){
            $('#movieImgAttr').attr('src', event.target.result);
          }

          reader.readAsDataURL(file);
        }
    });

    //preview image from link 
    $('#inputImgLink').change(function(){
        const link = $( "#inputImgLink" ).val();
        $('#movieImgAttr').attr('src', link);
    });

    //custom movie - edit movie before add, scrap view
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

    //fast add movie to databse
    alertNumber = 0; //id alerts
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
                item = '<div id="alert" class="scrap-alert-message success">Film został dodany! </div>';
                $('#scrap-box-alert').append(item);

                setTimeout(function(){
                    $('#alert').remove();
                }, 3000);

                alertNumber++;
            },
            error:function(data){
                item = '<div id="alert" class="scrap-alert-message error">Błąd podczas dodawania filmu! </div>';
                console.log(data);
                $('#scrap-box-alert').append(item);

                setTimeout(function(){
                    $('#alert').remove();
                }, 3000);

                alertNumber++;
            },
            
        });

    });

    //id added director, actor, categories
    numberAdd = 0;
    currentDirectors = 0;
    currentActors = 0;
    currentCategories = 0;

    //add director
    $("#addDirector").click(function(e){
    
        limitDirector = 20;
        limitCharacter = 100;

        inputValue = $('#inputDirector').val();

        if (inputValue && inputValue.length < limitCharacter) {
            item = '<li><input type="checkbox" name="directors[]" value="'+ inputValue +'" id="d'+ inputValue + numberAdd +'" checked><label for="d'+ inputValue + numberAdd +'">'+ inputValue +'</label></li>';
            $('#listDirectors').append(item);
            $('#inputDirector').val('');
            numberAdd++;
            currentDirectors++;
        }

        //disbale the adding director button 
        if(currentDirectors >= limitDirector){
            this.disabled = true;
        }
    });

    //add actor
    $("#addActor").click(function(e){
        
        limitActors = 20;
        limitCharacter = 100;

        inputValue = $('#inputActor').val();

        if (inputValue && inputValue.length < limitCharacter) {
            item = '<li><input type="checkbox" name="actors[]" value="'+ inputValue +'" id="a'+ inputValue + numberAdd +'" checked><label for="a'+ inputValue + numberAdd +'">'+ inputValue +'</label></li>';
            $('#listActors').append(item);
            $('#inputActor').val('');
            numberAdd++;
            currentActors++;
        }

        //disbale the adding actor button 
        if(currentActors >= limitActors){
            this.disabled = true;
        }
    });

    //add category
    $("#addCategory").click(function(e){
        
        limitCategories = 50;
        limitCharacter = 100;

        inputValue = $('#inputCategory').val();

        if (inputValue && inputValue.length < limitCharacter) {
            item = '<li><input type="checkbox" name="categories[]" value="'+ inputValue +'" id="c'+ inputValue + numberAdd +'" checked><label for="c'+ inputValue + numberAdd +'">'+ inputValue +'</label></li>';
            $('#listCategories').append(item);
            $('#inputCategory').val('');
            numberAdd++;
            currentCategories++;
        }
        
        //disbale the adding category button 
        if(currentCategories >= limitCategories){
            this.disabled = true;
        }
    });

    //show modals
    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
    })

});