<?php
include "../Config/config_sistema.php";
$nome = $_REQUEST['nome'];
$dtnasc = $_REQUEST['dtnasc'];
$nmae = $_REQUEST['nmae'];
$npai = $_POST['npai'];
$tele = $_POST['tele'];
$email = $_POST['email'];
$cep = $_POST['cep'];
$rua = $_POST['rua'];
$num = $_POST['num'];
$comp = $_POST['comp'];
$bairro = $_POST['bairro'];
$uf = $_POST['uf'];
$uconsumidora = $_POST['uconsumidora'];
$escola1 = $_POST['escola1'];
$escola2 = $_POST['escola2'];
$escola3 = $_POST['escola3'];
$serie = $_POST['serie'];
$datan = implode("-",array_reverse(explode("/",$dtnasc)));


if ($nome !=""){
    $result = mysql_query('SELECT * FROM tbaluno where tbaluno_nome = "'.$nome.'"');
	if ($result){
		 while ($row = mysql_fetch_assoc($result)) {
    echo $row['tbaluno_nome'] .' já cadastrado no sistema';
    exit;
	}
   
}

mysql_free_result($result);
 
}

if($nome == "") {
	echo "<script>alert('Para enviar seu cadastro, o nome deve ser preenchidos.');</script>";
	echo "<script>history.go(-1);</script>";
	exit;
}
if($nmae == "") {
	echo "<script>alert('Preencha o campo nome da mãe.');;</script>";
	echo "<script>history.go(-1);</script>";
	exit;
}
if($cep == "") {
	echo "<script>alert('Preencha o campo cep.');;</script>";
	echo "<script>history.go(-1);</script>";
	exit;
}
if($rua == "") {
	echo "<script>alert('Preencha o campo endereço.');;</script>";
	echo "<script>history.go(-1);</script>";
	exit;
}
if($num == "") {
	echo "<script>alert('Preencha o número da casa.');;</script>";
	echo "<script>history.go(-1);</script>";
	exit;
}
if($bairro == "") {
	echo "<script>alert('Preencha o campo bairro.');;</script>";
	echo "<script>history.go(-1);</script>";
	exit;
}
if($escola1 == "") {
	echo "<script>alert('Escolha ao menos uma unidade de ensino.');;</script>";
	echo "<script>history.go(-1);</script>";
	exit;
}
if($serie == "") {
	echo "<script>alert('Escolha a serie.');;</script>";
	echo "<script>history.go(-1);</script>";
	exit;
}

$sqlinsert  = "INSERT INTO tbaluno(tbaluno_nome,tbaluno_dtnasc,tbaluno_nmae,tbaluno_npai,tbaluno_tel,tbaluno_email,tbaluno_cep,tbaluno_end,tbaluno_num,tbaluno_comple,tbaluno_bairro,tbaluno_cidade,tbaluno_unicons,tbaluno_unipref,tbaluno_unipref1,tbaluno_unipref2,tbaluno_serie,tbaluno_datacad)
VALUES('$nome','$datan','$nmae','$npai','$tele','$email','$cep','$rua','$num','$comp','$bairro','$uf','$uconsumidora','$escola1','$escola2','$escola3','$serie',now())";
mysql_query($sqlinsert) or die("Não foi possível inserir os dados"); //Ou vai..., ou racha.
header("Location:cadastrado.php?tbaluno_id=$tbaluno_id	");

