<?php 
include "../validar_session.php"; 
include "../Config/config_sistema.php";
$id_usuario = $_SESSION['id_usuario'];
$cod = $_POST['cod'];
$caec_status = $_POST['caec_status'];
$caec_dev = $_POST['caec_dev'];
$hora = $_POST['hora'];
$datatriagem = $_POST['datatriagem'];
if ($caec_status == "") {
	echo "<script>alert('Status em branco.');</script>";
	echo "<script>history.go(-1);</script>";
	exit;
}

if ($caec_status == "Inserido lista de espera" and $hora == "") {
	echo "<script>alert('Digite o horario da triagem.');</script>";
	echo "<script>history.go(-1);</script>";
	exit;
}

if ($caec_status == "Inserido lista de espera" and $datatriagem == "") {
	echo "<script>alert('Digite a data da triagem.');</script>";
	echo "<script>history.go(-1);</script>";
	exit;
}

if ($caec_dev == "") {
	echo "<script>alert('Devolutiva em branco.');</script>";
	echo "<script>history.go(-1);</script>";
	exit;
    }
    if ($cod !=""){
        $result = mysql_query('SELECT * FROM tbfilacaec where tbfilacaec_caec_id = "'.$cod.'"');
        if ($result)
        {
             while ($row = mysql_fetch_assoc($result)) {
                echo "<script>alert('ALUNO JA PASSOU PELA TRIAGEM.');</script>";
                echo "<script>history.go(-1);</script>";
            exit;
        }
    }
    mysql_query($result);
    }
    $sql = ("UPDATE tbcaec SET caec_status = '$caec_status', caec_dev ='$caec_dev', caec_hora ='$hora',
    caec_datatriagem ='$datatriagem',caec_especialista = '$id_usuario' ,caec_datadev = now() where caec_id = '$cod'");
    $consulta = mysql_query($sql);
    $sqlinsert  = "INSERT INTO tbfilacaec(tbfilacaec_caec_id, tbfilacaec_status, tbfilacaec_datacad ,dados_usuarios_ID)
    VALUES('$cod','$caec_status',now(),'$id_usuario')";
    mysql_query($sqlinsert) or die("Nao foi possivel inserir os dados"); //Ou vai..., ou racha.
    echo "<script>alert('ALUNO INCLUSO.');</script>";
    echo "<script>history.go(-1);</script>";
    header ("Location:./lista_triagem.php");
exit;
?>