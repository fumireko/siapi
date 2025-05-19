<?php
include "../Config/config_sistema.php";
$unidade_usuario = $_REQUEST['unidade_usuario'];
$objeto = $_REQUEST['objeto'];
$quantidade = $_REQUEST['quantidade'];
$justificativa = $_REQUEST['justificativa'];
$acao = $_REQUEST['acao'];
$substitui = $_REQUEST['substitui'];
$solicitacao = $_REQUEST['solicitacao'];

//O determinar o numero que identifica o atendimento, e o ano dele
$ano = date("Y");
$result = mysql_query(" SELECT COUNT(id_pedido) as total FROM compra where ano_pedido like '%".$ano."%' ") or die('Erro, query falhou');
$data = mysql_fetch_assoc($result);
$numero_por_ano = $data['total'] + 1;

date_default_timezone_set('America/Sao_Paulo');

$dia = date("Y-m-d");

$sqlinsert  = "INSERT INTO compra(item, quantidade, justificativa, id_pedido, ano_pedido, unidade_usuario, ação, substitui, solicitacao, estagio)
VALUES('$objeto', '$quantidade','$justificativa', '$numero_por_ano', '$ano', '$unidade_usuario', '$acao', '$substitui', '$solicitacao', 'Aberto')";
mysql_query($sqlinsert) or die("Nao foi possivel inserir os dados"); //Ou vai..., ou racha.
echo "<script>alert('Serviço Cadastrado');</script>";
echo "<script>history.go(-1);</script>";
exit;
?>