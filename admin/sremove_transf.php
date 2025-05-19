<?php
include "../validar_session.php"; 
include "../Config/config_sistema.php";
$tabela = 'transf';
$id_fila = $_POST['tbfila_tbfila_id'];
$tbcmei_id = $_POST['tbcmei_id'];
$tbaluno_id = $_REQUEST['tbaluno_id'];
$id_user = $_SESSION['id_usuario'];
$motivo = $_POST['motivo'];
$status = '	Transferencia';
$id_cmei = $_SESSION['login_usuario'];
$login_usuario = $_SESSION['login_usuario'];

$query = mysql_query("DELETE FROM tbfila WHERE tbfila_id = '".$id_fila."'");
mysql_query($query);

$query = mysql_query("DELETE FROM  tbtran WHERE tbfila_tbfila_id = '".$id_fila."'");
mysql_query($query);


$sqlinsert  = "INSERT INTO tbexcluido(tbexcluido_tb, 
tbexcluido_idfila, 
tbexcluido_idcmei, 
tbexcluido_idaluno, 
tbexcluido_iduser,
tbexcluido_dta, 
tbexcluido_motivo)
VALUES('$tabela',
'$id_fila', 
'$id_cmei', 
'$tbaluno_id',
'$id_user', 
now(), 
'$motivo')";
mysql_query($sqlinsert) or die("Não foi possível inserir os dados"); //Ou vai..., ou racha.
header("Location:result_listatransf.php?id_cmei=$tbcmei_id");


?>
<html>
	<body>
		<head> </head>
         <table>
			<tr>	
				<td>Cod lanc !</td>	
			    <td> <?php echo $id_fila ?></td>
			</tr>
            <tr>	
				<td>Id user!</td>	
			    <td> <?php echo $id_user ?></td>
			</tr>
            <tr>	
				<td>Id CMEI!</td>	
			    <td> <?php echo $tbcmei_id ?></td>
			</tr>
            <tr>	
				<td>Id aluno!</td>	
			    <td> <?php echo $tbaluno_id ?></td>
			</tr>
            <tr>	
				<td>Status!</td>	
			    <td> <?php echo $status?></td>
			</tr>
            <tr>	
				<td>Tabela!</td>	
			    <td> <?php echo $tabela?></td>
			</tr>
            <tr>	
				<td>Motivo!</td>	
			    <td> <?php echo $motivo?></td>
			</tr>
		 </table>
	</body>
</html>



