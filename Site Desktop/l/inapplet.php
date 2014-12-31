    <?php

    //Código Padrão
        ob_start();
        header('Content-Type: text/html; charset=utf-8');

    //Se o site estiver requisitando
    if(!(isset($_GET['inapplet_return']))){

        //Insere os ids fornecidos no site
        $site = "9";
        $requisicao = "4";

        //redireciona o usuário ao InAuth
        header("location: http://inapplet.com/inauth/index.php?site=".$site."&req=".$requisicao);
        
    //Se retornou os dados do InAuth    
    }else{
        
        //Se foi retornado o ID do usuário
        if(isset($_GET['id'])){

            //Recebe e limpa a string anti SQL/PHP-Inject
            $rec_inapplet_id = addslashes(htmlentities(utf8_decode(trim($_GET['id'])), ENT_QUOTES));
        }
        
        if(isset($_GET['nome'])){

            //Recebe e limpa a string anti SQL/PHP-Inject
            $rec_inapplet_nome = addslashes(htmlentities(utf8_decode(trim($_GET['nome'])), ENT_QUOTES));
        }

        //Se foi retornado o nome do usuário
        if(isset($_GET['link_img_perfil'])){
            
            //Recebe e limpa a string anti SQL/PHP-Inject
            $rec_inapplet_link_img_perfil= addslashes(htmlentities(utf8_decode(trim($_GET['link_img_perfil'])), ENT_QUOTES));
        }
        
        include '../conexao.php';
        
        $busca_user = mysql_query("SELECT id FROM `usuarios` WHERE id='".$rec_inapplet_id."'");
        $busca_user_num_rows = mysql_num_rows($busca_user);
        
        if($busca_user_num_rows == 0){
            
            //insere um novo usuário ao banco de dados
            mysql_query("INSERT INTO `feedment1`.`usuarios` (`id`, `nome`, `foto`) VALUES ('".$rec_inapplet_id."', '".$rec_inapplet_nome."', '".$rec_inapplet_link_img_perfil."');")or die(mysql_error());
            
        }
        
        //Cria cookies com os dados recebidos
        setcookie("inapplet_id", $rec_inapplet_id, time()+604800, "/");
        
        //retorna ao site
        header("location: ../index.php");
    }
?>
