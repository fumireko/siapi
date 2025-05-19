<?php

// faz conexão com o servidor MySQL
$local_serve = "localhost";//"127.0.0.1";//localhost"; //local do servidor
$usuario_serve = "colomboprgov";//"root";//"colombo";//nome do usuario
$senha_serve = "P%cm3MwK32E2" ;//"";//"lArIi4u96KYh";//senha
$banco_de_dados = "colomboprgov_siap";//nome do banco de dados

 // Rotina para a conexao no server //
/*
$conn = @mysql_connect($local_serve,$usuario_serve,$senha_serve) or die ("O servidor não responde!");
//$conn = ('SET CHARACTER SET utf8');
// conecta-se ao banco de dados
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

*/
$mysqli = new mysqli($local_serve, $usuario_serve, $senha_serve, $banco_de_dados);

if ($mysqli->connect_error) {
    die("O servidor não responde: " . $mysqli->connect_error);
}

// Define o conjunto de caracteres para UTF-8
header('Content-Type: text/html; charset=utf-8');
$mysqli->set_charset("utf8");

//$conn->mysqli_connect($host, $user, $pass, $db1);
$conn = mysqli_connect($local_serve, $usuario_serve, $senha_serve, $banco_de_dados);

/*
//    BASE LOCAL     $conn = mysqli_connect("localhost","root","","pcs");
//$host = '127.0.0.1';
//$user = 'root';
//$pass = '';
//$db1 = 'colomboprgov_siap';
//$db1 = 'colombo_siap';


//   BASE SERVIDOR WEB    $conn = mysqli_connect("177.7.176.164","claudio","a123456*","bdsede");  
 $host = $local_serve; //'138.122.92.70';
 $user = $usuario_serve; //'colombo';
 $pass = $senha_serve; //'lArIi4u96KYh';
 $db1  = $banco_de_dados ; // 'bdsede';
 // Rotina para a conexao local 
   $versao = "1.08.22";
//$conn = @mysqli_connect($host, $user, $pass) or die ("O servidor não responde!");
   $conn = mysqli_connect($host, $user, $pass, $db1);
   mysqli_set_charset($conn, "utf8");
   $db = mysqli_select_db($conn,$db1);



/*/
// Verifica o status da conexão
  if (!$conn) {
      die("A conexão com o banco de dados falhou: " . mysqli_connect_error());
 }
?>
