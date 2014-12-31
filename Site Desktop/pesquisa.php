<?php

//##############################
//#### FeedMent ################
//######### By InApplet ########
//##############################

//Arquivo perfil.php
//Pagina onde são mostrados os feeds
//de blog especificos. Onde os usuários
//poderão seguir blogs e ver as
//postagens do feed que está aberto
//o perfil

//Os dados são inicialmente recebidos
//com o PHP, e depois, dinamicamente
//com JQuery com AJAX


    //Arquivos inseridos por padrão
    ob_start();
    header('Content-Type: text/html; charset=utf-8');
    date_default_timezone_set("Brazil/East");
    
    if(isset($_COOKIE['inapplet_id'])){
        include 'conexao.php';
            $busca_dados_user = mysql_query("SELECT foto FROM `usuarios` WHERE id='".$_COOKIE['inapplet_id']."';")or die(mysql_error());
    }else{
        header("location: l");
        break;
    }
    
    if(isset($_GET['q'])){
        
        
        $q = addslashes(htmlentities(trim($_GET['q']), ENT_QUOTES));
        
        include 'conexao.php';
        $query_busca = mysql_query("SELECT id, nome, descricao, foto FROM  `feeds` WHERE  `nome` LIKE  '%".$q."%' ORDER BY RAND() LIMIT 20;")or die(mysql_errno());
        
        
    }else{
        
        include 'conexao.php';
        $query_busca = mysql_query("SELECT id, nome, descricao, foto FROM `feeds` ORDER BY RAND() LIMIT 10;")or die(mysql_error());
        
    }
    
    $query_busca_num_rows = mysql_num_rows($query_busca);
    
    
    
?>


<!DOCTYPE HTML>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        
        <link rel="stylesheet" type="text/css" href="estilos/menus.css">
        <link rel="stylesheet" type="text/css" href="estilos/pesquisa.css">
        
        <script src="jquery/jquery-1.10.2.min.js"></script>
        <script src="javascript/menu.js"></script>
        <script src="javascript/slide_conteudo.js"></script>
        
        <link href='http://fonts.googleapis.com/css?family=Engagement' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
   	<title>FeedMent</title>
    </head>
    <body>
        
        <?php
        
            include "menu_topo.php";
            include 'menu_lateral.php';
        ?>
        
        
   
        <aside>
            <div id="caixa_pesq">
                
                <form action="pesquisa.php" method="get" name="pesquisa">
                    
                    <input type="search" id="pesq_query" name="q" />
                    <input type="submit" id="pesq_button" name="submit" value="Pesquisar" />
                    
                </form>
                
            </div>
            
            <div id="conteudo">
                
                <?php
                
                    if($query_busca_num_rows == 0){
                        
                        echo '<div id="box_cont"><div id="div_img">';
                        echo '<img src="http://globpt.com/wp-content/uploads/2011/08/error404.png" /></div>';
                        
                        echo '<div id="div_cont"><div id="div_head">';
                        echo '<a href="#">Sem resultados</a><br>';
                        echo '</div></div></div>';
                        
                    }else{
                        
                        for($x=0; $x<$query_busca_num_rows; $x++){
                            
                            echo '<div id="box_cont"><div id="div_img">';
                            echo '<img src="'.  mysql_result($query_busca, $x, 'foto').'" /></div>';
                            echo '<div id="div_cont"><div id="div_head">';
                            echo '<a href="perfil.php?id='.mysql_result($query_busca, $x, 'id').'">'.mysql_result($query_busca, $x, 'nome').'</a>';
                            echo '<br>';
                            echo '<span id="sobre">'.mysql_result($query_busca, $x, 'descricao').'</span>';
                            echo '</div></div></div>';
                            
                        }
                        
                    }
                ?>
                
            
            </div>
            
            
        </aside>
        <div id="frame">
            <iframe src="http://feedment.launchrock.com/" name="conteudo"></iframe>
        </div>
    </body>
</html>