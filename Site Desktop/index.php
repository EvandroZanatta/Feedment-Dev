<?php

//Formula secreta
//SELECT postagens.titulo, postagens.link, postagens.descricao, postagens.time, postagens.feed
//FROM `postagens`
//INNER JOIN `assinantes`
//ON assinantes.id_user='1' && postagens.feed = assinantes.id_feed;

//SELECT postagens.titulo, postagens.link, postagens.descricao, postagens.time, postagens.feed
//FROM `postagens`
//INNER JOIN `assinantes`
//ON assinantes.id_user='1' && postagens.feed = assinantes.id_feed;



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
  
    if(isset($_COOKIE['inapplet_id'])){
        include 'conexao.php';
            $busca_dados_user = mysql_query("SELECT foto FROM `usuarios` WHERE id='".$_COOKIE['inapplet_id']."';")or die(mysql_error());
    }else{
        header("location: l");
        break;
    }
    
    include 'conexao.php';
    $query_busca_postagens = mysql_query("SELECT postagens.titulo, postagens.link, postagens.descricao, postagens.time, postagens.feed, feeds.foto, feeds.nome,  feeds.id FROM `postagens` INNER JOIN `assinantes` ON assinantes.id_user='".$_COOKIE['inapplet_id']."' && postagens.feed = assinantes.id_feed INNER JOIN `feeds` ON postagens.feed = feeds.id ORDER BY postagens.id DESC LIMIT 20;")or die(mysql_error());
    $query_busca_postagens_num_rows = mysql_num_rows($query_busca_postagens);
    
?>


<!DOCTYPE HTML>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        
        <link rel="stylesheet" type="text/css" href="estilos/menus.css">
        <link rel="stylesheet" type="text/css" href="estilos/index.css">
        
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
            <div id="menu_sup">
                <span id="categoria">Feed</span>
                <img src="imagens/destravado.png" id="img_slide" class="destravado" />
                <img src="imagens/atualizar.png" id="img_refresh" />
                
            </div>
            <div id="conteudo">
                
                <?php
                
                    if($query_busca_postagens_num_rows == 0){
                        
                        echo '<div id="box_cont"><div id="div_img"> <img src="http://globpt.com/wp-content/uploads/2011/08/error404.png" /></div>';
                        echo '<div id="div_cont"><div id="div_head"><a href="#">Sem posts!</a></div></div></div>';
                        
                        echo '<div id="div_cont"><div id="div_head">';
                        
                    }else{
                    
                        for($x = 0; $x < $query_busca_postagens_num_rows; $x++){
                            
                            echo '<div id="box_cont"><div id="div_img">';
                            echo '<img src="'.mysql_result($query_busca_postagens, $x, 'foto').'" /></div>';
                            
                            echo '<div id="div_cont"><div id="div_head">';
                            echo '<a id="feed_titulo" href="'.mysql_result($query_busca_postagens, $x, 'link').'" target="conteudo">'.mysql_result($query_busca_postagens, $x, 'titulo').'</a>';
                            echo '<a id="link_feed" href="perfil.php?id='.mysql_result($query_busca_postagens, $x, 'id').'"><span id="feed_name">'.mysql_result($query_busca_postagens, $x, 'nome').'</span></a>';
                            
                         //parte da data ------------------------------------   
                            $fnc_hr_atual=time();
                            $fnc_hr_post = mysql_result($query_busca_postagens, $x, 'time');

                            $fnc_hr_dif = $fnc_hr_atual-$fnc_hr_post;

                            //Se for menos que 1 minuto
                            if($fnc_hr_dif <= 60){
                                //escreva menos de um minuto
                                $fnc_hr_time = '-1 minutos';

                            //se for mais que um minuto e menos que um hora hora
                            }else if(($fnc_hr_dif>60) && ($fnc_hr_dif<=3600)){
                                //mostre os minutos
                                $fnc_hr_time = intval($fnc_hr_dif/60) ." minuto(s)";

                            //se for mais de um hora e menos de um dia
                            }else if(($fnc_hr_dif >3600) && ($fnc_hr_dif<=86400)){
                                //mostre em horas
                                $fnc_hr_time = intval($fnc_hr_dif/3600)." hora(s)";

                            //se for mais de um dia e menos de um mes
                            }else if(($fnc_hr_dif > 86400) && ($fnc_hr_dif<=2629743)){
                                //mostre em dias
                                $fnc_hr_time = intval($fnc_hr_dif/86400)." dia(s)";

                            //se for mais de um mes e menos de um ano
                            }else if(($fnc_hr_dif>2629743) && ($fnc_hr_dif<=31556926)){
                                //mostre em meses
                                $fnc_hr_time = intval($fnc_hr_dif/2629743)." mês(es)";

                            //se for mais de um ano
                            }else{
                                //mostre em anos
                                $fnc_hr_time = intval($fnc_hr_dif/31556926)." ano(s)";
                            }
                            echo '<span id="time">'.$fnc_hr_time.'</span><br>';

                        //parte da data ------------------------------------
                            
                            $descricao = substr(mysql_result($query_busca_postagens, $x, 'descricao'), 0, 40);
                            echo '<span id="sobre">'.$descricao.'...</span>';
                            
                            echo ' </div></div></div>';
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