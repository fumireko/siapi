<?php 
include "../validar_session.php"; 
include "../Config/config_sistema.php";
//header('Content-Type: text/html; charset=utf-8');
//if(isset($_POST['nome_unidade']) && isset($_POST['coordenador_unidade']) && isset($_POST['telefone_unidade'])){       
//Limpando cpf
$nome = $_POST['nome'];
$dta_nasc = $_POST['dta_nasc'];
$nome_mae = $_POST['nome_mae'];
$cpf = $_POST['cpf'];
$telefone = $_POST['telefone'];
$celu = $_POST['celu'];
$celular = $_POST['celular'];
$cep = $_POST['cep'];
$rua = $_POST['rua'];
$num = $_POST['num'];
$comp = $_POST['comp'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$nome_usuario = $_SESSION['nome_usuario'];

if ($nome !=""){
    $result = mysql_query('SELECT * FROM tbaluno where tbaluno_cpfmae = "'.$cpf.'" ');
	if ($result){
		  while ($row = mysql_fetch_assoc($result)) {
		  echo "<font color=red><b>  ".'JA EXISTE UM CADASTRO DO CPF :' .$row['tbaluno_cpfmae'].' <br>';
		  echo 'PARA ALUNO :' .$row['tbaluno_nome'] .'!<br>';
		  echo 'STATUS CADASTRO :' .$row['tbaluno_status'] .' !';
	 
    //echo $row['tbaluno_nome'] .' ja cadastrado no sistema';
    exit;
	}
}
mysql_free_result($result);
}

$data_inf1 = '2022-04-01';
$data_inf2 = '2021-04-01';
$data_inf3 = '2020-04-01';
$data_inf4 = '2019-04-01';
$data_inf5 = '2018-04-01';

if(strtotime($dta_nasc) >= strtotime($data_inf1))
{
	$sqlinsert  = "INSERT INTO  tbaluno(tbaluno_nome,tbaluno_dtnasc,tbaluno_turma,tbaluno_nmae,tbaluno_cpfmae,tbaluno_tel,celu,celular,
	tbaluno_cep,tbaluno_end, tbaluno_num, tbaluno_comple, tbaluno_bairro,tbaluno_status,tbaluno_datacad,tbaluno_login)
   VALUES('$nome','$dta_nasc','INF1','$nome_mae','$cpf','$telefone','$celu','$celular','$cep','$rua','$num','$comp','$bairro','Pendente',now(),'$nome_usuario');";
   mysql_query($sqlinsert) or die("Nao foi possivel inserir os dados INF 1"); //Ou vai..., ou racha.
		  echo "<script>alert('DADOS SALVOS ALUNO DO INF 1.');</script>";
	      echo "<script>history.go(-1);</script>";
	   exit;
}
elseif(strtotime($dta_nasc) >= strtotime($data_inf2))
{
	$sqlinsert  = "INSERT INTO  tbaluno(tbaluno_nome,tbaluno_dtnasc,tbaluno_turma,tbaluno_nmae,tbaluno_cpfmae,tbaluno_tel,celu,celular,
	tbaluno_cep,tbaluno_end, tbaluno_num, tbaluno_comple, tbaluno_bairro,tbaluno_status,tbaluno_datacad,tbaluno_login)
   VALUES('$nome','$dta_nasc','INF2','$nome_mae','$cpf','$telefone','$celu','$celular','$cep','$rua','$num','$comp','$bairro','Pendente',now(),'$nome_usuario');";
   mysql_query($sqlinsert) or die("Nao foi possivel inserir os dados INF 2"); //Ou vai..., ou racha.
		  echo "<script>alert('DADOS SALVOS ALUNO DO INF 2.');</script>";
	   echo "<script>history.go(-1);</script>";
	   exit;
}
elseif(strtotime($dta_nasc) >= strtotime($data_inf3))
{
	$sqlinsert  = "INSERT INTO  tbaluno(tbaluno_nome,tbaluno_dtnasc,tbaluno_turma,tbaluno_nmae,tbaluno_cpfmae,tbaluno_tel,celu,celular,
	tbaluno_cep,tbaluno_end, tbaluno_num, tbaluno_comple, tbaluno_bairro,tbaluno_status,tbaluno_datacad,tbaluno_login)
   VALUES('$nome','$dta_nasc','INF3','$nome_mae','$cpf','$telefone','$celu','$celular','$cep','$rua','$num','$comp','$bairro','Pendente',now(),'$nome_usuario');";
   mysql_query($sqlinsert) or die("Nao foi possivel inserir os dados INF 3"); //Ou vai..., ou racha.
		  echo "<script>alert('DADOS SALVOS ALUNO DO INF 3.');</script>";
	   echo "<script>history.go(-1);</script>";
	   exit;
}
elseif(strtotime($dta_nasc) >= strtotime($data_inf4))
{
	$sqlinsert  = "INSERT INTO  tbaluno(tbaluno_nome,tbaluno_dtnasc,tbaluno_turma,tbaluno_nmae,tbaluno_cpfmae,tbaluno_tel,celu,celular,
	tbaluno_cep,tbaluno_end, tbaluno_num, tbaluno_comple, tbaluno_bairro,tbaluno_status,tbaluno_datacad,tbaluno_login)
   VALUES('$nome','$dta_nasc','INF4','$nome_mae','$cpf','$telefone','$celu','$celular','$cep','$rua','$num','$comp','$bairro','Pendente',now(),'$nome_usuario');";
   mysql_query($sqlinsert) or die("Nao foi possivel inserir os dados INF 4"); //Ou vai..., ou racha.
		  echo "<script>alert('DADOS SALVOS ALUNO DO INF 4.');</script>";
	   echo "<script>history.go(-1);</script>";
	   exit;
}
elseif(strtotime($dta_nasc) >= strtotime($data_inf5))
{
	$sqlinsert  = "INSERT INTO  tbaluno(tbaluno_nome,tbaluno_dtnasc,tbaluno_turma,tbaluno_nmae,tbaluno_cpfmae,tbaluno_tel,celu,celular,
	tbaluno_cep,tbaluno_end, tbaluno_num, tbaluno_comple, tbaluno_bairro,tbaluno_status,tbaluno_datacad,tbaluno_login)
   VALUES('$nome','$dta_nasc','INF5','$nome_mae','$cpf','$telefone','$celu','$celular','$cep','$rua','$num','$comp','$bairro','Pendente',now(),'$nome_usuario');";
   mysql_query($sqlinsert) or die("Nao foi possivel inserir os dados INF 5"); //Ou vai..., ou racha.
		  echo "<script>alert('DADOS SALVOS ALUNO DO INF 5.');</script>";
	   echo "<script>history.go(-1);</script>";
	   exit;
}

else
{
	$sqlinsert  = "INSERT INTO  tbaluno(tbaluno_nome,tbaluno_dtnasc,tbaluno_turma,tbaluno_nmae,tbaluno_cpfmae,tbaluno_tel,celu,celular,
	tbaluno_cep,tbaluno_end, tbaluno_num, tbaluno_comple, tbaluno_bairro,tbaluno_status,tbaluno_datacad,tbaluno_login)
   VALUES('$nome','$dta_nasc','FUNDAMENTAL','$nome_mae','$cpf','$telefone','$celu','$celular','$cep','$rua','$num','$comp','$bairro','Pendente',now(),'$nome_usuario');";
   mysql_query($sqlinsert) or die("Nao foi possivel inserir os dados FUNDAMENTAL "); //Ou vai..., ou racha.
		  echo "<script>alert('DADOS SALVOS ALUNO DO FUNDAMENTAL.');</script>";
	   echo "<script>history.go(-1);</script>";
	   exit;
}

//header("Location:./#/salvaaluno");
// Comparando as Datas
        //$sql = "INSERT INTO semed.tbaluno(tbaluno_nome, tbaluno_dtnasc,tbaluno_nmae,tbaluno_cpf,	
        //tbaluno_tel,celu,tbaluno_cep,tbaluno_end,tbaluno_num,tbaluno_comple,tbaluno_bairro,tbaluno_cidade,tbaluno_status,tbaluno_datacad,tbaluno_login,celu2)
        //VALUES ('$nome','$dta_nasc','$nome_mae','$cpf','$telefone','$celu','$cep','$rua','$num','$comp','$bairro','$cidade','Pendente',now(),'$nome_usuario','$celular');";
        //$result = mysql_query($sql);
        //header("Location:./#/cadaluno");
        //echo json_encode($result);    
       
    //}
?>