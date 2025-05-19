<?php
include "../validar_session.php";  
include "../Config/config_sistema.php";

//Horário do Brasil - São Paulo
date_default_timezone_set("America/Sao_Paulo");
if (!isset($_SESSION)){
    session_start();
}
$email_usuario = $_SESSION['email_usuario'];
$id_dados = $_REQUEST['id_dados'];
$hora = date('H:i:s');
//altera registro anterior
$sql = ("UPDATE tbldados SET  
tbldados.tecnico = '',
tbldados.status = 'pendente'
where tbldados.id_dados = '".$id_dados."'");
$consulta = mysqli_query($conn,$sql);
header("Location:./frmporstatus.php");
exit;
?>
    