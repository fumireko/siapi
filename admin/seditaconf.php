<?php
include "../validar_session.php"; 
include "../Config/config_sistema.php";
$email_usuario = $_SESSION['email_usuario'];
$codequip = $_REQUEST['codequip'];
$nomeunidade = $_POST['nomeunidade'];
$novaunidade_id = $_POST['novaunidade_id'];
$modelprocessador = $_POST['modelprocessador'];
$descplaca = $_POST['descplaca'];
$monitor = $_POST['monitor'];
$memoria = $_POST['memoria'];
$modmemoria = $_POST['modmemoria'];
$armazenamento = $_POST['armazenamento'];
$tparmazenamento = $_POST['tparmazenamento'];
$teclado = $_POST['teclado'];
$mouse = $_POST['mouse'];
$filtrodelinha = $_POST['filtrodelinha'];

if ($nomeunidade == "")
{
    echo "<script>alert('Erro de unidade.');</script>";
	echo "<script>history.go(-1);</script>";
		 exit;
}

$sql = ("UPDATE tbequip SET tbequip_monitor = '$tbequip_monitor', 
tbequi_mod = '$modelprocessador',
tbequi_modplaca = '$descplaca',
tbequi_memoria = '$memoria',
tbequi_modelomemoria = '$modmemoria',
tbequi_armazenamento = '$armazenamento',
tbequi_tparmazenamento = '$tparmazenamento',
tbequi_teclado = '$teclado',
tbequi_mouse = '$mouse',
tbequi_filtrodelinha = '$filtrodelinha',
tbequi_tecnico = '$email_usuario'	
where tbequip_id = '$codequip'");
$consulta = mysql_query($sql);
header("Location:listaconf.php");
exit;

?>





	




