<?php
include "../validar_session.php"; 
include "../Config/config_sistema.php";
$login_usuario = $_SESSION['login_usuario'];
$id_depto = $_REQUEST['id_depto'];
$id = $_POST['id'];

	//altera registro anterior
	$sql = ("UPDATE usuarios SET id_unidade = '$id_depto'	
    where id = '$id'");
    $consulta = mysql_query($sql);
	 header("Location:listauser.php");
    //exit;
    echo "aqui";  
?>

	




