<?php

    //Código Padrão
    ob_start();
    header('Content-Type: text/html; charset=utf-8');
    date_default_timezone_set("Brazil/East");
    $time = time();
    
    //--------=== Inicio do Processo de Cadastro de Postagens ===--------
    
    //Link do RSS em XML e cria uma nova classe
    $feed = file_get_contents('http://feeds.feedburner.com/Nao-Salvo?format=xml');
    $rss = new SimpleXmlElement($feed);
    
    //---- Config Padrao ----
    //id do feed
    $id_feed = 1;
    //-----------------------
    
    //---- Include e var padrao ------
    //inclui o banco de dados
    include '../conexao.php';
    //cria um contador
    $cont = 1;
    //var de status - se existe itens
    $isset_itens = FALSE;
    //------------------
    
    //corre todos os "itens"
    foreach($rss->channel->item as $entrada){
        
        //pega o nome e verifica se existe no banco de dados
        $titulo = $entrada->title;
        $query_verif_post = mysql_query("SELECT `id` FROM `postagens` WHERE `titulo`='".$titulo."';");
        $query_verif_post_num_rows = mysql_num_rows($query_verif_post);
        
        //verifica se existe ja a postagem
        if($query_verif_post_num_rows > 0){
            //Ja existe
        }else{
            //Não existe ainda

            //recebe os dados e coloca em uma variavel
            $link = $entrada->link;
            $desc = $entrada->description;
            $desc = strip_tags($desc);
            
            //insere os dados em um array
            //ordem -> titulo, link, desc
            $itens[$cont][0] = $titulo;
            $itens[$cont][1] = $link;
            $itens[$cont][2] = $desc;
            
            //informa que existe um registro no array
            $isset_itens = TRUE;
            //incrementa 1 no contador
            $cont++;
        }
        
    }
    
    
    //verifica se existe algum item a ser inserido
    if($isset_itens){
        
        //conta o numero de itens
        $tam_array = count($itens);
        //inverte o array para ficar em ordem da mais recente
        //para a mais antiga
        $itens=array_reverse($itens);
        
        //Insere os itens 1 a 1
        for($x=0; $x<$tam_array; $x++){

            //faz o insert da postagem
            mysql_query("INSERT INTO `postagens`(`id`, `titulo`, `link`, `descricao`, `time`, `feed`) VALUES (NULL,'".$itens[$x][0]."', '".$itens[$x][1]."', '".$itens[$x][2]."', '".$time."', '".$id_feed."');");
        }
        
        echo $tam_array." novas postagens foram adicionadas.<br>";
        
    }else{
        echo 'Nenhuma nova postagem foi adicionada!<br>';
    }
    
    //faz um update na hora da ultima atualização do feed
    mysql_query("UPDATE `feeds` SET `refresh`='".$time."' WHERE `id`= '".$id_feed."';") or die(mysql_error());
?>

