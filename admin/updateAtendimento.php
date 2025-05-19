<?php
include "../validar_session.php"; 
include "../Config/config_sistema.php";

$tb_atendimento_id = $_REQUEST['tb_atendimento_id'];

$status = $_REQUEST['status'];
$registro = $_REQUEST['registro'];
$id_usuario = $_SESSION['id_usuario'];
//atualiza status e  registro anterior
$result = mysql_query('SELECT * FROM tb_atendimento where tb_atendimento_id = "'.$tb_atendimento_id.'" ');
if ($result){
	while ($row = mysql_fetch_assoc($result)) {
		if($row['tb_atendimento_status'] == 'Finalizado'){
			echo "<script>alert('Atendimento ja foi finalizado');</script>";
			echo "<script>history.go(-1);</script>";
			exit;
		}
	}
}
date_default_timezone_set('America/Sao_Paulo');

if($registro == ''){
	$sql = ("UPDATE tb_atendimento SET tb_atendimento_status = '$status' where tb_atendimento_id = '$tb_atendimento_id'");
	$consulta = mysql_query($sql) or die("Nao foi possivel inserir os dados na tabela grupo");
	if($consulta){
		echo "<script>alert('Atendimento Atualizado');</script>";
		echo "<script>history.go(-1);</script>";
		exit;
	}
}
else{
	$sql = ("UPDATE tb_atendimento SET tb_atendimento_status = '$status' where tb_atendimento_id = '$tb_atendimento_id'");
	$consulta = mysql_query($sql) or die("Nao foi possivel inserir os dados na tabela grupo");

	$dia = date("Y-m-d");
	$hora = date("H:i:s");

	$sqlinsert  = "INSERT INTO  semed.tbregistro(tbregistro_tb_atendimento_id, tbregistro_msg, tbregistro_usuario, dia_registro, hora_registro) VALUES('$tb_atendimento_id', '$registro', '$id_usuario', '$dia', '$hora');";
	$search = mysql_query($sqlinsert) or die("Nao foi possivel inserir os dados na tabela grupo");
	if($search){
		echo "<script>alert('Atendimento Atualizado');</script>";
		echo "<script>history.go(-1);</script>";
		exit;
	}
}
?>