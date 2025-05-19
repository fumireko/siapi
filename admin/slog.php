<?php
include "../validar_session.php"; 
include "../Config/config_sistema.php";
$id_dados= $_REQUEST['id_dados'];

if ($id_dados !="")
{
	$sqlinsert  = "INSERT INTO tblog(log_id)
		VALUES()";
		mysql_query($sqlinsert) or die("Nao foi possivel inserir os dados"); //Ou vai..., ou racha.
		//unlink($nomeFinal);
		//header("Location:enviar.php");
		header("Location:frmminhassolcitacoes.php");	
}

?>


