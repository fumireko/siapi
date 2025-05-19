<?php
include "../Config/config_sistema.php";
$nome = $_REQUEST['nome'];
$senha = $_REQUEST['senha'];
$email = $_POST['email'];
$nivel = $_POST['nivel'];
$id_cmei = $_REQUEST['id_cmei'];

if ($nome !=""){
    $result = mysql_query('SELECT * FROM usuarios where nome = "'.$nome.'" ');
	if ($result){
		 while ($row = mysql_fetch_assoc($result)) {
		 echo "<font color=red><b>  ".'JA EXISTE UM CADASTRO DE :' .$row['nome'].' <br>';
	     
    //echo $row['tbaluno_nome'] .' j� cadastrado no sistema';
    exit;
	}
}

$sqlinsert  = "INSERT INTO usuarios(nome, senha, email, id_unidade, nivel)
VALUES('$nome','$senha','$email','$id_cmei','$nivel')";
mysql_query($sqlinsert) or die("N�o foi poss�vel inserir os dados"); //Ou vai..., ou racha.
//header("Location:caduser.php");
header("Location:./#/cadusuarios");

?>
