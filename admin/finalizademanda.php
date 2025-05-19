<?php
include "../validar_session.php"; 
include "../Config/config_sistema.php";
$demanda_id = $_REQUEST['demanda_id'];
$hoje = date('d/m/Y');
$datafim = implode("-",array_reverse(explode("/",$hoje)));
echo $hoje;



$sql = ("UPDATE tbdemanda SET demanda_status = 'finalizado', demanda_datafim = '$datafim' where demanda_id = '".$demanda_id."'");
	$consulta = mysql_query($sql);
	 header("Location:./listademanda.php");
exit;	




