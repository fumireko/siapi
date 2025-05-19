
<?php 
include "../validar_session.php"; 
include "../Config/config_sistema.php";
$id_usuario = $_SESSION['id_usuario'];
$cod = $_POST['cod'];
$caec_status = $_POST['caec_status'];
$caec_dev = $_POST['caec_dev'];
$hora = $_POST['hora'];
$datatriagem = $_POST['datatriagem'];

echo $hora;

if ($caec_status == "") {
	echo "<script>alert('Status em branco.');</script>";
	echo "<script>history.go(-1);</script>";
	exit;
}
if ($caec_dev == "") {
	echo "<script>alert('Devolutiva em branco.');</script>";
	echo "<script>history.go(-1);</script>";
	exit;
    }
    if ($cod !=""){
        $result = mysql_query('SELECT * FROM tbcaec where caec_id = "'.$cod.'" and caec_hora = "'.$hora.'" and caec_datatriagem "'.$datatriagem.'"');
        if ($result)
        {
             while ($row = mysql_fetch_assoc($result)) {
                echo "<font color=red><b>  ".'JA EXISTE UM CADASTRO DO CPF : <br>';
		        echo 'Data :' .$row['caec_datatriagem'] .'!<br>';
		        echo 'Hora :' .$row['caec_hora'] .' !';
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

