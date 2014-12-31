$(document).ready(function(){
    
    $("#menu_user").hide();
    
    posiçãoReal = $("#top_user").offset();
    posicaoLeft = ((posiçãoReal.left-42)-60);
    
    $("#menu_user").css("left", posicaoLeft);
    
    
    
    $("#top_user_img").click(function(){
        if($('#menu_user').is(':visible')){
            $("#menu_user").hide();
        }else{
            $("#menu_user").show();
        }
    });
    
    $("#menu_user").on( "mouseleave", function() {
        $("#menu_user").hide();
    });
    
    $(".menu_sobre").click(function(){
       $(window.document.location).attr('href', "http://www.codigofonte.com.br/"); 
    });
    
});