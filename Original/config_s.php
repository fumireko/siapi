<?php
// faz conex�o com o servidor MySQL
    $local_serve = "localhost";// local do servidor
    $usuario_serve = "colombo_siap";// nome do usuario
    $senha_serve = "Guwgw2dz0Bs7"; // senha
    $banco_de_dados ="colombo_suporte";// nome do banco de dados
    $conn = @mysql_connect($local_serve,$usuario_serve,$senha_serve) or die ("O servidor nao responde!");
    // conecta-se ao banco de dados
    $db = @mysql_select_db($banco_de_dados,$conn) 
    or die ("N�o foi possivel conectar-se ao banco de dados!");
    $db = @mysql_select_db($banco_de_dados,$conn) 
	or die ("Não foi possivel conectar-se ao banco de dados!");
	  //O tipo de caracteres a ser usado
	  header('Content-Type: text/html; charset=utf-8');
	  //Depois da tua conexão a base de dados insere o seguinte código abaixo.
	  //Esta parte vai resolver o teu problema!
	   mysql_query("SET NAMES 'utf8'");
	   mysql_query('SET character_set_connection=utf8');
	   mysql_query('SET character_set_client=utf8');
	   mysql_query('SET character_set_results=utf8');	
?>
