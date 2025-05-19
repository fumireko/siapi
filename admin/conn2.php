<?php
// faz conexão com o servidor MySQL
//include "Config/config_sistema.php";

/*
// acesso a base web
 $local_serve = "127.0.0.1";//localhost"; //local do servidor
 $usuario_serve = "colomboprgov";//"root";//"colombo";//nome do usuario
 $senha_serve = "P%cm3MwK32E2";//"";//"lArIi4u96KYh";//senha
 $banco_de_dados = "colomboprgov_siap";//nome do banco de dados
 */

// acesso a base local
$local_serve = "localhost";//"127.0.0.1";//localhost"; //local do servidor
$usuario_serve = "root";//colomboprgov";//root";//"colombo";//nome do usuario
$senha_serve = "";//"lArIi4u96KYh";//senha
$banco_de_dados = "colomboprgov_siap";//nome do banco de dados





 $servidor = $local_serve; //"localhost"; //local do servidor

// acesso a base local
$usuario = $usuario_serve;//"root";//nome do usuario
$senha = $senha_serve;//"";//"lArIi4u96KYh";//senha
$bancodedados = $banco_de_dados;

// acesso a base web
//$usuario = "colombo";//nome do usuario
//$senha = "lArIi4u96KYh";//senha

//$bancodedados = "colombo_siap";//nome do banco de dados

$mysqli = new mysqli($servidor, $usuario, $senha, $bancodedados);
 $conn = mysqli_connect($servidor, $usuario, $senha, $bancodedados);
// mysqli_query($conn, 'SET character_set_results=utf8');

?>
