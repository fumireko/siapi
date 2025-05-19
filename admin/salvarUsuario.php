<?php 
    include "../Config/config_sistema.php";

    if(isset($_POST['nome_usuario']) && isset($_POST['email_usuario']) && isset($_POST['senha_usuario']) && isset($_POST['nivel_usuario']) && isset($_POST['unidade_usuario'])){       
        $nome_usuario = $_POST['nome_usuario'];
        $email_usuario = $_POST['email_usuario'];
        $senha_usuario = $_POST['senha_usuario'];
        $nivel_usuario = $_POST['nivel_usuario'];
        $unidade_usuario = $_POST['unidade_usuario'];

        $sql = "INSERT INTO  usuarios(id, nome, senha, email, nivel, id_unidade ) VALUES (NULL,'$nome_usuario','$senha_usuario','$email_usuario','$nivel_usuario','$unidade_usuario')";
        
        $result = mysql_query($sql);
        echo json_encode($result);
    }
?>