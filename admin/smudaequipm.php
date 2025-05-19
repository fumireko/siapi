<?php
include "../validar_session.php"; 
include "../Config/config_sistema.php";
include "bco_fun.php";
$nome_usuario = $_SESSION['nome_usuario'];
$email_usuario = $_SESSION['email_usuario'];
$codequip = $_REQUEST['codequip'];
$unidade_id = $_POST['loc_id'];

$novaunidade_id = $_POST['novaunidade_id'];
$ctrl_ti = $_POST['ctrl_ti'];
$ant_sec = cod_sec($conn, $unidade_id);
$nova_sec = cod_sec($conn, $novaunidade_id);
$outros = " ";
$nomeunidade = nomedolocal($conn, $unidade_id);
$sec_ant = cod_sec($conn, $unidade_id);
$sec_atual = cod_sec($conn, $novaunidade_id);
$dado_extra = "Tabela : 3 ( monitores )  id : " . $codequip."  CTI = ".$ctrl_ti;
//$dado_extra = 1;

if ($unidade_id == $novaunidade_id)
{
    echo "<script>alert('Equipamento já cadastrado para essa Unidade.');</script>";
	echo "<script>history.go(-1);</script>";
		 exit;
}
//cria uma lista de hsitorico de triagem
//cria uma lista de hsitorico de triagem
//cria uma lista de hsitorico de triagem
/*$sqlinsert  = "INSERT INTO tbtrasnfequip(tbtrasnfequip_id,
tbtrasnfequip_idequip,
tbtrasnfequip_idunidadeantiga,
tbtrasnfequip_idunidadenova,
tbtrasnfequip_dtatransf,
tbtrasnfequip_tbtrasnfequip,
tbtrasnfequip_login)
VALUES('','$codequip','$nomeunidade','$novaunidade_id',now(),'$novaunidade_id','$email_usuario')";

*/

$sqlinsert = "INSERT INTO tbtrasnfequip(tbtrasnfequip_id,
tbtrasnfequip_idequip,
tbtrasnfequip_idunidadeantiga,
tbtrasnfequip_idunidadenova,
tbtrasnfequip_dtatransf,
tbtrasnfequip,
tbtrasnfequip_login)
VALUES('','$codequip','$nomeunidade','$novaunidade_id',now(),'$dado_extra','$email_usuario')";





mysqli_query($conn,$sqlinsert) or die("Nao foi possivel inserir os dados"); //Ou vai..., ou racha.;
// MSG -> echo "<script>alert('DADOS SALVOS.');</script>";
//altera registro anterior

$sql = ("UPDATE tb_monitores SET local_id = '$novaunidade_id',sec_id = '$nova_sec', usuario = '$email_usuario'	
where id = '$codequip'");
$consulta = mysqli_query($conn,$sql);


//echo " Alteracao de local do equipamento CTI  ".$ctrl_ti ."  Tabela diversos  id ".$codequip."    <br>  ";
//echo " local antigo    ".$unidade_id."  Secretaria  ".$sec_ant."    <br>  ";
//echo " local novoo    " . $novaunidade_id . "  Secretaria  ".$sec_atual."   <br>  ";


// rotina alteracao
//$ctrl_ti = "Local";
$campo = "Local";
$dados = $unidade_id . " --> " . $novaunidade_id;
$retorno = registra_alt($conn, $ctrl_ti, $codequip, "3", $campo, $dados, $outros, $nome_usuario);

$campo = "Sec";
$dados = $sec_ant . " --> " . $sec_atual;
$retorno = registra_alt($conn, $ctrl_ti, $codequip, "3", $campo, $dados, $outros, $nome_usuario);


// fim da rotina 

header("Location:listaequip.php");
exit;

?>





	




