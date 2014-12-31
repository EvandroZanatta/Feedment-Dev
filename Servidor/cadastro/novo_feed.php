<?php

    ob_start();
    header('Content-Type: text/html; charset=utf-8');
    
    //cria um patch com endereço das funcoes
    $fpath = '../funcoes/';
    include $fpath.'limpa_string.php';
    
    if(isset($_GET['erro'])){
        
        echo limpa_str($_GET['erro']);
           
    }

?>


<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
   		<title>Cadastro de Feeds</title>
   </head>   
   <body>

         <center>

   		<table border="1">
   			<tr>
   				<td>
   					<h2>Cadastrar Novo Feed</h2>
   				</td>
   			</tr>
   			<tr>
   				<td>
                  
                  <form action="exec_novo_feed.php" method="POST" name="novo_feed">

                     <label>Nome</label><br>
                     <input type="text" name="nome" required />

                     <br><br>

                     <label>Link</label><br />
                     <input type="url" name="link" required />

                     <br><br>

                     <label>Descrição</label><br />
                     <input type="text" name="desc" required  />

                     <br><br>

                     <label>Categoria</label><br />
                     <select name="categoria" required>
                        <option value="humor">Humor</option>
                        
                     </select>
                     
                     <br><br>             

                     <label>Link da Foto</label><br />
                     <input type="url" name="foto" required />
                     
                     <br><br>             

                     <label>Nome do Modulo</label><br />
                     <input type="text" name="mod" required />

                     <br /><br />

                     <input type="submit" value="Cadastrar" name="submit" />

                  </form>

   				</td>
   			</tr>

   		</table>

      </center>
   </body>
</html>