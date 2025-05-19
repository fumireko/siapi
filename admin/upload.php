<?php
include "../Config/config_sistema.php";

  if(isset($_FILES['dados_documento'])){
    $extensao = strtolower(substr($_FILES['dados_documento']['name'], -5));
    $novo_nome = $_FILES['dados_documento']["name"];
    $tipo_arquivo = $_POST['tipo_arquivo'];
    switch($tipo_arquivo){
      case 1:
        $diretorio = "upload/administrativo/";
        $header = "Location:../admin#/modeloArqADM";
        break;
      case 2:
        $diretorio = "upload/pedagogico/";
        $header = "Location:../admin#/modeloArqPEDAG";
        break;
        case 3:
        $diretorio = "upload/suprimento_pessoal/";
        $header = "Location:../admin#/modeloArqSupPes";
        break;
      case 4:
        $diretorio = "upload/documentacao_escolar/";
        $header = "Location:../admin#/modeloArqDocEscolar";
        break;
      case 5:
        $diretorio = "upload/alimentacao_escolar/";
        $header = "Location:../admin#/modeloArqAlimentacaoEscolar";
        break;
      case 6:
        $diretorio = "upload/controladoria_financas/";
        $header = "Location:../admin#/modeloArqContrFinancas";
        break;
      case 7:
        $diretorio = "upload/atendimento_especial/";
        $header = "Location:../admin#/modeloArqAtendEspec";
        break; 
    }

    move_uploaded_file($_FILES['dados_documento']['tmp_name'], $diretorio.$novo_nome);

    $sql = "INSERT INTO arquivo(arquivo, data, id_tipo_arquivo) VALUES ('$novo_nome', NOW(), $tipo_arquivo)";
    $result = mysql_query($sql) or die(mysql_error());
    if($result)
      header($header);
  }

?>