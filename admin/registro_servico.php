<?php
include "../validar_session.php"; 
include "../Config/config_sistema.php";

date_default_timezone_set('America/Sao_Paulo');
$dia = date("Y-m-d");
$hora = date("H:i:s");
$id_solicitacao = $_POST['id_solicitacao'];
$registro = $_POST['registro'];

//altera registro anterior

$result = mysql_query('SELECT * FROM solicitacao_servicos where id_solicitacao = "'.$id_solicitacao.'" ');
if ($result){
	while ($row = mysql_fetch_assoc($result)) {
		
        $sqlinsert  = "INSERT INTO  semed.tbregistro(tbregistro_id_solicitacao, tbregistro_msg, tbregistro_usuario, dia_registro, hora_registro) VALUES('$id_solicitacao', '$registro', '$id_usuario', '$dia', '$hora');";
        $search = mysql_query($sqlinsert) or die("Nao foi possivel inserir os dados na tabela Obra");
        if($search)
        {
            echo "<script>alert('Registro Salvo');</script>";
            echo "<script>history.go(-1);</script>";
            exit;
        }
	}
}

?>



