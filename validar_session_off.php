<?php
include ('bco_fun.php');

//   BASE SERVIDOR local   
$host = "127.0.0.1";
//$user = "root";
//$pass = "";
//$db = "colombo_siap";


//   BASE SERVIDOR WEB    $conn = mysqli_connect("177.7.176.164","claudio","a123456*","bdsede");  
//$host = '138.122.92.70';
$user = 'colomboprgov';
$pass = 'P%cm3MwK32E2';
$db   = 'colomboprgov_siap';




$versao = "1.08.22";
//$conn = @mysqli_connect($host, $user, $pass) or die ("O servidor não responde!");
$conn = mysqli_connect($host,$user,$pass,$db);
mysqli_set_charset($conn, "utf8");
$db = mysqli_select_db($conn, $db);
// Verifica o status da conexão
if (!$conn) {
    die("A conexão com o banco de dados falhou: " . mysqli_connect_error());
}



//session_start();

$id_usuario = "externo";
$email_usuario = "externo";
$senha_usuario = "externo";
$nivel_usuario = "1";
$funcao_usuario = "externo";
$nome_usuario = "externo";
$unidade_usuario = "externo";
$tbcmei_nome = "externo";
$sec_id = "externo";
$sec_nome = "externo";


?>