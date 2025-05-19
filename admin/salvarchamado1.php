<?php
include "../Config/config_sistema.php";
$nsolicitante = $_REQUEST['nsolicitante'];
$telefone = $_REQUEST['telefone'];
$email = $_REQUEST['email'];
$regiao = $_POST['regiao'];
$id_sec = $_REQUEST['estado'];
$id_setor = $_REQUEST['cidade'];
$id_equip = $_REQUEST['id_equip'];
$tpservico = $_POST['tpservico'];
$narquivo = $_FILES["narquivo"];
$prob = $_POST['prob'];
$hora = date("H:i:s");  


if ($nsolicitante != "")
{
	$sqlinsert  = "INSERT INTO tbldados(nsolicitante,telefone,email,regiao,id_sec,id_setor,id_equip,tpservico,prob,status,data,hora)
		VALUES('$nsolicitante','$telefone','$email','$regiao','$id_sec','$id_setor','$id_equip','$tpservico','$prob','Pendente',now(),CURTIME())";
		mysql_query($sqlinsert) or die("Nao foi possivel inserir os dados"); //Ou vai..., ou racha.
		//unlink($nomeFinal);
		//header("Location:enviar.php");
		header("Location:chamadosalvo.php?id_setor=$id_setor");	
	

}
// else	
     //	{
	//	$sqlinsert  = "INSERT INTO tbldados(nsolicitante,telefone,email,regiao,id_sec,id_setor,id_equip,tpservico,prob,status,data,hora)
	//	VALUES('$nsolicitante','$telefone','$email','$regiao','$id_sec','$id_setor','$id_equip','$tpservico','$prob','Pendente',now(),CURTIME())";
	//	mysql_query($sqlinsert) or die("Nao foi possivel inserir os dados"); //Ou vai..., ou racha.
	//	//unlink($nomeFinal);
	//	//header("Location:enviar.php");
	//	header("Location:chamadosalvo.php?id_setor=$id_setor");	
//}

?>



