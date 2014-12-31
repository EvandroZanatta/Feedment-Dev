<?php

    function verif_numero($num){
        
        if(!preg_match('/^[0-9]*$/', $num)) {
            return FALSE;
        }else{
            return TRUE;
        }
        
    }

?>
