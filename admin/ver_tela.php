<?php
include "bco_fun2.php";

$resolucao = ver_res();
$lar_tela = ver_res_w();
//echo "<br> <br> <br> <br>";
//echo "<center> <h5>".$resolucao."</h5> </center>";
//echo "<i> <h5>" . $resolucao . "</h5> </i>";
echo "<img src='img/tela.jpg' title='".$resolucao."' alt='resolucao de tela' width='10' height='15'>";

if($lar_tela<321)
 { // telas menores ( celulares antigos)
    
 }
  else
  {
    if ($lar_tela > 1023) 
    { // tela de desktopo

    } else // tamnho compreendido entre 320 e 1024 celulares gde e tablets 
    {
   
    
    }
  }

?>
<!DOCTYPE html>

<html lang="pt-br" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title></title>
</head>
<style>
    form {
        /* Centralizar o formulário na pagina */
        margin: 0 auto;
        width: 100px;
        /* Ver o esboço do formulário */
        padding: 1em;
        border: 1px solid #CCC;
        border-radius: 1em;
        background-color: #f0f6f7;
    }

</style>

<body>
 <form method="post" action="#">
<?php

echo "<br>";
echo "<center> <h5>".$resolucao."</h5> </center>";

?>
     </form>
</body>
</html>