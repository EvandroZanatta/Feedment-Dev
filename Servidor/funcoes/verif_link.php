<?php

    function verif_link($link){
        if(filter_var($link, FILTER_VALIDATE_URL)){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    
?>