<?php
include "../validar_session.php"; 
include "../Config/config_sistema.php";
$tbaluno_id = $_REQUEST['tbaluno_id'];
$tbfila_id = $_POST['tbfila_id'];
$status = $_POST['status'];
$motivo = $_POST['motivo'];
$data = date("Y-d-m");
$login_usuario = $_SESSION['login_usuario'];
$unidade_usuario = $_SESSION['unidade_usuario'];
?>
<html>
	<head>
		<body>
            <table>
	         <tr>
    	<td>Id aluno</td>
        <td><?php echo $tbaluno_id?>
    </tr>
    <tr>
    	<td>tbfila_id</td>
        <td><?php echo $tbfila_id?>
    </tr>
    <tr>
    	<td>id_cmei</td>
        <td><?php echo $unidade_usuario?>
    </tr>
    <tr>
    	<td>motivo</td>
        <td><?php echo $motivo?>
    </tr>
    <tr>
    	<td>Data</td>
        <td><?php echo $data?>
    </tr>
</body>
</html>
<?php
	$sql = ("UPDATE tbfila  
INNER JOIN tbaluno 
ON tbfila.tbaluno_tbaluno_id = tbaluno.tbaluno_id 
SET tbfila.tbfila_motivo = 'Transferencia', 
tbfila.tbfila_status = 'Transferencia', 
tbaluno.tbaluno_status = 'pendente',
tbaluno_recadastrado = 'Recadastrado',
dtatrans = NOW()
where tbfila.tbfila_id = '".$fila_id."'");
$consulta = mysql_query($sql);
?>

	




