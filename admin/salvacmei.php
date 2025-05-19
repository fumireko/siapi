<?php 
include "../validar_session.php"; 
include "../Config/config_sistema.php";
//header('Content-Type: text/html; charset=utf-8');
//if(isset($_POST['nome_unidade']) && isset($_POST['coordenador_unidade']) && isset($_POST['telefone_unidade'])){  

if (!isset($_SESSION)){
	session_start();
}
echo $sec_id;

$sec_id = $_REQUEST['sec_id'];
$nome = $_REQUEST['nome'];
$responsavel = $_POST['responsavel'];
$telefone = $_REQUEST['telefone'];
$coord = $_REQUEST['coord'];
$email = $_REQUEST['email'];
$cep = $_POST['cep'];
$rua = $_POST['rua'];
$num = $_POST['num'];
$comp = $_POST['comp'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$interno = $_POST['interno'];
$local = $_REQUEST['local'];
$id_usuario = $_SESSION['id_usuario'];

if ($nome !=""){
  $result = mysql_query('SELECT * FROM tbcmei where tbcmei_nome = "'.$nome.'" '); 
if ($result){
      while ($row = mysql_fetch_assoc($result)) {
      echo "<font color=red><b>  ".'JA EXISTE UM CADASTRO DE :' .$row['tbcmei_nome'].' <br>';
      
      exit;
    }
  }
}

$sqlinsert  = "INSERT INTO  tbcmei(tbcmei_sec_id,tbcmei_nome, tbcmei_tel, tbcmei_coord, tbcmei_email, 
tbcmei_cep, tbcmei_end, tbcmei_num, tbcmei_comp, tbcmei_bairro, tbcmei_cidade, 
dados_usuarios_ID, interno,	tbcmei_local)
VALUES('$sec_id','$nome', '$telefone', '$coord', '$email', '$cep', '$rua', '$num', '$comp','$bairro', '$cidade', 
'$id_usuario', '$interno','$local');";
mysql_query($sqlinsert) or die("Nao foi possivel inserir os dados"); //Ou vai..., ou racha.
header("Location:./listadepto.php");


?>