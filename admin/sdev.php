<?php 
include "../validar_session.php"; 
include "../Config/config_sistema.php";
$id_usuario = $_SESSION['id_usuario'];
$caec_profissional = $_SESSION['nome_usuario'];
$cod = $_POST['cod'];
$especialidade = $_POST['especialidade'];
$caec_status_agenda = $_POST['caec_status_agenda'];
$caec_dev = $_POST['caec_dev'];
$hora = $_POST['hora'];
$datatriagem = $_POST['datatriagem'];

//echo $hora;

if ($caec_status_agenda == "") {
	echo "<script>alert('Status em branco.');</script>";
	echo "<script>history.go(-1);</script>";
	exit;
}
if ($caec_dev == "") {
	echo "<script>alert('Devolutiva em branco.');</script>";
	echo "<script>history.go(-1);</script>";
	exit;
    }
    if ($caec_status =="Agendado"){
        $result = mysql_query('SELECT * FROM tbcaec where caec_hora = "'.$hora.'" 
        and caec_datatriagem = "'.$datatriagem.'" 
        and caec_esp = "'.$especialidade.'"');
        if ($result)
        {
             while ($row = mysql_fetch_assoc($result)) {
                    $data_triagem = $row['caec_datatriagem'];
                    $dtatria= implode("/",array_reverse(explode("-",$data_triagem)));
                    
                echo "<font color=red><b>  ".'JA EXISTE AGENDAMENTO PARA ESSA DATA E HORA : <br>';
		        echo 'Especialidade :' .$row['caec_esp'] .'!<br>';
                echo 'Data :' .$dtatria .'!<br>';
		        echo 'Hora :' .$row['caec_hora'] .' !';
            exit;
        }
    }
    mysql_query($result);
    }
    $sql = ("UPDATE tbcaec SET caec_status_agenda = '$caec_status_agenda', caec_dev ='$caec_dev', caec_hora ='$hora',
    caec_datatriagem ='$datatriagem',caec_especialista = '$id_usuario',caec_profissional = '$caec_profissional',caec_datadev = now() where caec_id = '$cod'");
    $consulta = mysql_query($sql);
      header ("Location:./agendar_triagem.php");
exit;
?>
