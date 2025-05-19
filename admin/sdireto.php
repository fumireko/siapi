	<?php
	include "../validar_session.php";
	include "../Config/config_sistema.php";

$nsolicitante = $_REQUEST['nsolicitante'];
$email = $_REQUEST['email'];
$dtinicio = $_REQUEST['dtinicio'];
$prob = $_POST['prob'];
$solucao = $_POST['solucao'];
$telefone = $_REQUEST['telefone'];
$dtfim = $_REQUEST['dtfim'];
$regiao = $_POST['regiao'];
$id_sec = $_REQUEST['estado'];
$id_setor = $_REQUEST['cidade'];
$tpservico = $_POST['tpservico'];
$tecnicos = $_POST['tecnicos'];
$dtfim =$_POST['dtfim'];
$hrainicio = $_POST['hrainicio'];
$hrafim = $_POST['hrafim'];
$login_usuario = $_SESSION['login_usuario'];

if($nsolicitante == "") {
	echo "<script>alert('Para enviar seu cadastro, todos os campos devem ser preenchidos.');</script>";
	echo "<script>history.go(-1);</script>";
exit;
}

if($telefone == "") {
	echo "<script>alert('Preencha o campo telefone de contato.');</script>";
    echo "<script>history.go(-1);</script>";
exit;
}

if($prob == "") {
	echo "<script>alert('Descreva brevemente o motivo de seu chamado.');</script>";
    echo "<script>history.go(-1);</script>";
exit;
}
$sqlinsert  = "INSERT INTO tbldados(nsolicitante,email,data,prob,solucao,regiao,id_sec,id_setor,telefone, 
tpservico,tecnico,dtafin,cha_horai,cha_horaf,status)
VALUES('$nsolicitante','$email','$dtinicio','$prob','$solucao','$regiao','$id_sec','$id_setor','$telefone',
'$tpservico','$tecnicos','$dtfim','$hrainicio','$hrafim','finalizado')";
mysql_query($sqlinsert) or die("Nao foi possivel inserir os dados"); //Ou vai..., ou racha.
echo "<script>alert('Chamado registrado.');</script>";
echo "<script>history.go(-1);</script>";

//header("Location:atenderdireto.php");

?>



