<?php 
include "../Config/config_sistema.php";
if(isset($_POST['senha_usuario'])){       
    $senha_usuario = $_POST['senha_usuario'];
    $id_usuario = $_POST['id_usuario'];

    $sql = "UPDATE usuarios SET senha = '$senha_usuario' WHERE id = '$id_usuario'";
    $result = mysql_query($sql);
    
    echo json_encode($result); 
}
?>