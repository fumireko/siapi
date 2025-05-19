<?php
include "../Config/config_sistema.php";
$nome = $_REQUEST['nome'];
$telefone = $_REQUEST['telefone'];
$email = $_REQUEST['email'];
$regiao = $_REQUEST['regiao'];
$sec_id = $_POST['sec_id'];
$id_setor = $_POST['id_setor'];
$tpservico = $_REQUEST['tpservico'];
$prob = $_POST['prob'];
$hora = date("H:i:s");  
if ($id_sec == 38)
{
	$sqlinsert  = "INSERT INTO tbldados(nsolicitante, telefone, email, regiao, id_sec, id_setor, tpservico, prob, status, data, hora)
		VALUES('$nome','$telefone','$email','Sede','$sec_id','$id_setor','$tpservico','$prob','Pendente',now(),CURTIME())";
		mysql_query($sqlinsert) or die("Nao foi possivel inserir os dados"); //Ou vai..., ou racha.
		//unlink($nomeFinal);
		//header("Location:enviar.php");
		header("Location:frmminhassolcitacoes.php");	
}
else	
	{
		$sqlinsert  = "INSERT INTO tbldados(nsolicitante, telefone, email, regiao, id_sec, id_setor, tpservico, prob, status, data, hora)
		VALUES('$nome','$telefone','$email','$regiao','$sec_id','$id_setor','$tpservico','$prob','Pendente',now(),CURTIME())";
		mysql_query($sqlinsert) or die("Nao foi possivel inserir os dados"); //Ou vai..., ou racha.
		//unlink($nomeFinal);
		//header("Location:enviar.php");
		header("Location:frmminhassolicitacoes.php");	
	}
?>


