<?php 
include "../validar_session.php"; 
include "../Config/config_sistema.php";
$id_usuario = $_SESSION['id_usuario'];
$email_usuario = $_SESSION['email_usuario'];
$cod = $_POST['cod'];
$tbaluno_id = $_POST['tbaluno_id'];
$caec_status_agenda = $_POST['caec_status_agenda'];
$caec_detalhe_agenda = $_POST['caec_detalhe_agenda'];
$caec_esp = $_POST['caec_esp'];
$hora = $_POST['hora'];
$datatriagem = $_POST['datatriagem'];
//echo $caec_esp;
echo $caec_detalhe_agenda;

if ($caec_detalhe_agenda == "")
{
    echo "<script>alert('Por favor, descreva o motivo.');</script>";
    echo "<script>history.go(-1);</script>";
 exit;
}


if ($tbaluno_id !=""){
    $result = mysql_query('SELECT * FROM tbcaec where caec_hora = "'.$hora.'" and caec_datatriagem = "'.$datatriagem.'" and caec_esp = "'.$caec_esp.'"');
    if ($result){
             while ($row = mysql_fetch_assoc($result)) {
             echo "<font color=red><b>  ".'JA EXISTE UMA AGENDA PARA ESSA DATA, HORA E ESPECIALIDADE:<BR>';
             
     exit;
    }
    }
    mysql_query($result);
    }
//Monta Log de alteração
$sqlinsert  = "INSERT INTO tblogcaec(tblog_login,
tblog_datalog,
tblog_status,
tblog_motivo,
tblog_operacao,
tblog_tbla,
tblog_id_aluno,
tblog_especialidade)
 VALUES('$email_usuario',
 now(),
 '$caec_status_agenda',
 '$caec_detalhe_agenda',
 'AlterandoAgenda',
 'tbcaec',
 '$tbaluno_id',
 '$caec_esp')";

   mysql_query($sqlinsert) or die("Nao registrou log"); //Ou vai..., ou racha.

//altera registro anterior
$sql = ("UPDATE tbcaec SET caec_hora = '$hora', 
caec_status_agenda = '$caec_status_agenda',
caec_detalhe_agenda = '$caec_detalhe_agenda',
caec_datatriagem = '$datatriagem' where caec_id = '$cod'");
$consulta = mysql_query($sql);
//header("Location:agenda_diaria.php");
exit;


?>