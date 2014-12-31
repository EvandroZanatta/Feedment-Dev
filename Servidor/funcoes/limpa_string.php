<?php
    
    function limpa_str($str){
        
        $str = addslashes(htmlentities(trim($str), ENT_QUOTES));
        
        return $str;
        
    }

?>
