<?php
include "../validar_session.php";  
include "../Config/config_sistema.php";
//Horário do Brasil - São Paulo
date_default_timezone_set("America/Sao_Paulo");
if (!isset($_SESSION)){
    session_start();
}

$id_dados = $_GET['id_dados'];
$tecnico = $_GET['tecnico'];
$email_usuario = $_SESSION['email_usuario'];
$hora = date('H:i:s');


if ($id_dados !="")
{
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica a conexão
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    // Prepara a consulta
    $id_dados = (int) $id_dados; // Garante que $id_dados seja um número inteiro
    $sql = "SELECT * FROM tbldados WHERE id_dados = ? AND solucao IS NULL";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_dados);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('Chamado sem solução, não pode ser finalizado!.');</script>";
        echo "<script>history.go(-1);</script>";
        exit;
    }

    $stmt->close();






}
//altera registro anterior

// Atualiza o registro
$sql = "UPDATE tbldados SET status = 'finalizado', dtafin = NOW(), cha_horaf = ?, tecnico = ? WHERE id_dados = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssi", $hora, $email_usuario, $id_dados);
$stmt->execute();

$stmt->close();
$conn->close();






header("Location:./frmporstatus.php");
exit;
?>



