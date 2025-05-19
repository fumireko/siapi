<?php
include "../validar_session.php"; 
include "../Config/config_sistema.php";
$login_usuario = $_SESSION['login_usuario'];
$id_depto = $_REQUEST['id_depto'];
$id = $_REQUEST['id'];
$nome = $_REQUEST['nome'];
$email = $_REQUEST['email'];
$senha = $_REQUEST['senha'];
$confsenha = $_REQUEST['confsenha'];
//echo $id;
//echo $nome;
//echo $email;
//echo $senha;
//echo $confsenha;

if ($senha != $confsenha)
{
	echo "<script>alert('SENHAS NÃO CONFEREM.');</script>";
	echo "<script>history.go(-1);</script>";
exit;
      	
}
if ($nome == "") 
{
	echo "<script>alert('NOME EM BRANCO.');</script>";
	echo "<script>history.go(-1);</script>";
exit;
      	
}

if ($email == "") 
{
	echo "<script>alert('LOGN/EMAIL EM BRANCO.');</script>";
	echo "<script>history.go(-1);</script>";
exit;
      	
}

if ($senha == "")
{
	echo "<script>alert('SENHA EM BRANCO.');</script>";
	echo "<script>history.go(-1);</script>";
exit;
      	
}

//altera registro anterior
	$sql = ("UPDATE usuarios SET nome = '$nome', 
    email = '$email', senha = '$senha' where id = '$id'");
    $consulta = mysql_query($sql);
	header("Location:listauser.php");
exit;
    //echo "aqui";  
?>

	




