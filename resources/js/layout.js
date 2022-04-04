$(document).ready(function(){
    $( "#hamburger-button" ).click(function() {
        $("#big-left-menu").toggle( "slow", function() {
            // Animation complete.
          });
    });
});