<?php
include "../validar_session.php";  
include "../Config/config_sistema.php";
//Horário do Brasil - São Paulo
date_default_timezone_set("America/Sao_Paulo");
if (!isset($_SESSION)){
    session_start();
}
$id_dados = $_GET['id_dados'];
$email_usuario = $_SESSION['email_usuario'];
$hora = date('H:i:s');

if ($id_dados !=""){
    $result = mysqli_query($conn,'SELECT * FROM tbldados where id_dados = '.$id_dados.' and solucao is NULL'); 
  if ($result){
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<script>alert('Chamado sem solução, não pode ser finalizado!.');</script>";
            echo "<script>history.go(-1);</script>";
        exit;
      }
      mysqli_free_result($result);
    }
    
  }
//altera registro anterior
$sql = ("UPDATE tbldados SET status = 'finalizado', dtafin = now(),
cha_horaf = '$hora', tbldados.tecnico = '$email_usuario' WHERE id_dados = '".$id_dados."'");
$consulta = mysqli_query($conn,$sql);
header("Location:./frmportecnico.php");
exit;
?>
    