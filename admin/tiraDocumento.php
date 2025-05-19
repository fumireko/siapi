<?php 
    include "../Config/config_sistema.php";
    $id = $_REQUEST['id'];
    $consulta = mysql_query("SELECT * FROM arquivo WHERE codigo like $id ");
    while($linhas = mysql_fetch_object($consulta)) {
        unlink("upload/Documentos_para_download/".$linhas->arquivo);
        $sql = mysql_query("DELETE FROM arquivo WHERE codigo like '$id'");
        header ("Location:./newsfeed.php");
    }
?>