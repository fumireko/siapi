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
$cmei_id = $_POST['id_cmei'];  // id do cmei
$cmei_nome = $_POST['nome']; // nome a ser alterado
echo "<br><br><center>  Alterando os dados do ID : " . $cmei_id . " para : " . $cmei_nome . " <br><br> </center> "; 
 //$id_usuario = $_SESSION['id_usuario'];

if ($cmei_nome != "") {
    $sqlinsert = "UPDATE `tbcmei` SET `tbcmei_nome`='" . $cmei_nome . "' WHERE `tbcmei`.`tbcmei_id` =" . $cmei_id . " ;";
    //$sqlinsert  = "update INSERT INTO  tbcmei(tbcmei_sec_id,tbcmei_nome )VALUES('$sec_id','$nome');";
   $resultadodaAcao =  mysqli_query($conn, $sqlinsert) or die("Nao foi possivel inserir os dados"); //Ou vai..., ou racha.
    if ($resultadodaAcao == "1")
        echo "<BR>  Alterado o id :  " . $cmei_id . "  <BR>  Nome atualizado  para " . $cmei_nome . "  <br> <br> ";
    else
        echo "Nao foi possivel realizar a Ação  <br> <br> ";
}
//header("Location:./listadepto.php");


?>

<input type='button' value='Voltar' onClick='JavaScript: window.history.back();'>