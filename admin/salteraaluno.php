<?php
include "../validar_session.php"; 
include "../Config/config_sistema.php";
$login_usuario = $_SESSION['login_usuario'];
$id_user = $_SESSION['id_usuario'];
$aluno_id = $_REQUEST['aluno_id'];
$nome = $_REQUEST['nome'];
$dtansc = $_REQUEST['dtansc'];
$nmae = $_REQUEST['nmae'];
$cpfmae = $_REQUEST['cpfmae'];
$telefone = $_REQUEST['telefone'];
$cel = $_REQUEST['cel'];
$celular = $_REQUEST['celular'];
$cep = $_REQUEST['cep'];
$rua = $_REQUEST['rua'];
$num = $_REQUEST['num'];
$comple = $_REQUEST['comple'];
$bairro = $_REQUEST['bairro'];
$cidade = $_REQUEST['cidade'];
$datan = implode("-",array_reverse(explode("/",$dtansc)));
//altera registro anterior
//TURMAS - 
$data_inf1 = '2022-04-01';
$data_inf2 = '2021-04-01';
$data_inf3 = '2020-04-01';
$data_inf4 = '2019-04-01';
$data_inf5 = '2018-04-01';
//

if($cpfmae == "") {
	echo "<script>alert('Para enviar seu cadastro, o cpf da mãe deve ser preenchido.');</script>";
	echo "<script>history.go(-1);</script>";
	exit;
}

if(strtotime($datan) >= strtotime($data_inf1))
{

$sql = ("UPDATE tbaluno SET tbaluno_nome = '$nome',	tbaluno_turma ='INF1', tbaluno_dtnasc ='$datan', tbaluno_nmae = '$nmae',
tbaluno_cpfmae = '$cpfmae', tbaluno_tel = '$telefone', celu = '$cel', celular = '$celular', tbaluno_cep = '$cep',
tbaluno_end = '$rua', tbaluno_num = '$num', tbaluno_comple = '$comple', tbaluno_bairro = '$bairro',
tbaluno_cidade = '$cidade',tbaluno_login = '$login_usuario',dados_usuarios_ID = '$id_user'  where tbaluno_id = '$aluno_id'");
$consulta = mysql_query($sql);
   	echo "<script>alert('INF1.');</script>";
	echo "<script>history.go(-1);</script>";
	//header ("Location:busca_inc.php?dta_nasc_busca=$dtansc");
	exit;
}
elseif(strtotime($datan) >= strtotime($data_inf2))
{
	$sql = ("UPDATE tbaluno SET tbaluno_nome = '$nome',	tbaluno_turma ='INF2', tbaluno_dtnasc ='$datan', tbaluno_nmae = '$nmae',
tbaluno_cpfmae = '$cpfmae', tbaluno_tel = '$telefone', celu = '$cel', celular = '$celular',tbaluno_cep = '$cep',
tbaluno_end = '$rua', tbaluno_num = '$num', tbaluno_comple = '$comple', tbaluno_bairro = '$bairro',
tbaluno_cidade = '$cidade',tbaluno_login = '$login_usuario',dados_usuarios_ID = '$id_user'  where tbaluno_id = '$aluno_id'");
$consulta = mysql_query($sql);
   	echo "<script>alert('INF2.');</script>";
	echo "<script>history.go(-1);</script>";
	header ("Location:busca_inc.php?dta_nasc_busca=$dtansc");
	exit;
}
elseif(strtotime($datan) >= strtotime($data_inf3))
{
	$sql = ("UPDATE tbaluno SET tbaluno_nome = '$nome',	tbaluno_turma ='INF3', tbaluno_dtnasc ='$datan', tbaluno_nmae = '$nmae',
tbaluno_cpfmae = '$cpfmae', tbaluno_tel = '$telefone', celu = '$cel', celular = '$celular',tbaluno_cep = '$cep',
tbaluno_end = '$rua', tbaluno_num = '$num', tbaluno_comple = '$comple', tbaluno_bairro = '$bairro',
tbaluno_cidade = '$cidade',tbaluno_login = '$login_usuario',dados_usuarios_ID = '$id_user'  where tbaluno_id = '$aluno_id'");
$consulta = mysql_query($sql);
   	echo "<script>alert('INF3.');</script>";
	echo "<script>history.go(-1);</script>";
	header ("Location:busca_inc.php?dta_nasc_busca=$dtansc");
	exit;
}
elseif(strtotime($datan) >= strtotime($data_inf4))
{
	$sql = ("UPDATE tbaluno SET tbaluno_nome = '$nome',	tbaluno_turma ='INF4', tbaluno_dtnasc ='$datan', tbaluno_nmae = '$nmae',
tbaluno_cpfmae = '$cpfmae', tbaluno_tel = '$telefone', celu = '$cel', celular = '$celular', tbaluno_cep = '$cep',
tbaluno_end = '$rua', tbaluno_num = '$num', tbaluno_comple = '$comple', tbaluno_bairro = '$bairro',
tbaluno_cidade = '$cidade',tbaluno_login = '$login_usuario',dados_usuarios_ID = '$id_user'  where tbaluno_id = '$aluno_id'");
$consulta = mysql_query($sql);
   	echo "<script>alert('INF4.');</script>";
	echo "<script>history.go(-1);</script>";
    header ("Location:busca_inc.php?dta_nasc_busca=$dtansc");
	exit;
}
elseif(strtotime($datan) >= strtotime($data_inf4))
{
	$sql = ("UPDATE tbaluno SET tbaluno_nome = '$nome',	tbaluno_turma ='INF4', tbaluno_dtnasc ='$datan', tbaluno_nmae = '$nmae',
tbaluno_cpfmae = '$cpfmae', tbaluno_tel = '$telefone', celu = '$cel', celular = '$celular', tbaluno_cep = '$cep',
tbaluno_end = '$rua', tbaluno_num = '$num', tbaluno_comple = '$comple', tbaluno_bairro = '$bairro',
tbaluno_cidade = '$cidade',tbaluno_login = '$login_usuario',dados_usuarios_ID = '$id_user'  where tbaluno_id = '$aluno_id'");
$consulta = mysql_query($sql);
   	echo "<script>alert('INF4-2.');</script>";
       header ("Location:busca_inc.php?dta_nasc_busca=$dtansc");
	header ("Location:./#/incfila");
	exit;
}
elseif(strtotime($datan) >= strtotime($data_inf5))
{
	$sql = ("UPDATE tbaluno SET tbaluno_nome = '$nome',	tbaluno_turma ='INF5', tbaluno_dtnasc ='$datan', tbaluno_nmae = '$nmae',
tbaluno_cpfmae = '$cpfmae', tbaluno_tel = '$telefone', celu = '$cel', celular = '$celular', tbaluno_cep = '$cep',
tbaluno_end = '$rua', tbaluno_num = '$num', tbaluno_comple = '$comple', tbaluno_bairro = '$bairro',
tbaluno_cidade = '$cidade',tbaluno_login = '$login_usuario',dados_usuarios_ID = '$id_user'  where tbaluno_id = '$aluno_id'");
$consulta = mysql_query($sql);
   	echo "<script>alert('INF5.');</script>";
	echo "<script>history.go(-1);</script>";
	header ("Location:busca_inc.php?dta_nasc_busca=$dtansc");
	exit;
}
else 
{
   $sql = ("UPDATE tbaluno SET tbaluno_nome = '$nome',	tbaluno_turma ='FUNDAMENTAL', tbaluno_dtnasc ='$datan', tbaluno_nmae = '$nmae',
tbaluno_cpfmae = '$cpfmae', tbaluno_tel = '$telefone', celu = '$cel', celular = '$celular', tbaluno_cep = '$cep',
tbaluno_end = '$rua', tbaluno_num = '$num', tbaluno_comple = '$comple', tbaluno_bairro = '$bairro',
tbaluno_cidade = '$cidade',tbaluno_login = '$login_usuario',dados_usuarios_ID = '$id_user'  where tbaluno_id = '$aluno_id'");
$consulta = mysql_query($sql);
   	echo "<script>alert('Prés.');</script>";
	echo "<script>history.go(-1);</script>";
	header ("Location:busca_inc.php?dta_nasc_busca=$dtansc");
	exit;
}


?>


<html>
<head>
<body>
<table>
	<tr>
    	<td>Id aluno</td>
        <td><?php echo $aluno_id?>
    </tr>
    <tr>
    	<td>nome</td>
        <td><?php echo $nome?>
    </tr>
    <tr>
    	<td>Dtanasc</td>
        <td><?php echo $datan?>
    </tr>
    <tr>
    	<td>Nmae</td>
        <td><?php echo $nmae?>
    </tr>
    <tr>
    	<td>CpfMae</td>
        <td><?php echo $cpfmae?>
    </tr>
    <tr>
    	<td>telefone</td>
        <td><?php echo $telefone?>
    </tr>
	<tr>
    	<td>cel</td>
        <td><?php echo $cel?>
    </tr>
    <tr>
    	<td>cep</td>
        <td><?php echo $cep?>
    </tr>
    <tr>
    	<td>rua</td>
        <td><?php echo $rua?>
    </tr>
    <tr>
    	<td>num</td>
        <td><?php echo $num?>
    </tr>
    <tr>
    	<td>comple</td>
        <td><?php echo $comple?>
    </tr>
    <tr>
    	<td>Bairro</td>
        <td><?php echo $bairro?>
    </tr>
	<tr>
    	<td>Cidade</td>
        <td><?php echo $cidade?>
    </tr>
</body>
</html>





