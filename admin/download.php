<?php
include "../Config/config_sistema.php";
$tipo_arquivo = $_GET['tipo_arq'];
$file = $_GET['file'];

      switch($tipo_arquivo){
            case 1:
              $diretorio = "upload/administrativo";
              break;
            case 2:
              $diretorio = "upload/pedagogico";
              break;
              case 3:
              $diretorio = "upload/suprimento_pessoal";
              break;
            case 4:
              $diretorio = "upload/documentacao_escolar";
              break;
            case 5:
              $diretorio = "upload/alimentacao_escolar";
              break;
            case 6:
              $diretorio = "upload/controladoria_financas";
              break;
            case 7:
              $diretorio = "upload/atendimento_especial";
              break; 
          }
if (isset($_GET['file']) && file_exists("{$diretorio}/".$_GET['file'])){
      $type = filetype("{$diretorio}/{$file}");
      $size = filesize("{$diretorio}/{$file}");
      header("Content-Description: File Transfer");
      header("Content-Type:{$type}");
      header("Content-Length:{$size}");
      header("Content-Disposition: attachment; filename=$file");
      readfile("{$diretorio}/{$file}");
      exit;
} 
?>