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
        console.log(data);
        $.ajax({
            type:'POST',
            url:"/film/dodawanie",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{data:data},
            success:function(data){
                alert(data.success);
            }
        });

    });

});