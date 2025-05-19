<?php
include "../validar_session.php"; 
include "../Config/config_sistema.php";
$tipo_documento = $_POST['tipo_documento'];
$nivel_usuario = $_SESSION['nivel_usuario'];
$id = $_POST['id'];
$quantidade = $_POST['quantidade'];
$sql = "SELECT * FROM compra where id = '$id' ORDER BY id";
$qr  = mysql_query($sql) or die(mysql_error());

while( $ln = mysql_fetch_assoc($qr) )
{
        if($ln['estagio'] == 'Arquivado'){
            echo "<script>alert('Compra Arquivado');</script>";
            echo "<script>history.go(-1);</script>";
            exit;
        }
        $item = $ln['item'];
        $local = $ln['unidade_usuario'];
        $sqlinsert  = "UPDATE compra SET estagio = 'Arquivado' WHERE id = '$id' ";
        $search = mysql_query($sqlinsert) or die("Nao foi possivel Salvar o Pedido");
        $sqlinsert  = "INSERT INTO  semed.inventario_pedido(quantidade_pedido, item_pedido, local_pedido) VALUES('$quantidade', '$item', '$local');";
        $search = mysql_query($sqlinsert) or die("Nao foi possivel Salvar o Pedido");
        if($search){
            echo "<script>alert('Pedido Salvo');</script>";
            echo "<script>history.go(-1);</script>";
            exit;
        }
}
?>