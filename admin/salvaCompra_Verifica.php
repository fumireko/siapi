<?php
include "../Config/config_sistema.php";
$id = $_REQUEST['id'];

$sqlinsert  = "UPDATE compra SET estagio = 'Verificado' WHERE id = '$id' ";
mysql_query($sqlinsert) or die("Nao foi possivel inserir os dados"); //Ou vai..., ou racha.
echo "<script>alert('Serviço Cadastrado');</script>";
echo "<script>history.go(-1);</script>";
exit;
?>