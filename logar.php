<?php
session_start();

// Inclui o arquivo de configuração do sistema
include "Config/config_sistema.php";
// Recebe dados do formulário
$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';
// Conexão com o banco de dados
$conn = new mysqli($host, $user, $pass, $db1 );
// Verifica conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
// Prepara e executa a query de maneira segura
$sql = "SELECT du.ID, du.Login, du.Senha, du.nivel, du.id_cmei, cm.tbcmcei_id, cm.tbcmei_nome 
        FROM tbcmei cm 
        INNER JOIN dados_usuarios du ON cm.tbcmcei_id = du.id_cmei 
        WHERE du.Login = ?";
        $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
if ($result->num_rows > 0) {
    $ln = $result->fetch_assoc();
     // Verifica a senha (assumindo que esteja armazenada com password_hash)
    if (password_verify($senha, $ln['Senha'])) {
        $_SESSION['id_usuario'] = $ln['ID'];
        $_SESSION['email_usuario'] = $ln['Login'];
        $_SESSION['nivel_usuario'] = $ln['nivel'];
        $_SESSION['unidade_usuario'] = $ln['id_cmei'];
        $_SESSION['nome_usuario'] = $ln['tbcmei_nome'];
         header("Location: admin/");
        exit();
    } else {
        header("Location: index.php?erro=senha_incorreta");
        exit();
    }
} else {
    header("Location: index.php?erro=usuario_nao_encontrado");
    exit();
}
$stmt->close();
$conn->close();
?>
