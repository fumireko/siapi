<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-BR" lang="pt-BR">
<link rel= "stylesheet" type="text/css" href="../estilocme.css">
<head>
     <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
     <meta name="author" content="Admin" />
	<title>MATRICULAR ALUNOS</title>
</head>
<?php
include "config_sistema.php";
$consulta = mysql_query("SELECT * FROM tb_aluno");
?>
<table border ="1"">
<tr> 
	<td colspan="3" align="center"> Alunos cadastrados </td>
	
</tr>
<tr> 
	<td> Nome </td>
	<td> Data Nasc </td>
	<td> Nome Mae </td>
</tr>
<?php
while($linhas = mysql_fetch_object($consulta)) {
?> 
    <tr>
		<td>  <?php echo $linhas->nome_aluno;?> 
        </td>
		<td> <?php echo $linhas->datansc_aluno;?>
        </td>
		<td> <?php echo $linhas->nommae_aluno;?>
        </td>
	</tr>
	<?php
}
?>
</table>