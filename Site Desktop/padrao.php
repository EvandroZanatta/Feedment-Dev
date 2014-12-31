<?php

//##############################
//#### FeedMent ################
//######### By InApplet ########
//##############################

//Arquivo index.php
//Pagina que tem a função de mostrar
//as postagens dos feeds seguidos
//pelo usuário

//Os dados são inicialmente recebidos
//com o PHP, e depois, dinamicamente
//com JQuery com AJAX


    //Arquivos inseridos por padrão
    ob_start();
    header('Content-Type: text/html; charset=utf-8');
    date_default_timezone_set("Brazil/East");
    
    
?>


<!DOCTYPE HTML>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <link href='http://fonts.googleapis.com/css?family=Engagement' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
   	<link rel="stylesheet" type="text/css" href="estilos/menus.css">
        <script src="jquery/jquery-1.10.2.min.js"></script>
        <script src="javascript/menu.js"></script>
   	<title></title>
    </head>
    <body>
        
        <?php
        
            include "menu_topo.php";
            
            include 'menu_lateral.php';
        
        ?>
        
        
        
    </body>
</html>