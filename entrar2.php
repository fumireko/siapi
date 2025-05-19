<?php
// inclui o arquiv o de configuração do sistema
include "Config/config_sistema.php";

// revebe dados do formulario
$email = $_POST['email'];
$senha = $_POST['senha'];
// verifica se o usuario existe
$sql = "SELECT dados_usuarios.ID,dados_usuarios.Login, dados_usuarios.Senha, dados_usuarios.nivel, dados_usuarios.id_cmei,
tbcmei.tbcmcei_id,tbcmei.tbcmei_nome 
from tbcmei inner join dados_usuarios ON tbcmei.tbcmcei_id = dados_usuarios.id_cmei
where dados_usuarios.Login = '$email'";
$qr  = mysql_query($sql) or die(mysql_error());
while ($ln = mysql_fetch_assoc($qr))

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