



<?php
//include "../validar_session.php"; 
include "../Config/config_sistema.php";
include "bco_fun.php";
$nome_usuario = $_SESSION['nome_usuario'];
$email_usuario = $_SESSION['email_usuario'];
$codequip = $_REQUEST['codequip'];
$unidade_id = $_POST['unidade_id'];
$nomeunidade = $_POST['nomeunidade'];
$ctrl_ti = $_POST['ctrl_ti'];
$ant_sec = cod_sec($conn, $unidade_id);

$ant_resp = $_POST['responsavel'];



$outros = "wks";
if (isset($_POST['novaunidade_id']) or $_POST['novaunidade_id'] != "") {
    $novaunidade_id = $_POST['novaunidade_id'];
} else
    $novaunidade_id = "0";


//$novaunidade_id = $_POST['novaunidade_id'];
$nova_sec = cod_sec($conn, $novaunidade_id);
//echo " unidade :___" . $novaunidade_id."___";

if(($novaunidade_id=="0")or($novaunidade_id=="")or($novaunidade_id == "1")) {
   echo " <br> <br><br> <label title =".$novaunidade_id." >Voce deve informar ( Selecionar )  o nome do Local a ser Substituido </label> ";
    echo "<a href='JavaScript: window.history.back();' title ='Voltar a pagina anterior para correçao ! ' >Voltar</a>";
   //echo "<input type='button' value='Voltar' onClick='<script>history.go(-1);</script>'>"; 
   //echo "<script>history.go(-1);</script>";

} 
else
{
if ($nomeunidade == $novaunidade_id)
{
    echo "<script>alert('Equipamento já cadastrado para essa Unidade.');</script>";
	//echo "<input type='button' value='Voltar' onClick='back()'>";
    echo "<script>history.go(-1);</script>";
		 exit;
}
    $novo_resp = nomedoresponsavel($conn, $novaunidade_id); // busca o nome do novo responsavel
//cria uma lista de hsitorico de triagem
//cria uma lista de hsitorico de triagem
//cria uma lista de hsitorico de triagem

$sqlinsert  = "INSERT INTO tbtrasnfequip(tbtrasnfequip_id,
tbtrasnfequip_idequip,
tbtrasnfequip_idunidadeantiga,
tbtrasnfequip_idunidadenova,
tbtrasnfequip_dtatransf,
tbtrasnfequip_login)
VALUES('','$codequip','$nomeunidade','$novaunidade_id',now(),'$email_usuario')";
mysqli_query($conn,$sqlinsert) or die("Nao foi possivel inserir os dados"); //Ou vai..., ou racha.;
// MSG -> echo "<script>alert('DADOS SALVOS.');</script>";
//altera registro anterior
$sql = ("UPDATE tbequip SET tbequi_tbcmei_id = '$novaunidade_id',tbequip_sec = '$nova_sec', tbequi_tecnico = '$email_usuario',tbequip_resp = '$novo_resp'	
where tbequip_id = '$codequip'");
$consulta = mysqli_query($conn,$sql);
// rotina alteracao
//$ctrl_ti = "Local";
$campo = "Local";
$dados = $nomeunidade . " --> " . $novaunidade_id;
$retorno = registra_alt($conn, $ctrl_ti, $codequip, "1", $campo, $dados, $outros, $nome_usuario);

$campo = "Sec";
$dados = $ant_sec . " --> " . $nova_sec;
$retorno = registra_alt($conn, $ctrl_ti, $codequip, "1", $campo, $dados, $outros, $nome_usuario);

    $campo = "Resp";
    $dados = $ant_resp . " --> " . $novo_resp;
    $retorno = registra_alt($conn, $ctrl_ti, $codequip, "1", $campo, $dados, $outros, $nome_usuario);






    // fim da rotina 

$msg = "<br><br> Equipamento   CTI nº:   " . $ctrl_ti . "  \n do  Local ( " . $nomeunidade . " ),\n  alterado para  ";

echo "<center> <p style=color:blue> <b>" . nl2br($msg) . " </b>  </p></center> <br>";

    $novo_msg = "Novo Local Cadastrado < Cod : ".$novaunidade_id." > \n  ( " . nomedolocal($conn,$novaunidade_id) . " ),\n  Realizado  com sucesso ! ";

    echo "<center> <p style=color:red> <b>" . nl2br($novo_msg) . " </b>  </p></center> <br><br>";


    ?>
 <center> <a href="newsfeed.php"> Inicio </a> </center> <br><br>
  <center> <a href="busca_diversos.php?cti=<?php echo $ctrl_ti; ?>" title="Visualiza Dados do Dispositivo alterado " > Consulta Dispositivo CTI :  <?php echo $ctrl_ti; ?> </a> </center>
 <br><br>   <center> <a href="qrimpressao_termo.php?var= <?php echo $ctrl_ti; ?>" > Gerar Termo do Equipamento  </a> </center>
<?php
}







	




