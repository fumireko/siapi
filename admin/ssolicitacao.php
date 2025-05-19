<?php
include "../Config/config_sistema.php";
$unidade_usuario = $_REQUEST['unidade_usuario'];
$local_servico = $_REQUEST['local_servico'];
$solicitante = $_REQUEST['solicitante'];
$email = $_REQUEST['email'];
$tipo_servico = $_POST['tipo_servico'];
$descricao_servico = $_POST['descricao_servico'];
$material_disponivel = $_POST['material_disponivel'];
$categoria = 'Incompleto';
$status = 'Aberto';

//O determinar o numero que identifica o atendimento, e o ano dele
$ano = date("Y");
$result = mysql_query(" SELECT COUNT(id_pedido) as total FROM solicitacao_servicos where ano_pedido like '%".$ano."%' ") or die('Erro, query falhou');
$data = mysql_fetch_assoc($result);
$numero_por_ano = $data['total'] + 1;


date_default_timezone_set('America/Sao_Paulo');

$dia = date("Y-m-d");

$sqlinsert  = "INSERT INTO solicitacao_servicos(unidade, solicitante, email, tipo_servico, local_sala, descricao_servico_txt, material_disponivel, dia_solic, categoria, status_obra, ano_pedido, id_pedido)
VALUES('$unidade_usuario', '$solicitante', '$email', '$tipo_servico', '$local_servico', '$descricao_servico', '$material_disponivel', '$dia', '$categoria', '$status', '$ano', '$numero_por_ano')";
mysql_query($sqlinsert) or die("Nao foi possivel inserir os dados"); //Ou vai..., ou racha.
echo "<script>alert('Serviço Cadastrado');</script>";
echo "<script>history.go(-1);</script>";
exit;
?>