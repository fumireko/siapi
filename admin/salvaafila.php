<?php
include "../validar_session.php"; 
include "../Config/config_sistema.php";
$motivo = $_REQUEST['motivo'];
$status = $_POST['status'];
$aluno_id = $_POST['tbaluno_id'];
$tbfila_id = $_POST['tbfila_id'];
$motivo = $_REQUEST['motivo'];
$id_user = $_SESSION['id_usuario'];
$id_cmei = $_REQUEST['id_cmei'];
$dtalt = $_REQUEST['dtalt'];
$dtalterado = implode("-",array_reverse(explode("/",$dtalt)));
	
?>
<html>
<head>
<body>
<table>
	<tr>
    	<td>Id aluno</td>
        <td><?php echo $aluno_id?>
    </tr>
    <tr>
    	<td>tbfila_id</td>
        <td><?php echo $tbfila_id?>
    </tr>
    <tr>
    	<td>id_cmei</td>
        <td><?php echo $id_cmei?>
    </tr>
    <tr>
    	<td>motivo</td>
        <td><?php echo $motivo?>
    </tr>
    <tr>
    	<td>data alterado</td>
        <td><?php echo $dtalt?>
    </tr>
</body>
</html>
<?php
	//altera registro anterior
	$sql = ("UPDATE tbfila  
	INNER JOIN tbaluno 
	ON tbfila.tbaluno_tbaluno_id = tbaluno.tbaluno_id 
	SET tbfila.tbfila_motivo = '$motivo', tbfila.tbfila_dtacad = '$dtalt',
	tbfila.dados_usuarios_ID = '$id_user'
	where tbfila.tbfila_id = '".$tbfila_id."'");
	$consulta = mysql_query($sql);
	 header("Location:./#/matricular");
	exit;
  
?>

	




