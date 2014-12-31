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
    
    $id_pagina = addslashes(htmlentities(utf8_decode(trim($_GET['id'])), ENT_QUOTES));
    
    if(preg_match('(^[0-9]+$)',$id_pagina)){
	
        $query_busca_feed = mysql_query("SELECT `nome`, `link`, `descricao`, `categoria`, `foto` FROM feeds WHERE id = '".$id_pagina."';")or die(mysql_error());
        $query_busca_feed_num_rows = mysql_num_rows($query_busca_feed);
        
        if($query_busca_feed_num_rows != 1){
            header("location: index.php");
            break;
        }
    }else{
        header("location: index.php");
        break;
    }
    
    $query_busca_postagens = mysql_query("SELECT `titulo`, `link`, `descricao`, time FROM `postagens` WHERE feed = '".$id_pagina."' ORDER BY id DESC LIMIT 15;")or die(mysql_error());
    $query_busca_postagens_num_rows = mysql_num_rows($query_busca_postagens);
    
?>


<!DOCTYPE HTML>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        
        <link rel="stylesheet" type="text/css" href="estilos/menus.css">
        <link rel="stylesheet" type="text/css" href="estilos/perfil.css">
        
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
            <div id="top_perfil">
                
                <div id="top_img" style="background-image:url('<?php echo mysql_result($query_busca_feed, 0, 'foto'); ?>');">
                    
                </div>
                <div id="top_cont">
                    
                    <?php
                    
                        $query_busca_add = mysql_query("SELECT `id` FROM `assinantes` WHERE id_user='".$_COOKIE['inapplet_id']."' && id_feed='".$id_pagina."';")or die(mysql_error());
                        $query_busca_add_num_rows = mysql_num_rows($query_busca_add);
                        
                        echo '<a href="seguir.php?id='.$id_pagina.'">';
                        
                        if($query_busca_add_num_rows == 0){
                            echo '<img src="imagens/adicionar.png" id="cont_add" class="add_adicionar" />';
                        }else{
                            echo '<img src="imagens/adicionado.png" id="cont_add" class="add_remover" />';
                        }
                        
                        echo '</a>';
                    
                    ?>
                    <span id="cont_titulo"><?php echo mysql_result($query_busca_feed, 0, 'nome'); ?></span>
                    <br />
                    <a id="cont_link" href="<?php echo mysql_result($query_busca_feed, 0, 'link'); ?>" target="conteudo">
                        <?php
                            
                            $verifica_link_page = mysql_result($query_busca_feed, 0, 'link');
                            $verifica_link_http = substr($verifica_link_page, 0, 5);
                            
                            if($verifica_link_http == 'https'){
                                $verifica_link_final = substr($verifica_link_page, 8);;
                            }else{
                                $verifica_link_final = substr($verifica_link_page, 7);;
                            }
                            echo $verifica_link_final;
                        ?></a>
                    <br />
                    <span id="cont_categoria">
                        <?php 
                        switch (mysql_result($query_busca_feed, 0, 'categoria')) {
                            case 'humor':
                                echo 'Humor';
                                break;
                        }
                        ?>
                    </span>
                    
                </div>
            </div>
            
            <div id="top_descrição">
                <span id="desc_descri"><?php echo mysql_result($query_busca_feed, 0, 'descricao') ?></span>
            </div>
            
            <div id="conteudo">
                
                <?php
                
                    for($x=0; $x<$query_busca_postagens_num_rows; $x++){
                        echo '<div id="box_cont"><div id="div_cont"><div id="div_head">';
                        echo '<a href="'.  mysql_result($query_busca_postagens, $x, 'link').'" target="conteudo">'.  mysql_result($query_busca_postagens, $x, 'titulo').'</a>';
                        
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
                        
                        $descricao = substr(mysql_result($query_busca_postagens, $x, 'descricao'), 0, 90);
                                
                        
                        
                        echo '<span id="sobre">'.$descricao.'...</span>';
                        echo '</div></div></div>';   
                    }  
                ?>
              
            </div>
            
        </aside>
        <div id="frame">
            <iframe src="http://feedment.launchrock.com/" name="conteudo"></iframe>
        </div>
    </body>
</html>