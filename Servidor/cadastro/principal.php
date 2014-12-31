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
                                <h2>Cadastro de Feeds</h2>
                                    <a href="novo_feed.php">Cadastrar novo Feed</a>
                            </td>
   			</tr>
   			<tr>
                            <td>
                  
                  <br>
                  <form action="editar_feed.php" method="GET" name="edita_feed">

                     <b><label>Id do Feed a ser editado:</label></b>
                     <br>
                     <input type="number" min="1" name="id" required />
                     <br><br>
                     <input type="submit" value="Editar" />

                  </form>

   				</td>
   			</tr>

   		</table>

      </center>
   </body>
</html>