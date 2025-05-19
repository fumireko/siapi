<?php
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
header("Location:busca_mat.php?id_cmei=$unidade_usuario");
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



