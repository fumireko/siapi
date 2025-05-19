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
//altera registro anterior

$result = mysql_query('SELECT * FROM solicitacao_servicos where id_solicitacao = "'.$id_solicitacao.'" ');
if ($result){
	while ($row = mysql_fetch_assoc($result)) {
		if($row['status_obra'] == 'Finalizado'){
			echo "<script>alert('Serviço fechado');</script>";
			echo "<script>history.go(-1);</script>";
			exit;
		}
		// Checar se A Solicitação esta em aberto e caso o usuario inicie o serviço, salva a data de começo e marca um registro
		if($row['status_obra'] == 'Aberto'){
			if($row['categoria'] == 'Incompleto'){
				//Cataloga como Obra ou Chamado/Pequeno Servico
				$sql = ("UPDATE solicitacao_servicos SET num_pedido = '$protocolo', categoria = '$categoria', status_obra = '$status' where id_solicitacao = '$id_solicitacao'");
				$consulta = mysql_query($sql) or die("Nao foi possivel inserir os dados na tabela Obra");
				
				if($consulta)
				{
					echo "<script>alert('Solicitação Atualizada');</script>";
					echo "<script>history.go(-1);</script>";
					exit;
				}
			}
			else{
				if($status == 'Aberto'){
					if($registro == ''){
						//Cataloga como Obra ou Chamado/Pequeno Servico sem comentario
						$sql = ("UPDATE solicitacao_servicos SET num_pedido = '$protocolo', categoria = '$categoria', status_obra = '$status' where id_solicitacao = '$id_solicitacao'");
						$consulta = mysql_query($sql) or die("Nao foi possivel inserir os dados na tabela Obra");
						
						if($consulta)
						{
							echo "<script>alert('Solicitação Atualizada');</script>";
							echo "<script>history.go(-1);</script>";
							exit;
						}
					}
					else{
						//Cataloga como Obra ou Chamado/Pequeno Servico com comentario
						$sql = ("UPDATE solicitacao_servicos SET num_pedido = '$protocolo', categoria = '$categoria', status_obra = '$status' where id_solicitacao = '$id_solicitacao'");
						$consulta = mysql_query($sql);
						
						$sqlinsert  = "INSERT INTO  semed.tbregistro(tbregistro_id_solicitacao, tbregistro_msg, tbregistro_usuario, dia_registro, hora_registro) VALUES('$id_solicitacao', '$registro', '$id_usuario', '$dia', '$hora');";
						$search = mysql_query($sqlinsert) or die("Nao foi possivel inserir os dados na tabela Obra");
						if($search)
						{
							echo "<script>alert('Solicitação Atualizada');</script>";
							echo "<script>history.go(-1);</script>";
							exit;
						}
					}
				}
				else{
					if($registro == ''){
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
						//Começa a obra
						$sql = ("UPDATE solicitacao_servicos SET num_pedido = '$protocolo', categoria = '$categoria', status_obra = '$status', dia_comeco = '$dia' where id_solicitacao = '$id_solicitacao'");
						$consulta = mysql_query($sql);
						
						$sqlinsert  = "INSERT INTO  semed.tbregistro(tbregistro_id_solicitacao, tbregistro_msg, tbregistro_usuario, dia_registro, hora_registro) VALUES('$id_solicitacao', '$registro', '$id_usuario', '$dia', '$hora');";
						$search = mysql_query($sqlinsert) or die("Nao foi possivel inserir os dados na tabela Obra");
						if($search)
						{
							echo "<script>alert('Solicitação Atualizada');</script>";
							echo "<script>history.go(-1);</script>";
							exit;
						}
					}
				}
			}	
		}
		// Checar se A Solicitação esta em Andamento e caso o usuario finalize o serviço, salva a data de começo e marca um registro
		if($row['status_obra'] == 'Em Andamento'){
			if($status == 'Finalizado'){
				if($registro == ''){
					//Termina a Obra
					$sql = ("UPDATE solicitacao_servicos SET num_pedido = '$protocolo', categoria = '$categoria', status_obra = '$status', dia_fim = '$dia' where id_solicitacao = '$id_solicitacao'");
					$consulta = mysql_query($sql) or die("Nao foi possivel inserir os dados na tabela Obra");
					
					if($consulta)
					{
						echo "<script>alert('Solicitação Atualizada');</script>";
						echo "<script>history.go(-1);</script>";
						exit;
					}
				}
				else{
					//Termina a Obra
					$sql = ("UPDATE solicitacao_servicos SET num_pedido = '$protocolo', categoria = '$categoria', status_obra = '$status', dia_fim = '$dia' where id_solicitacao = '$id_solicitacao'");
					$consulta = mysql_query($sql);
					
					$sqlinsert  = "INSERT INTO  semed.tbregistro(tbregistro_id_solicitacao, tbregistro_msg, tbregistro_usuario, dia_registro, hora_registro) VALUES('$id_solicitacao', '$registro', '$id_usuario', '$dia', '$hora');";
					$search = mysql_query($sqlinsert) or die("Nao foi possivel inserir os dados na tabela Obra");
					if($search){
						echo "<script>alert('Solicitação Atualizada');</script>";
						echo "<script>history.go(-1);</script>";
						exit;
					}
				}	
			}
			else{
				if($registro == ''){
					//Termina a Obra
					$sql = ("UPDATE solicitacao_servicos SET num_pedido = '$protocolo', categoria = '$categoria', status_obra = '$status' where id_solicitacao = '$id_solicitacao'");
					$consulta = mysql_query($sql) or die("Nao foi possivel inserir os dados na tabela Obra");
					
					if($consulta)
					{
						echo "<script>alert('Solicitação Atualizada');</script>";
						echo "<script>history.go(-1);</script>";
						exit;
					}
				}
				else{
					//Mais um Registro da obra
					$sql = ("UPDATE solicitacao_servicos SET num_pedido = '$protocolo', categoria = '$categoria', status_obra = '$status' where id_solicitacao = '$id_solicitacao'");
					$consulta = mysql_query($sql);
					
					$sqlinsert  = "INSERT INTO  semed.tbregistro(tbregistro_id_solicitacao, tbregistro_msg, tbregistro_usuario, dia_registro, hora_registro) VALUES('$id_solicitacao', '$registro', '$id_usuario', '$dia', '$hora');";
					$search = mysql_query($sqlinsert) or die("Nao foi possivel inserir os dados na tabela Obra");
					if($search){
						echo "<script>alert('Solicitação Atualizada');</script>";
						echo "<script>history.go(-1);</script>";
						exit;
					}
				}
			}
		}
	}
}

?>



