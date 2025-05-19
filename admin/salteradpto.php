<?php
include "../validar_session.php"; 
include "../Config/config_sistema.php";
$login_usuario = $_SESSION['login_usuario'];
$id_dpto = $_REQUEST['id_dpto'];
$nome_dpto = $_POST['nome_dpto'];
$nome_resp = $_POST['nome_resp'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$cep = $_POST['cep'];
$endereco = $_POST['endereco'];
$num = $_POST['num'];
$bairro = $_POST['bairro'];
$comp = $_POST['comp'];
$cidade = $_POST['cidade'];
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
	$sql = ("UPDATE tbcmei SET tbcmei_nome = '$nome_dpto',	
    tbcmei_tel = '$telefone',
    tbcmei_coord ='$nome_resp', 
    tbcmei_email = '$email',
    tbcmei_cep = '$cep',
    tbcmei_end = '$endereco',
    tbcmei_num = '$num',
    tbcmei_comp = '$comp',
    tbcmei_bairro = '$bairro',
    tbcmei_cidade = '$cidade',
    tbcmei_login = '$login_usuario'  
    where tbcmei_id = '$id_dpto'");
    $consulta = mysql_query($sql);
	 header("Location:listadepto.php");
    //exit;
    echo "aqui";  
?>

	




