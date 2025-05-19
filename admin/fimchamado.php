<?php
include "../validar_session.php"; 
include "../Config/config_sistema.php";

date_default_timezone_set('America/Sao_Paulo');
$dia = date("Y-m-d");
$hora = date("H:i:s");
$id_solicitacao = $_POST['id_solicitacao'];
$registro = $_POST['registro'];
$protocolo = $_POST['protocolo'];
$categoria = $_POST['categoria'];
$status = $_POST['status'];

if($protocolo == ''){
    echo "<script>alert('Insira o numero de protocolo na outra pagina');</script>";
	echo "<script>history.go(-1);</script>";
	exit;
}
$result = mysql_query('SELECT * FROM solicitacao_servicos where id_solicitacao = "'.$id_solicitacao.'" ');
if ($result){
	while ($row = mysql_fetch_assoc($result)) {
		if($row['status_obra'] == 'Finalizado'){
			echo "<script>alert('Serviço fechado');</script>";
			echo "<script>history.go(-1);</script>";
			exit;
		}  
		if($row['status_obra'] == 'Aberto'){
			echo "<script>alert('Servico com status em aberto');</script>";
			echo "<script>history.go(-1);</script>";
			exit;
        }
        if($row['fim'] == ''){
			echo "<script>alert('Servico sem comprovante de fim');</script>";
			echo "<script>history.go(-1);</script>";
			exit;
        }
    }
}

//Banco de dados
$sql = ("UPDATE solicitacao_servicos SET num_pedido = '$protocolo', categoria = '$categoria', status_obra = '$status', dia_fim = '$dia' where id_solicitacao = '$id_solicitacao'");
$consulta = mysql_query($sql);
$search = mysql_query($sql) or die("Nao foi possivel inserir os dados na tabela Obra");
if($search)
{
    echo "<script>alert('Solicitação Atualizada');</script>";
    echo "<script>history.go(-1);</script>";
    exit;
}

?>