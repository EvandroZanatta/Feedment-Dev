<?php

    ob_start();
    header('Content-Type: text/html; charset=utf-8');
    
    //declara funcoes
    
    //cria um patch com endereço das funcoes
    $fpath = '../funcoes/';
    include $fpath.'verif_numero.php';
    
    if(isset($_GET['id'])){
        
        $verif_numero = verif_numero($_GET['id']);
        
        if(!$verif_numero){
            //não é um numero
            break;
          
        }else{
            
            if($_GET['id'] > 0){
                
                $id = $_GET['id'];
                
                include '../conexao.php';
                
                $query_busca_feed = mysql_query("SELECT * FROM `feeds` WHERE `id`='".$id."';")or die(mysql_error());
                $query_busca_feed_num_rows = mysql_num_rows($query_busca_feed);
                
                if($query_busca_feed_num_rows == 0){
                    //Não existe esse feed
                    break;
                }
                
            }else{
                //é menor ou igual a 0
                break;
            }
            
        }
        
    }
?>

<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
   		<title>Editar Feed</title>
   </head>   
   <body>

         <center>

   		<table border="1">
   			<tr>
   				<td>
   					<h2>Editar Feed</h2>
   				</td>
   			</tr>
   			<tr>
   				<td>
                  
                  <form action="exec_edita_feed.php" method="POST" name="novo_feed">
                      
                      <input type="hidden" name="id" value="<?php echo mysql_result($query_busca_feed, 0, 'id') ?>" />
                      
                     <label>Nome</label><br>
                     <input type="text" name="nome" value="<?php echo mysql_result($query_busca_feed, 0, 'nome') ?>" required />

                     <br><br>

                     <label>Link</label><br />
                     <input type="url" name="link" value="<?php echo mysql_result($query_busca_feed, 0, 'link') ?>" required />

                     <br><br>

                     <label>Descrição</label><br />
                     <input type="text" name="desc" value="<?php echo mysql_result($query_busca_feed, 0, 'descricao') ?>" required  />

                     <br><br>

                     <label>Categoria</label><br />
                     <select name="categoria" required>
                        <?php
                            $categoria = mysql_result($query_busca_feed, 0, 'categoria');
                            echo '<option value="'.$categoria.'">'.$categoria.'</option>'
                         ?>
                        <option value="humor">Humor</option>
                        
                     </select>
                     
                     <br><br>             

                     <label>Link da Foto</label><br />
                     <input type="url" name="foto" value="<?php echo mysql_result($query_busca_feed, 0, 'foto') ?>" required />
                     
                     <br><br>             

                     <label>Nome do Modulo</label><br />
                     <input type="text" name="mod" value="<?php echo mysql_result($query_busca_feed, 0, 'modulo') ?>" required />
                     <br /><br />

                     <input type="submit" name="submit" value="Editar" />

                  </form>

                        </td>
   			</tr>

   		</table>

      </center>
   </body>
</html>