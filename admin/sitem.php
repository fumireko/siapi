<?php
include "../Config/config_sistema.php";
$unidade_usuario = $_REQUEST['unidade_usuario'];
$item = $_REQUEST['item'];
$quantidade = $_REQUEST['quantidade'];
$estado = $_REQUEST['estado'];
$descrição = $_REQUEST['descrição'];


if ($item !=""){
    $result = mysql_query('SELECT * FROM item where item = "'.$item.'" ');
	if ($result){
		while ($row = mysql_fetch_assoc($result)) {
            $sqlinsert  = "INSERT INTO inventario_simples(quantidade_inventario_simples, nome_inventario_simples, local_inventario_simples, disponibilidade_simples, estado_simples, descricao_simples)
            VALUES('$quantidade', '$item', '$unidade_usuario', '', '$estado', '$descrição')";
            mysql_query($sqlinsert) or die("Nao foi possivel inserir os dados"); //Ou vai..., ou racha.
            echo "<script>alert('Item(s) Salvo(s)');</script>";
            echo "<script>history.go(-1);</script>";
            exit;
        }
    }
    mysql_free_result($result);
}
echo "<script>alert('Item invalido');</script>";
echo "<script>history.go(-1);</script>";
exit;

//O determinar o numero que identifica o atendimento, e o ano dele
?>