    <?php

    //Código Padrão
        ob_start();
        header('Content-Type: text/html; charset=utf-8');

    //Se o site estiver requisitando
    if(!(isset($_GET['inapplet_return']))){

        //Insere os ids fornecidos no site
        $site = "9";
        $requisicao = "2";

        //redireciona o usuário ao InAuth
        header("location: http://inapplet.com/inauth/index.php?site=".$site."&req=".$requisicao);
        
    //Se retornou os dados do InAuth    
    }else{
        
        //Se foi retornado o ID do usuário
        if(isset($_GET['id'])){

            //Recebe e limpa a string anti SQL/PHP-Inject
            $rec_inapplet_id = addslashes(htmlentities(utf8_decode(trim($_GET['id'])), ENT_QUOTES));

            //Cria cookies com os dados recebidos
            setcookie("inapplet_feed_id", $rec_inapplet_id, time()+3600, '/');
        
            //retorna ao site
            header("location: principal.php");
        }
        
    }
?>
