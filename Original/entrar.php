<?php
// inclui o arquiv o de configuração do sistema
include "Config/config_sistema.php";
// revebe dados do formulario
$email = $_POST['email'];
$senha = $_POST['senha'];
// verifica se o usuario existe
$sql = "SELECT usuarios.id, usuarios.nome, usuarios.email,
usuarios.senha, usuarios.nivel, usuarios.id_unidade, usuarios.funcao,
tbcmei.tbcmei_id,tbcmei.tbcmei_nome,tbsecretaria.sec_id, tbsecretaria.sec_nome
from tbcmei inner join usuarios 
ON tbcmei.tbcmei_id = usuarios.id_unidade
inner Join tbsecretaria
on tbcmei.tbcmei_sec_id = tbsecretaria.sec_id	

where email = '$email' and senha = '$senha'";
$qr  = mysql_query($sql) or die(mysql_error());
if(mysql_num_rows($qr) != 0){
	while ($ln = mysql_fetch_assoc($qr)) {
			session_start();
			$_SESSION['id_usuario']= $ln['id'];
			$_SESSION['email_usuario'] = $ln['email'];
			$_SESSION['senha_usuario'] = $ln['senha'];
			$_SESSION['nivel_usuario'] = $ln['nivel'];
			$_SESSION['nome_usuario'] = $ln['nome'];
			$_SESSION['funcao_usuario']=$ln['funcao'];
			$_SESSION['unidade_usuario']=$ln['id_unidade'];
			$_SESSION['tbcmei_nome'] = $ln['tbcmei_nome'];
			$_SESSION['sec_id']= $ln['sec_id'];
			$_SESSION['sec_nome']= $ln['sec_nome'];
			header("Location:admin/newsfeed.php");					
	}	
}
else{
	header("Location: index.php");
}

?>