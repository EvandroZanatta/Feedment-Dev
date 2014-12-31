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
        
        //recebe id
        $id = limpa_str($_POST['id']);
        
        //recebe e limpa as strings
        //nome
        if(isset($_POST['nome'])){
            $nome = limpa_str($_POST['nome']);   
        }else{
            break;
        }
        
        //link
        if(isset($_POST['link'])){
            
            $link = limpa_str($_POST['link']);
            
            if(!verif_link($link)){
                //se o link fornecido não é um link
                header("location: editar_feed.php?erro=O link fornecido não é um link");
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
            //se o modulo nao foi enviado
            break;
        }
        
        if(isset($_POST['foto'])){
            
            $foto = limpa_str($_POST['foto']);
            
            if(!verif_img($foto)){
                //Se o link da foto está errada
                header("location: editar_feed.php?erro=O link da foto está incorreto");
                break;
            }
            
        }else{
        
        }
        
        include '../conexao.php';      
        
        mysql_query("UPDATE `feeds` SET `nome`='".$nome."',`link`='".$link."',`descricao`='".$descricao."',`categoria`='".$categoria."',`foto`='".$foto."', `modulo`='".$modulo."' WHERE `id`='".$id."';")
        or die(mysql_error());

        echo 'Editado com Sucesso!<br>';
        echo 'Você será redirecionado em no maximo 5 segundos!';
        echo '<meta http-equiv="refresh" content="4; url=principal.php">';
        
    }else{
        header("location: editar_feed.php?erro=O formulario nao recebeu submit");
        //Se o formulario NÃO  foi enviado
        
    }

?>