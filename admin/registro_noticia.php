<?php
include "../validar_session.php"; 
include "../Config/config_sistema.php";

date_default_timezone_set('America/Sao_Paulo');
$dia = date("Y-m-d");
$registro = $_POST['registro'];

//altera registro anterior
		
        $sqlinsert  = "INSERT INTO  semed.noticia(msg_noticia, dia_noticia) VALUES('$registro', '$dia');";
        $search = mysql_query($sqlinsert) or die("Nao foi possivel inserir os dados na tabela Obra");
        if($search)
        {
            echo "<script>alert('Registro Salvo');</script>";
            echo "<script>history.go(-1);</script>";
            exit;
        }

?>