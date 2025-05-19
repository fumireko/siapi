<?php 
    include "../validar_session.php"; 
    include "../Config/config_sistema.php";
    //header('Content-Type: text/html; charset=utf-8');
    //if(isset($_POST['nome_unidade']) && isset($_POST['coordenador_unidade']) && isset($_POST['telefone_unidade'])){   
    if (!isset($_SESSION)){
        session_start();
    }
    $email_usuario = $_SESSION['email_usuario'];  
    $dia = $_POST['dia'];   
    $descricao = $_POST['descricao'];
    $grupo = $_REQUEST['id_gp'];
    $sqlinsert = "INSERT INTO  semed.tbevento(descricao_evento, id_grupo, logins, dia) VALUES('$descricao','$grupo', '$email_usuario', '$dia');";
    mysql_query($sqlinsert) or die("Nao foi possivel inserir os dados na tabela grupo"); //Ou vai..., ou racha.

    header("Location:./#/cadevento");

?>