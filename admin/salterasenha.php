<?php 
include "../validar_session.php"; 
include "../Config/config_sistema.php";
$id_usuario = $_SESSION['id_usuario'];
$pergunta = $_POST['pergunta']; 
$resposta = $_POST['resposta'];
$novasenha = $_POST['novasenha'];
$conf = $_POST['conf'];


if ($novasenha != $conf) {
	echo "<script>alert('Senhas nao conferem.');</script>";
	echo "<script>history.go(-1);</script>";
	exit;
}
$sql = ("UPDATE usuarios SET senha = '$novasenha', pergunta ='$pergunta', resposta ='$resposta' where id = '$id_usuario'");
$consulta = mysql_query($sql);
   	echo "<script>alert('Senha aterada.');</script>";
	echo "<script>history.go(-1);</script>";
	header ("Location:../index.php");
	exit;

?>