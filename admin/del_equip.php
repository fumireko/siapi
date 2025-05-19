<?php
include "../validar_session.php"; 
include "../Config/config_sistema.php";

$tbequip_id = $_REQUEST['tbequip_id'];
$query = mysql_query("DELETE FROM tbequip WHERE tbequip_id = '".$tbequip_id."'");

mysql_query($query);
header("Location:listaequip.php");
?>
