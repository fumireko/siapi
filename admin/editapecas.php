<?php
include "../validar_session.php";  
include "../Config/config_sistema.php";
if (!isset($_SESSION)){
    session_start();
}
$tbequip_id = $_GET['tbequip_id'];
$sql = "SELECT tbequip.tbequip_id,
tbequip.tbequip_plaqueta,
tbequip.tbequip_monitor,
tbequip.tbequi_mod,
tbequip.tbequi_modplaca,
tbequip.tbequi_memoria,
tbequip.tbequi_modelomemoria, 
tbequip.tbequi_armazenamento,	 
tbequip.tbequi_tparmazenamento,
tbequip.tbequi_datalanc,
tbequip.tbequi_teclado,
tbequip.tbequi_mouse,
tbequip.tbequi_filtrodelinha,
tbequip.tbequi_tecnico,
tbequip.tbequi_tbcmei_id,
tbcmei.tbcmei_id,
tbcmei.tbcmei_nome
FROM tbequip INNER JOIN tbcmei 
ON tbequip.tbequi_tbcmei_id = tbcmei.tbcmei_id
where tbequip.tbequip_id = '$tbequip_id' ORDER BY tbequip_id";
$qr  = mysql_query($sql) or die(mysql_error());
while( $ln = mysql_fetch_assoc($qr) )
{
    $unidade_id = $ln['tbcmei_id'];
    $nomeunidade = $ln['tbcmei_nome'];
    $codequip = $ln['tbequip_id'];
    $dtlan = $ln['tbequi_datalanc'];
    $datalanc = implode("/",array_reverse(explode("-",$dtlan)));
//}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-BR" lang="pt-BR" ng-app="App">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <meta name="author" content="Admin" />
        <title>SEMTI - Sistema de Gestao T.I</title>
         
    </head>
    <!-- BEGIN BODY -->
    <body>
         <!-- START TOPBAR -->
        <?php 
          include "index.php"
        ?> 
        <div id="main-content">
        <section class="wrapper main-wrapper">
        <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
        <div class="page-title">
        <div class="pull-left">
            <h1 class="title">Sistema de Gestao T.I</h1>
        </div>
    </div>
    </div>
     <div class="clearfix"></div>
    <section class="box ">
    <header class="panel_header">
            <h2 class="title pull-left">Aletrando local do equipamento COD  <?php echo $codequip; ?></h2>
            <div class="form-group  col-md-6">
            </div>
            <div class="actions panel_actions pull-right">
                 <a href='./listaequip.php' class='btn btn-primary'>Voltar</a>
                 <i class="box_toggle fa fa-chevron-down"></i>
                 <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                 <i class="box_close fa fa-times"></i>
            </div>
     </header>
    <form class="form-horizontal" method="POST" id="sdev" action="seditaconf.php">
    <fieldset>
            <div id="MsgSucesso" class="alert alert-success" style="text-align:center; display:none;"
            role="alert">Solicitacao feita com sucesso!</div>
            <div id="MsgErro" class="alert alert-danger" style="text-align:center; display:none;"
            role="alert">Erro ao realizar a solicitacao!</div>
            <!-- CAMPOS OCULTOS PARA INSERÇÃO DE DADOS-->
            <input id="cod" name="codequip" type="text" value="<?php echo $codequip;?>" hidden>
            <input id="unidade_usuario" name="unidade_usuario" type="text" value="<?php echo $tbcmei_nome;?>" hidden>
            <input id="nomeunidade" name="nomeunidade" type="text" value="<?php echo $nomeunidade;?>" hidden>
            <input id="unidade_id" name="unidade_id" type="text" value="<?php echo $unidade_id;?>" hidden>
            <!-- FIM DOS CAMPOS CULTOS PARA INSERÇÃO DE DADOS-->
            <br/>
            <div class="form-group">
            <label class="col-md-4 control-label" for="objeto">Unidade:</label>
            <div class="col-md-4">
            <input id="objeto" name="nsolicitante" id="nsolicitante" type="text" value = "<?php echo $ln['tbcmei_nome'];?>"
            placeholder="Nome do solicitante" class="form-control input-md"required disabled>
            </div>
                  </div>
                     <!-- Text input-->
                     <div class="form-group" id="justificativa">
                            <label class="col-md-4 control-label" for="justificativa">Processador/Modelo:</label>
                            <div class="col-md-4">
                            <textarea id="prob" name="modelprocessador" style="resize:none"
                            rows="3" placeholder="PROBLEMA" class="form-control input-md">
                            <?php echo $ln['tbequi_mod'];?>
                        </textarea>
                            </div>
                        </div>
                <!-- Text input-->
                <div class="form-group" id="justificativa">
                            <label class="col-md-4 control-label" for="justificativa">Desc placa/Modelo:</label>
                            <div class="col-md-4">
                            <textarea id="prob" name="descplaca" style="resize:none"
                            rows="3" placeholder="PROBLEMA" class="form-control input-md">
                            <?php echo $ln['tbequi_modplaca'];?>
                        </textarea>
                            </div>
                        </div>
                     <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="telefone">Monitor: </label>
              <div class="col-md-4">
                   <input id="objeto" name="monitor" id="objeto" type="text" value = "<?php echo $ln['tbequip_monitor'];?>"
                    placeholder="Telefone do solicitante" class="form-control input-md"required> 
               </div>
                    </div>
                    <!-- Text input-->
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="telefone">Memória: </label>
                    <div class="col-md-4">
                   <input id="objeto" name="memoria" id="objeto" type="text" value = "<?php echo $ln['tbequi_memoria'];?>"
                    placeholder="Telefone do solicitante" class="form-control input-md"required> 
                    </div>
                    </div>
                          <!-- Text input-->
                          <div class="form-group">
                    <label class="col-md-4 control-label" for="telefone">Tipo de memória: </label>
                    <div class="col-md-4">
                   <input id="objeto" name="modmemoria" id="objeto" type="text" value = "<?php echo $ln['tbequi_modelomemoria'];?>"
                    placeholder="Telefone do solicitante" class="form-control input-md"required > 
                    </div>
                    </div>
                        <!-- Text input-->
                          <div class="form-group">
                    <label class="col-md-4 control-label" for="telefone">Espaço em disco: </label>
                    <div class="col-md-4">
                   <input id="objeto" name="armazenamento" id="objeto" type="text" value = "<?php echo $ln['tbequi_armazenamento'];?>"
                    placeholder="Telefone do solicitante" class="form-control input-md"required > 
                    </div>
                    </div>
                          <!-- Text input-->
                          <div class="form-group">
                    <label class="col-md-4 control-label" for="telefone">Tipo de disco: </label>
                    <div class="col-md-4">
                   <input id="objeto" name="tparmazenamento" id="objeto" type="text" value = "<?php echo $ln['tbequi_tparmazenamento'];?>"
                    placeholder="Telefone do solicitante" class="form-control input-md"required > 
                    </div>
                    </div>
                          <!-- Text input-->
                          <div class="form-group">
                    <label class="col-md-4 control-label" for="telefone">Estado teclado: </label>
                    <div class="col-md-4">
                   <input id="objeto" name="teclado" id="objeto" type="text" value = "<?php echo $ln['tbequi_teclado'];?>"
                    placeholder="Telefone do solicitante" class="form-control input-md"required> 
                    </div>
                    </div>
                     <!-- Text input-->
                          <div class="form-group">
                    <label class="col-md-4 control-label" for="telefone">Estado mouse: </label>
                    <div class="col-md-4">
                   <input id="objeto" name="mouse" id="objeto" type="text" value = "<?php echo $ln['tbequi_mouse'];?>"
                    placeholder="Telefone do solicitante" class="form-control input-md"required > 
                    </div>
                    </div>
                    <!-- Text input-->
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="telefone">Estado filtro: </label>
                    <div class="col-md-4">
                   <input id="objeto" name="filtrodelinha" id="objeto" type="text" value = "<?php echo $ln['tbequi_filtrodelinha'];?>"
                    placeholder="Telefone do solicitante" class="form-control input-md"required> 
                    </div>
                    </div>
                          <!-- Text input-->
                    <!-- Text input-->
                     <!-- Text input-->
                    
                    </div>
                    </div>
                          <!-- Text input-->
                          <!-- Button -->
                              <div class="form-group">
                              <div align="center"><input type="submit" value="ENVIAR CADASTRO" name="salvar" class="btn btn-primary" /></div>
                         </div>
                        </div>
                        </fieldset>
                        </form>
                       <?php
                    }
                 ?>
    </section> 
    </section>   
    </div>
    </body>

    </html>

    