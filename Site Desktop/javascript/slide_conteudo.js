$(document).ready(function(){
    
    function esconde_feed(){
        $("aside").css("left","-346px");
        $("#frame").css("left","55px");
        $("nav > ul > li:first").css("background-color", "#c0392b");
    }

    function mostra_feed(){
        $("aside").css("left", "55px");
        $("#frame").css("left", "455px");
        $("nav > ul > li:first").css("background-color", "#222");
    }
    
    function trava(){
        $("#img_slide").attr('src', 'imagens/travado.png');
        $("#img_slide").removeClass("destravado");
        $("#img_slide").addClass("travado");
    }
    
    function destrava(){
        $("#img_slide").attr('src', 'imagens/destravado.png');
        $("#img_slide").removeClass("travado");
        $("#img_slide").addClass("destravado");
    }
    
    $("#img_slide").click(function(){
        
        var trava_stts = $('#img_slide').attr('class');
        if(trava_stts == "destravado"){
            trava();
        }else{
            destrava();
        }
    });
    
   
    
    $("#div_head > a").click(function(){
        var trava = $('#img_slide').attr('class');
        
        if(trava == "destravado"){
            setTimeout(esconde_feed, 1500);
        }
    });
    
    $("nav > ul > li:first").click(function(){
     
        var posic =$("#frame").offset();
        if(posic.left < 100){
            mostra_feed();
        }else{
            esconde_feed();
        }
    });
    
    $("#img_refresh").click(function(){
        location.reload();
    });
});

