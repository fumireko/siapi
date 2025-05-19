<?php
include "../Config/config_sistema.php";
include ('conn2.php');
include ('bco_fun.php');

//$tpservico = $_POST['opcao'];
if (isset($_POST['digito'])) {
    $busca = $_POST['digito'];
}else
   $busca = "Campo Vazio ";
//$prob = $_POST['prob'];
$hora = date("H:i:s");
$Fkey = "ventisol";
if (isset($_POST['opcao']))
{
    $tpservico = $_POST['opcao'];
   // var_dump("escolheu " . $tpservico);
    echo "Checagem por  " . $tpservico;
    echo "  " . $busca."<br>";
    $campo = $busca;
    if ($tpservico == "Codar") 
     {
     $retorno = cod_cripta($busca, $Fkey);
        echo $retorno."<br>";
        echo " <a href=corretor_manual_codar.php?pat=" . $retorno . "  > Voltar </a>";
        
     }
        else
    {
        if ($tpservico == "Descodar")
        {
            $retorno = cod_descripta($busca, $Fkey);
            echo $retorno . "<br>";
        }   
        else{
            if ($tpservico == "Carac") {
               // $retorno0 = charset_decode_utf_8($busca);
               // $retorno1 = removeracento($busca);
               // $retorno2 = retiraAcentos($busca);
               // $retorno3 = preg_replace("[^a-zA-Z0-9_]", "", strtr($busca, "·‡„‚ÈÍÌÛÙı˙¸Á¡¿√¬… Õ”‘’⁄‹« ", "aaaaeeiooouucAAAAEEIOOOUUC_"));
                $retorno4 = sanitizeString($busca);
              //  $retorno5 = clean2($busca);
             //   $retorno6= normalizeNFD($busca);
                //echo $retorno0 . "   ".$retorno1. "   ".$retorno2 . "   ".$retorno3 . "   ".$retorno4 . "   ".$retorno5 . "   <br>";
                echo $retorno4 . "   <br>";
            }

        }

        
      //  echo " <a href=corretor_manual_codar.php?pat=" . $retorno . "  > Voltar </a>";
        
    }
}
 else
   {
            echo "<br> Voce nao escolheu nenhuma opcao  <br><br> "; 
            echo " <a href=corretor_manual_codar.php  >  Voltar </a>";
   }



?>



