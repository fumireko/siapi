<?php
include "../validar_session.php"; 
include "../Config/config_sistema.php";
$motivo = $_REQUEST['motivo'];
$status = $_POST['status'];
$tbfila_id = $_POST['tbfila_id'];
$aluno_id = $_POST['tbaluno_id'];
$turma = $_POST['turma'];
$motivo = $_POST['motivo'];
$cmei_antigo = $_REQUEST['cmei_antigo'];
$id_cmei = $_REQUEST['id_cmei'];
$id_user = $_SESSION['id_usuario'];
$dtcad = $_POST['dtcad'];
$datatransf = $_POST['datatransf'];
$datan = implode("-",array_reverse(explode("/",$datatransf)));
$data_cad = implode("-",array_reverse(explode("/",$dtcad)));
 if ($aluno_id !=""){
$result = mysql_query('SELECT * FROM tbtran where tbcmei_tbcmcei_id = "'.$id_cmei.'" and tbaluno_tbaluno_id = "'.$aluno_id.'" and tbtran_status = "Transferencia"');
if ($result){
		 while ($row = mysql_fetch_assoc($result)) {
	 echo "<font color=red><b>  ".'ALUNO JA ESTA NA FILA PARA TRANSFERENCIA PARA ESSE CMEI:<BR>';
 exit;
}
}
mysql_query($result);
}
$sqlinsert  = "INSERT INTO tbtran(
tbtran_dtatran,
tbtran_status,
tbfila_tbfila_id,
tbaluno_tbaluno_id,
cmei_antigo,
tbcmei_tbcmcei_id, 
dados_usuarios_ID)
VALUES(now(),
'Transferencia',
'$tbfila_id',
'$aluno_id',
'$cmei_antigo',
'$id_cmei',
'$id_user')";
mysql_query($sqlinsert) or die("Nao foi possivel inserir os dados na transferencia"); //Ou vai..., ou racha.
//
$sqlinsert  = "INSERT INTO 
tbfila(tbaluno_tbaluno_id,
tbcmei_tbcmcei_id,
tbfila_turma,
tbfila_motivo,
tbfila_status,
dtatrans,
tbfila_dtacad,
dados_usuarios_ID)
VALUES
('$aluno_id',
'$id_cmei',
'$turma',
'$motivo',
'Aguardando transf',
'$datan',
'$data_cad',
'$id_user')";
mysql_query($sqlinsert) or die("Nao foi possivel inserir os dados na fila"); //Ou vai..., ou racha.
header("Location:./#/transferir");
//
?>
<html>
<head>
<body>
<table>
	<tr>
    	<td>motivo</td>
        <td><?php echo $motivo?>
    </tr>
    <tr>
    	<td>status</td>
        <td><?php echo $status?>
    </tr>
    <tr>
    	<td>tbfila_id</td>
        <td><?php echo $tbfila_id?>
    </tr>
    <tr>
    	<td>aluno_id</td>
        <td><?php echo $aluno_id?>
    </tr>
    <tr>
    	<td>turma</td>
        <td><?php echo $turma?>
    </tr>
    <tr>
    	<td>cmei_antigo</td>
        <td><?php echo $cmei_antigo?>
    </tr>
    <tr>
    	<td>id_cmei</td>
        <td><?php echo $id_cmei?>
    </tr>
    
    <tr>
    	<td>id_user</td>
        <td><?php echo $id_user?>
    </tr>
</body>
</html>