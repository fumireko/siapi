<?php
include "../Config/config_sistema.php";
$nome = $_REQUEST['nome'];
$senha = $_REQUEST['senha'];
$confsenha = $_REQUEST['confsenha'];
$email = $_POST['email'];
$nivel = $_POST['nivel'];
$id_cmei = $_REQUEST['id_cmei'];

if ($senha != $confsenha)
{
	echo "<script>alert('SENHAS NÃO CONFEREM.');</script>";
	echo "<script>history.go(-1);</script>";
exit;
      	
}

if ($nome !=""){
    $result = mysql_query('SELECT * FROM usuarios where email = "'.$email.'" ');
	if ($result){
		 while ($row = mysql_fetch_assoc($result)) {
		 echo "<font color=red><b>  ".'EMAIL JÁ CADASTRADO :' .$row['email'].' <br>';
		 echo "<font color=red><b>  ".'NOME :' .$row['nome'].' <br>';
	     
    //echo $row['nome'] .' ja cadastrado no sistema';
    exit;
	}
}
}
$sqlinsert  = "INSERT INTO usuarios(nome, senha, email, id_unidade, nivel)
VALUES('$nome','$senha','$email','$id_cmei','$nivel')";
mysql_query($sqlinsert) or die("N�o foi poss�vel inserir os dados"); //Ou vai..., ou racha.
//header("Location:caduser.php");
header("Location:./#/cadusuarios");

?>
