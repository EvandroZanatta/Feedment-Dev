<?php

    //verifica se foram enviados os dados po GET
    //if(isset($_GET['id'])){
        
        //verifica se o id é um numero
        if(preg_match("(^[0-9]+$)", $_GET['id'])){
            
            $id_user = $_COOKIE['inapplet_id'];
            $id_feed = $_GET['id'];
            
            include 'conexao.php';
            
            $query_verifica_add_user = mysql_query("SELECT id FROM `assinantes` WHERE id_user = '".$id_user."' && id_feed='".$id_feed."';")or die(mysql_error());
            $query_verifica_add_user_num_rows = mysql_num_rows($query_verifica_add_user);
            
                if($query_verifica_add_user_num_rows == 0){
                    mysql_query("INSERT INTO `feedment1`.`assinantes` (`id`, `id_user`, `id_feed`, `favorito`) VALUES (NULL, '".$id_user."', '".$id_feed."', '0');")or die(mysql_error());
                    echo 'cadastrado';
                }else{
                    mysql_query("DELETE FROM `assinantes` WHERE `id_user`='".$id_user."' && `id_feed` = '".$id_feed."';")or die(mysql_error());
                    echo 'deletado!';
                }
                
                header("location: perfil.php?id=".$id_feed);
                break;
            
        }else{
            header("location: index.php");
            break;
        }
        
    

?>