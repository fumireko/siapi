<?php
include "../validar_session.php"; 
include "../Config/config_sistema.php";
$id_cmei = $_REQUEST['id_cmei'];
$nome_cmei = $_POST['nome_cmei'];
$nome_resp = $_POST['nome_resp'];
$local_unidade = $_POST['local_unidade'];
$preescola = $_REQUEST['preescola'];
$id_user = $_SESSION['id_usuario']

?>
<html>
<head>
<body>
<table>
	<tr>
    	<td>CodCmei</td>
        <td><?php echo $id_cmei?>
    </tr>
    <tr>
    	<td>CmeiNome</td>
        <td><?php echo $nome_cmei?>
    </tr>
    <tr>
    	<td>Coordenadora</td>
        <td><?php echo $nome_resp?>
    </tr>
    <tr>
    	<td>Local</td>
        <td><?php echo $local_unidade?>
    </tr>
    <tr>
    	<td>Pre escolar</td>
        <td><?php echo $preescola?>
    </tr>
</body>
</html>
<?php
	//altera registro anterior
	$sql = ("UPDATE tbcmei SET tbcmei_nome = '$nome_cmei',	tbcmei_coord ='$nome_resp', tbcmei_preescolar ='$preescola', tbcmei_dataalt = now(),
    dados_usuarios_ID = '$id_user'  where tbcmei_id = '$id_cmei'");
$consulta = mysql_query($sql);
	 header("Location:alteracmei.php");
    //exit;
    echo "aqui";  
?>

	




