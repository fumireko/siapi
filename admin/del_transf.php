<?php
include "../validar_session.php"; 
include "../Config/config_sistema.php";
$ordem = $_REQUEST['ordem'];
$tbaluno_id = $_REQUEST['tbaluno_id'];
$id_user = $_SESSION['id_usuario'];
$tbfila_id = $_REQUEST['tbfila_id'];
$tbcmei_id = $_REQUEST['tbcmei_id'];
$tabela = 'tbtran';
$motivo = $_REQUEST['motivo'];
$query = mysql_query("DELETE FROM tbtran WHERE tbfila_tbfila_id = '".$tbfila_id."'");
mysql_query($query);

$sqlinsert  = "INSERT INTO tbexcluido(tbexcluido_tb,
tbexcluido_idfila,
tbexcluido_idcmei,
tbexcluido_idaluno,
tbexcluido_ordem,
tbexcluido_iduser,
tbexcluido_dta,
tbexcluido_motivo)
VALUES('$tabela',
'$tbfila_id',
'$tbcmei_id',
'$tbaluno_id',
'$ordem',
'$id_user',
now(),
'$motivo')";
mysql_query($sqlinsert) or die("Não foi possível inserir os dados"); //Ou vai..., ou racha.
header("Location:./#/matricular");
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



