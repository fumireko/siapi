<?php
// inclui o arquiv o de configuração do sistema
include "Config/config_sistema.php";
 include "admin/bco_fun.php";
// revebe dados do formulario
$email = $_POST['email'];
$senha = $_POST['senha'];
//echo " email = '$email' and senha = '$senha' <br> ";

// verifica se o usuario existe
$sql = "SELECT usuarios.id, usuarios.nome, usuarios.email,
usuarios.senha, usuarios.nivel, usuarios.id_unidade, usuarios.funcao,
tbcmei.tbcmei_id,tbcmei.tbcmei_nome,tbsecretaria.sec_id, tbsecretaria.sec_nome
from tbcmei inner join usuarios 
ON tbcmei.tbcmei_id = usuarios.id_unidade inner Join tbsecretaria
on tbcmei.tbcmei_sec_id = tbsecretaria.sec_id where usuarios.email = '$email' and usuarios.senha = '$senha'";
//SELECT usuarios.id,usuarios.nome,usuarios.email,usuarios.senha FROM usuarios WHERE usuarios.email='claudio' and usuarios.senha='a123456*';

//$qr  =  mysql_query($sql) or die(mysql_error());
$qr = mysqli_query($conn, $sql) or die(mysqli_error());
$ret_num = mysqli_num_rows($qr);

if(mysqli_num_rows($qr) != 0)
{
	do{
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
			$rec=insere_acesso($conn,$email);
            echo $rec;
    } while ($ln = mysqli_fetch_assoc($qr)) ;
			header("Location:admin/newsfeed.php");					
  //  echo " email = '" . $email . " and senha = '" . $senha . "'   " . $ret_num . "   <br> ";
//}	
}
else
{
    //echo "Erro de conexao !!";
	header("Location: index.php?par=Erro_qr0");
}

?>