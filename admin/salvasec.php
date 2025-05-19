<?php
include "../Config/config_sistema.php";
$sec = $_REQUEST['sec'];
$sigla = $_REQUEST['sigla'];
$resp = $_REQUEST['resp'];

if ($sec !=""){
    $result = mysql_query('SELECT * FROM tbsecretaria where sec_nome = "'.$sec.'" ');
	if ($result){
		 while ($row = mysql_fetch_assoc($result)) {
		 echo "<font color=red><b>  ".'SECRETARIA Já CADASTRADA :' .$row['sec_nome'].' <br>';
	
	     
    //echo $row['nome'] .' ja cadastrado no sistema';
    exit;
	}
}
}
$sqlinsert  = "INSERT INTO tbsecretaria(sec_sigla,sec_nome,sec_resp)
VALUES('$sigla','$sec','$resp')";
mysql_query($sqlinsert) or die("Nao foi possivel inserir os dados"); //Ou vai..., ou racha.
header("Location:./#/cadsec");

?>
