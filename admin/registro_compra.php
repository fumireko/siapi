<?php
include "../validar_session.php"; 
include "../Config/config_sistema.php";

$id = $_REQUEST['id'];
echo $id;
$registro = $_REQUEST['registro'];
echo $registro;

//altera registro anterior
    $sqlinsert  = "INSERT INTO  semed.tbregistro(tbregistro_compra_id, tbregistro_msg, tbregistro_usuario) VALUES('$id', '$registro', '$id_usuario');";
    $search = mysql_query($sqlinsert) or die("Nao foi possivel inserir os dados na tabela Obra");
    if($search)
    {
        echo "<script>alert('Registro Salvo');</script>";
        echo "<script>history.go(-1);</script>";
        exit;
    }
?>