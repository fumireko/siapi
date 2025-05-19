<?php
include "../validar_session.php"; 
include "../Config/config_sistema.php";

date_default_timezone_set('America/Sao_Paulo');
$dia = date("Y-m-d");
$id_solicitacao = $_POST['id_solicitacao'];
$protocolo = $_POST['protocolo'];
$categoria = $_POST['categoria'];
$status = $_POST['status'];
//altera registro anterior

$result = mysql_query('SELECT * FROM solicitacao_servicos where id_solicitacao = "'.$id_solicitacao.'" ');
if ($result){
	while ($row = mysql_fetch_assoc($result)) {
        if($row['status_obra'] == 'Finalizado'){
			echo "<script>alert('Serviço fechado');</script>";
			echo "<script>history.go(-1);</script>";
			exit;
        }
        else{
            if($status == 'Em Andamento'){
                //Começa a obra
                $sql = ("UPDATE solicitacao_servicos SET num_pedido = '$protocolo', categoria = '$categoria', status_obra = '$status', dia_comeco = '$dia' where id_solicitacao = '$id_solicitacao'");
                $consulta = mysql_query($sql) or die("Nao foi possivel inserir os dados na tabela Obra");
                
                if($consulta)
                {
                    echo "<script>alert('Solicitação Atualizada');</script>";
                    echo "<script>history.go(-1);</script>";
                    exit;
                }
            }
            else{
                //Altera algum dado da obra
                $sql = ("UPDATE solicitacao_servicos SET num_pedido = '$protocolo', categoria = '$categoria', status_obra = '$status' where id_solicitacao = '$id_solicitacao'");
                $consulta = mysql_query($sql) or die("Nao foi possivel inserir os dados na tabela Obra");
                
                if($consulta)
                {
                    echo "<script>alert('Solicitação Atualizada');</script>";
                    echo "<script>history.go(-1);</script>";
                    exit;
                }
            }
        }
	}
}

?>



