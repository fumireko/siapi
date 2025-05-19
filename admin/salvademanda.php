<?php 
include "../validar_session.php"; 
include "../Config/config_sistema.php";

//header('Content-Type: text/html; charset=utf-8');
//if(isset($_POST['nome_unidade']) && isset($_POST['coordenador_unidade']) && isset($_POST['telefone_unidade'])){  

if (!isset($_SESSION)){
	session_start();
}
$id_usuario = $_SESSION['id_usuario'];
$nome = $_POST['nome'];
$telefone = $_REQUEST['telefone'];
$numdoc = $_REQUEST['numdoc'];
$tipodoc = $_REQUEST['tipodoc'];
$dtaprazo = $_REQUEST['dtaprazo'];
$obs = $_POST['obs'];
$id_usuario = $_SESSION['id_usuario'];
$dataprazo = implode("-",array_reverse(explode("/",$dtaprazo)));

if ($nome !=""){
  $result = mysql_query('SELECT * FROM tbdemanda where demanda_nome = "'.$nome.'"  demanda_numdoc = "'.$numdoc.'"'); 
if ($result){
      while ($row = mysql_fetch_assoc($result)) {
        echo "<font color=red><b>  ".'JA EXISTE UM CADASTRO DE :' .$row['demanda_nome'].' <br>';
        echo "<font color=red><b>  ".'JA EXISTE UM CADASTRO DE :' .$row['demanda_numdoc'].' <br>';
      
      exit;
    }
  }
}

$sqlinsert  = "INSERT INTO  tbdemanda(demanda_data,	demanda_dtaprazo, demanda_numdoc,demanda_tel,demanda_tpdoc,demanda_obs,	demanda_nome,demanda_id_user,demanda_status)
VALUES(now(),'$dataprazo', '$numdoc', '$telefone', '$tipodoc', '$obs', '$nome', '$id_usuario','pendente');";
mysql_query($sqlinsert) or die("Nao foi possivel inserir os dados"); //Ou vai..., ou racha.
header("Location:./listademanda.php");
?>