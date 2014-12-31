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

        <link rel="stylesheet" type="text/css" href="estilos/index.css">
        
        <script src="jquery/jquery-1.10.2.min.js"></script>
        
        <link href='http://fonts.googleapis.com/css?family=Engagement' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
        <link href="http://fonts.googleapis.com/css?family=Ruluko" rel="stylesheet" type="text/css">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>
   	<title>FeedMent</title>
    </head>
    <body>
        
        <header>
    
            <div id="top_titulo">
                <a hef="index.php">FeedMent</a>
            </div>
        </header>
        
        <div id="anun">
            <span id="anun_text">O melhor feed de entretenimento da internet</span>
        </div>
        
        <div id="capa">
            <div id="capa_desc">
                <span id="capa_desc_text">
                    Acompanhe as novas postagens dos seus blogs de humor favoritos diretamente da timefeed do FeedMent.
                </span>
            </div>
            
            <div id="capa_inapplet">
                <span id="capa_inapplet_text">Faça seu login usando o InApplet<br />(É necessários estar cadastrado)</span>
                <br /><br /><br />
                <button id="capa_inapplet_botao">InApplet</button>
            </div>
        </div>
        
        <div id="logos">
            
            <div id="logos_box">
                <img id="logos_box_img" src="imagem/logo1.png" />
            </div>
            
            <div id="logos_box">
                <img id="logos_box_img" src="imagem/logo1.png" />
            </div>
            
            <div id="logos_box">
                <img id="logos_box_img" src="imagem/logo1.png" />
            </div>
            
            <div id="logos_box">
                <img id="logos_box_img" src="imagem/logo1.png" />
            </div>
            
        </div>
        
        <div id="site">
            
            <div id="site_desc">
                <span id="site_desc_descr">
                    Veja as postagens diretamente do FeedMent.
                    <br /><br />
                    Temos os melhores blogs e canais do YouTube indexados em nossas bases de dados esperando para ser seguidos.
                    <br /><br />
                    Você pode ver as postagens sem precisar sair do nosso site.
                </span>
            </div>
            
            <div id="site_imagem">
                <img src="imagem/site.jpg" id="site_imagem_img" />
            </div>
            
        </div>
        
        <div id="rodape">
            
            <div id="rodape_left">
                <span id="rodape_left_text">Um Serviço InApplet</span>
            </div>
            
            <div id="rodape_right">
                <a href="#" id="rodape_right_text">Sobre</a>
                <a href="#" id="rodape_right_text">Termos e Privacidade</a>
                <a href="#" id="rodape_right_text">Ajuda</a>
            </div>
            
        </div>
    </body>
</html>