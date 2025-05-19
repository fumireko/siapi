<?php
	include "../validar_session.php"; 
	include "../Config/config_sistema.php";
	$id_user = $_SESSION['id_usuario'];
	$id_setor = $_REQUEST['cidade'];
	//altera registro anterior
	$sql = ("UPDATE tbcmei SET interno = 'sim', tbcmei_dataalt = now(), dados_usuarios_ID = '$id_user' where tbcmei_id = '$id_setor'");
    $consulta = mysql_query($sql);
	echo "<script>alert('Setor liberado');</script>";
	echo "<script>history.go(-1);</script>";
	header("Location:liberarsetor.php");
  ?>

	




