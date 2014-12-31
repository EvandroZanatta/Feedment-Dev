<?php

    ob_start();
    header('Content-Type: text/html; charset=utf-8');
    date_default_timezone_set("Brazil/East");
    
    include '../conexao.php';
    
    //seleciona um feed pra ser atualizado
    $busca_feed = mysql_query("SELECT `id` FROM `feeds` ORDER BY `refresh` LIMIT 0, 1;");
    $busca_feed_num_rows = mysql_num_rows($busca_feed);
    
    if($busca_feed_num_rows == 0){
        //Nao existe site para atualizar
        echo 'Não existe sites para atualizar';
    }else{
        $busca_modulo = mysql_query("SELECT `nome`, `modulo` FROM `feeds` WHERE `id`='".mysql_result($busca_feed, 0, 'id')."';");
        include "modulos/".mysql_result($busca_modulo, 0, 'modulo').".php";
        echo mysql_result($busca_modulo, 0, "nome")." Atualizado as ".date('H:i:s');
    }
    

?>
