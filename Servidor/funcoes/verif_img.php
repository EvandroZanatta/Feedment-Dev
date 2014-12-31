<?php

    function verif_img($link){
        
        if(!filter_var($link, FILTER_VALIDATE_URL)){
            return FALSE;
        }else{
            $link_extensao = substr($link, -4);        
            $link_extensoes_array = array(".jpg", ".png", ".gif", "jpeg", ".JPG", ".PNG", ".GIF", "JPEG");        
            if(in_array($link_extensao, $link_extensoes_array)){
                return TRUE;
            }else{
                return FALSE;
            }
            
        }
        
        
    }

?>

