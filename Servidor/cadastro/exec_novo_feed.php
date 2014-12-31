<?php

    ob_start();
    header('Content-Type: text/html; charset=utf-8');
    
    //declara funcoes
    
    //cria um patch com endereço das funcoes
    $fpath = '../funcoes/';
    include $fpath.'limpa_string.php';
    include $fpath.'verif_link.php';
    include $fpath.'verif_img.php';
    
    if(isset($_POST['submit'])){
    
        //Se o formulario foi enviado
        
        //recebe e limpa as strings
        //nome
        if(isset($_POST['nome'])){
            //$nome = limpa_str($_POST['nome']);
            $nome = addslashes(htmlentities(trim($_POST['nome']), ENT_QUOTES));
        }else{
            break;
        }

        //link
        if(isset($_POST['link'])){
            
            $link = limpa_str($_POST['link']);
            
            if(!verif_link($link)){
                //se o link fornecido não é um link
                header("location: novo_feed.php?erro=O link fornecido não é um link");
                break; 
            }
        }else{
            //Se o link nao foi enviado
            break;
        }
        
        //descrição
        if(isset($_POST['desc'])){
            $descricao = limpa_str($_POST['desc']);   
        }else{
            //se a descrição nao foi enviada
            break;
        }
        
        if(isset($_POST['categoria'])){
            $categoria = limpa_str($_POST['categoria']);
        }else{
            //se a categoria nao foi enviada
            break;
        }
        
        if(isset($_POST['mod'])){
            $modulo = limpa_str($_POST['mod']);
        }else{
            //se o modulo nao foi enviada
            break;
        }
        
        if(isset($_POST['foto'])){
            
            $foto = limpa_str($_POST['foto']);
            
            if(!verif_img($foto)){
                //Se o link da foto está errada
                header("location: novo_feed.php?erro=O link da foto está incorreto");
                break;
            }
            
        }else{
        
        }
        
        include '../conexao.php';
        
        $query_verif_cad = mysql_query("SELECT `id` FROM `feeds` WHERE `nome`='".$nome."';");
        $query_verif_cad_num_rows = mysql_num_rows($query_verif_cad);
        
        
        
        if($query_verif_cad_num_rows > 0){
            //ja existe um feed com esse nome
            header("location: novo_feed.php?erro=Já existe um feed com esse nome");
            break;
        }else{
            
            mysql_query("INSERT INTO `feeds` (`id`, `nome`, `link`, `descricao`, `categoria`, `foto`, `refresh`, `modulo`) VALUES (NULL, '".$nome."', '".$link."', '".$descricao."', '".$categoria."', '".$foto."', 0, '".$modulo."');")
            or die(mysql_error());
            
            
            echo 'Cadastrado com Sucesso!<br>';
            echo 'Você será redirecionado em no maximo 5 segundos!';
            echo '<meta http-equiv="refresh" content="4; url=principal.php">';
            
            
        }
        
        
    }else{
        header("location: novo_feed.php?erro=O formulario nao recebeu submit");
        //Se o formulario NÃO  foi enviado
        
    }

?>