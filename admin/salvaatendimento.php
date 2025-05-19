<?php 
include "../validar_session.php"; 
include "../Config/config_sistema.php";
//header('Content-Type: text/html; charset=utf-8');
//if(isset($_POST['nome_unidade']) && isset($_POST['coordenador_unidade']) && isset($_POST['telefone_unidade'])){   
if (!isset($_SESSION)){
	session_start();
}
//O determinar o numero que identifica o atendimento, e o ano dele
$id_usuario = $_SESSION['id_usuario'];
$codcracha = $_POST['codcracha'];
$rg = $_POST['rg'];
$nome = $_POST['nome'];
$tpatendimento = $_POST['tpatendimento'];
$descricao = $_POST['descricao'];
$departamento = $_POST['departamento'];
$status = 'ativo';
date_default_timezone_set('America/Sao_Paulo');
$hoje = date('Y/m/d');
$hora = date('H:i:s'); 

$sqlinsert  = "INSERT INTO  tbvisitante(visi_codcracha, visi_rg, visi_nome, visi_motivo,visi_setor,visi_dataentrada,visi_horaentrada,	visi_status) 
VALUES('$codcracha', '$rg', '$nome', '$tpatendimento','$departamento','$hoje','$hora','ativo')";
mysql_query($sqlinsert) or die("Nao foi possivel inserir os dados na tabela grupo"); //Ou vai..., ou racha.

  echo "<script>alert('Atendimento Cadastrado');</script>";
	echo "<script>history.go(-1);</script>";
	exit;
    //Comparando as Datas
    //$sql = "INSERT INTO semed.tbaluno(tbaluno_nome, tbaluno_dtnasc,tbaluno_nmae,tbaluno_cpfmae,	
    //tbaluno_tel,celu,tbaluno_cep,tbaluno_end,tbaluno_num,tbaluno_comple,tbaluno_bairro,tbaluno_cidade,tbaluno_status,tbaluno_datacad,tbaluno_login)
    //VALUES ('$nome','$dta_nasc','$nome_mae','$cpf_mae','$telefone','$celu','$cep','$rua','$num','$comp','$bairro','$cidade','Pendente',now(),'$nome_usuario');";
    //$result = mysql_query($sql);
    //header("Location:./#/cadaluno");
    //echo json_encode($result);     
    //}
?>