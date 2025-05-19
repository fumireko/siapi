<?php
// inclui o arquiv o de configuração do sistema
include "Config/config_sistema.php";

// revebe dados do formulario
$email = $_POST['email'];
$senha = $_POST['senha'];
// verifica se o usuario existe
$sql = "SELECT * from usuarios where email = '$email' and senha = '$senha'";
$qr  = mysql_query($sql) or die(mysql_error());

if(mysql_num_rows($qr) != 0){
	while ($ln = mysql_fetch_assoc($qr)) {
			session_start();
			$_SESSION['id_usuario']= $ln['id'];
			$_SESSION['email_usuario'] = $ln['email'];
			$_SESSION['senha_usuario'] = $ln['senha'];
			$_SESSION['nivel_usuario'] = $ln['nivel'];
			$_SESSION['nome_usuario'] = $ln['nome'];
			$_SESSION['unidade_usuario'] = $ln['id_unidade'];
			header("Location:admin/");					
	}	
}
else{
	header("Location: index.php");
}

?>