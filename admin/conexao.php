<?php
$db_banco ="colombo_siap";
$db_user = "root"; //"colombo_siap";
$db_pass = ""; //"Guwgw2dz0Bs7";
$host = 'localhost';

$conexao = @mysqli_connect($host,$db_user,$db_pass);
if (!($conexao)){
    print("<script language=JavaScript>
          alert(\"N�o foi poss�vel conectar ao Banco de Dados.\");
          </script>");
	echo $conexao;
    exit;
}

$db = mysqli_select_db($conexao, $db_banco) or
    die("<script language=JavaScript>alert(\"Tabela inexistente!\");</script>"); 
?>