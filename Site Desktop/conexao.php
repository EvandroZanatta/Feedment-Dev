<?php

$host_servidor = "localhost"; //localhost / 127.0.1.1 / ip do banco de daods
$usuario = "root"; //nome do usuario do banco de dados / root
$senha = ""; //senha do usuario
$banco_nome = "feedment1"; //nome do banco de dados

//faz a conexao
$conect = mysql_connect($host_servidor, $usuario, $senha);

// Caso a conexão seja reprovada, exibe na tela uma mensagem de erro
if (!$conect) die ("<h1>Falha na conecão com o Banco de Dados!</h1>");

// Caso a conexão seja aprovada, então conecta o Banco de Dados.	
$db = mysql_select_db($banco_nome);

if (!$db) die ("<h1>Falha na seleção do Banco de Dados!</h1>");

?>
