$(document).ready(function(){
    $( "#hamburger-button" ).click(function() {
        $("#big-left-menu").toggle( "slow", function() {
            // Animation complete.
          });
    });

    $(".addToWatch").click(function(e){
        console.log("WATCH")
    });

    $(".addMovie").click(function(e){
        
        e.preventDefault();
        var data = $(this).attr("data-array");
        var type = $(this).attr("data-type")
        console.log(data);
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