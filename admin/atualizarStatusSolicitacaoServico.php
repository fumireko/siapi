<?php
include "../Config/config_sistema.php";

$id_solicitacao = $_GET['id_solicitacao'];
$id_status_servico = $_GET['id_status_servico'];
if($id_status_servico == 1){
    $queryAtt = "UPDATE solicitacao_servicos SET id_status_servico = 2 WHERE id_solicitacao = $id_solicitacao";
}
else if($id_status_servico == 2){
    $queryAtt = "UPDATE solicitacao_servicos SET id_status_servico = 3 WHERE id_solicitacao = $id_solicitacao";
}
$result = mysql_query($queryAtt) or die('Erro, query falhou');
header("Location:../admin#/acompObrasPorUnidade");
?>