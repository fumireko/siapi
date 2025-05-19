<?php
include "../validar_session.php"; 
include "../Config/config_sistema.php";
$login_usuario = $_SESSION['login_usuario'];
$tbcmei_sec_id = $_REQUEST['tbcmei_sec_id'];
$id_depto = $_POST['id_depto'];
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
	$sql = ("UPDATE tbcmei SET tbcmei_sec_id = '$tbcmei_sec_id'	
   
    where tbcmei_id = '$id_depto'");
    $consulta = mysql_query($sql);
	 header("Location:listadepto.php");
    //exit;
    echo "aqui";  
?>

	




