<?php
//   include "../validar_session.php";  
 //  include "../Config/config_sistema.php";
include ("conn2.php"); 
 include ("bco_fun.php");
$ret_plaq = $_GET['plaq'];

$sql1 = "SELECT * FROM tbequip where tbequip_plaqueta like '%" . $ret_plaq . "%' ORDER BY tbequip_id" ;
$resultado1 = mysqli_query($conn, $sql1) or die('Erro ao selecionar especialidade: ' . mysqli_error());
//mysqli_query($conn,'SET character_set_connection=utf8');
mysqli_query($conn,'SET character_set_results=utf8');
$qtd = mysqli_num_rows($resultado1);  // $option = '';
if ($qtd == 0)
    $nome_local = "Nenhum local encontrado";
else {
    echo  "  Registros similares  encontrados   para a plaqueta   " . $ret_plaq . "<br>  ";
    do {
        $row = mysqli_fetch_assoc($resultado1);
        $nome_local = $row['tbequi_nome'];
        $local = $row['tbequi_tbcmei_id'];
        $modelo = $row['tbequi_mod'];
        $id = $row['tbequip_id'];
        $plaqueta = $row['tbequip_plaqueta'];
        $ret_sec_id = cod_sec($conn,$local);
        $unidade = nomedolocal($conn,$local);
        $resultado = "Registro Nº " . $id ."   Patrimonio  " . $plaqueta . "  \n  " . $unidade . "  \n  Mod/ Equipamento   " . $modelo . "\n   " . nomedesecretaria($conn,$ret_sec_id) . "";      
        echo  "<center> <p style=color:black> <b>".nl2br($resultado)." </b>  </p></center>  ";
    } while ($row = mysqli_fetch_assoc($resultado1));
}

//echo "Patrimonio  " . $ret_plaq . "    " . $unidade . "   Equipamento   " . $modelo . "  Registro Nº   " . $id . "  Secretaria codigo   " . $ret_sec_id . "<br>";

echo "<br><br><a href='corretor_manual.php' title='SELECIONAR '>Voltar </a>  <br /><br /> ";
echo "<a href='index.php' title='SELECIONAR '>Inicio </a>  <br /><br /> ";



?>

   