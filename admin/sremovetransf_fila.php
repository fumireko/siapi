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
$id_user = $_SESSION['id_usuario'];
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
    </tr><?php
include "../validar_session.php"; 
include "../Config/config_sistema.php";
$tabela = 'fila';
$tbfila_id = $_POST['tbfila_id'];
$tbcmei_id = $_POST['tbcmei_id'];
$tbaluno_id = $_REQUEST['tbaluno_id'];
$id_user = $_SESSION['id_usuario'];
$motivo = $_POST['motivo'];
$status = $_POST['status'];
$id_cmei = $_SESSION['login_usuario'];
$login_usuario = $_SESSION['login_usuario'];

$query = mysql_query("DELETE FROM tbfila WHERE tbfila_id = '".$tbfila_id."'");
mysql_query($query);


$query = mysql_query("DELETE FROM tbtran WHERE 	tbfila_tbfila_id = '".$tbfila_id."'");
mysql_query($query);

$sqlinsert  = "INSERT INTO tbexcluido(tbexcluido_tb, 
tbexcluido_idfila, 
tbexcluido_idcmei, 
tbexcluido_idaluno, 
tbexcluido_iduser,
tbexcluido_dta, 
tbexcluido_motivo)
VALUES('$tabela',
'$tbfila_id', 
'$tbcmei_id', 
'$tbaluno_id',
'$id_user', 
now(), 
'$motivo')";
mysql_query($sqlinsert) or die("Não foi possível inserir os dados"); //Ou vai..., ou racha.
header("Location:./#/listatransf");
?>
<html>
	<body>
		<head> </head>
         <table>
			<tr>	
				<td>Cod lanc !</td>	
			    <td> <?php echo $tbfila_id ?></td>
			</tr>
            <tr>	
				<td>Motivo!</td>	
			    <td> <?php echo $motivo ?></td>
			</tr>
             <tr>	
				<td>Id user!</td>	
			    <td> <?php echo $id_user ?></td>
			</tr>
		 </table>
	</body>
</html>




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
     
	//altera registro anterior
	$sql = ("UPDATE tbtran INNER JOIN tbaluno 
	ON tbtran.tbaluno_tbaluno_id = tbaluno.tbaluno_id 
	SET tbtran.tbtran_status = 'cancelado',
	tbaluno.tbaluno_status = 'Pendente',
	tbfila.tbfila_statusmat = '$status',
	tbfila.tbfila_obs = '$motivo',
	tbfila.tbfila_dtamat = now(),
	tbfila.dados_usuarios_ID = '$id_user';
	where tbfila.tbfila_id = '".$tbfila_id."'");
	$consulta = mysql_query($sql);
	header("Location:./#/matricular");
	// echo "aqui";
	exit;
	
  
?>

	




