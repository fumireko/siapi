<?php 
include "../validar_session.php"; 
include "../Config/config_sistema.php";
//header('Content-Type: text/html; charset=utf-8');
//if(isset($_POST['nome_unidade']) && isset($_POST['coordenador_unidade']) && isset($_POST['telefone_unidade'])){  

if (!isset($_SESSION)){
	session_start();
}
//echo $sec_id;

//$sec_id = $_REQUEST['sec_id'];
$sec_id = $_POST['sec_id'];
$nome = $_REQUEST['nome'];

/*$responsavel = $_POST['responsavel'];
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
/*/
$id_usuario = $_SESSION['id_usuario'];

if ($nome !=""){
    $sql = 'SELECT * FROM tbcmei where tbcmei_nome = "' . $nome . '" ';
    $result = mysqli_query($conn, $sql) or die(mysqli_error());
    //$result = mysqli_query('SELECT * FROM tbcmei where tbcmei_nome = "'.$nome.'" '); 
if ($result){
      while ($row = mysqli_fetch_assoc($result)) {
      echo "<font color=red><b>  ".'JA EXISTE UM CADASTRO DE :' .$row['tbcmei_nome'].' <br>';
            echo "<input type='button' value='Voltar' onClick='JavaScript: window.history.back();'>";
      exit;
    }
  }
}
//$sqlinsert = "INSERT INTO `tbcmei` ( `tbcmei_nome`,  `tbcmei_sec_id`) VALUES ('SEMOV - Vias Urbanas - Sede', '38');";
$sqlinsert  = "INSERT INTO  tbcmei(tbcmei_sec_id,tbcmei_nome )VALUES('$sec_id','$nome');";
$resultadodaAcao= mysqli_query($conn,$sqlinsert) or die("Nao foi possivel inserir os dados"); //Ou vai..., ou racha.
if ($resultadodaAcao == "1")
    echo "<BR>  INSERIDO  o LOCAL : " . $nome . "  <br> <br> ";
else
    echo "Nao foi possivel realizar a Ação  <br> <br> ";

//header("Location:./listadepto.php");
?>
<input type='button' value='Voltar' onClick='JavaScript: window.history.back();'>