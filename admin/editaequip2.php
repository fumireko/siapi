<?php
include "../validar_session.php";  
include "../Config/config_sistema.php";
include "bco_fun.php";
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
tbcmei.tbcmei_nome,
tbequip.tbequi_nome,
tbequip.ctrl_ti,
tbequip.tbequip_lacre,
tbequip.tbequip_vid_saidas,
tbequip.tbequip_vid_uso,
tbequip.tbequip_fonte,
tbequip.tbequip_util_num,
tbequip.tbequip_util_nomes,
tbequip.tbequip_resp,
tbequip.tbequip_monitor_obs,
tbequip.tbequip_monitor_num,
tbequip.tbequi_arm_sec,
tbequip.tbequi_arm_sectam,
tbequip.tbequi_slots,
tbequip.tbequi_slots_uso,
tbequip.tbequi_app,
tbequip.tbequi_app_out,
tbequip.tbequi_obs,
tbequip.tbequip_so,
tbequip.tbequip_sec,
tbequip.tbequi_tipo
FROM tbequip INNER JOIN tbcmei 
ON tbequip.tbequi_tbcmei_id = tbcmei.tbcmei_id
where tbequip.tbequip_id = '$tbequip_id' ORDER BY tbequip_id";
//$qr = mysql_query($sql) or die(mysql_error());
$qr = mysqli_query($conn, $sql) ;//or die(mysqli_error());
//$qr = mysqli_query($conn,$sql) or die (mysqli_error("erro "));
//$ln = mysqli_fetch_assoc($qr);    ///while( $ln = mysqli_fetch_assoc($qr) )
while ($ln = mysqli_fetch_assoc($qr))
{
    $unidade_id = $ln['tbcmei_id'];
    $nomeunidade = $ln['tbcmei_nome'];
    $codequip = $ln['tbequip_id'];
    $ctrl_ti = $ln['ctrl_ti'];
    $dtlan = $ln['tbequi_datalanc'];
    $datalanc = implode("/",array_reverse(explode("-",$dtlan)));
    $codigos = "Cod Cmei : " . $unidade_id . " Cod Sec : " . $ln['tbequip_sec'];
    $codificacao = "cti " . $ctrl_ti . " -t" . $codequip . " -loc- " . $unidade_id . " -sec- " . $ln['tbequip_sec'];

//}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-BR" lang="pt-BR" ng-app="App">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <meta name="author" content="Admin" />
        <title>SMTI - Sistema de Gestao T.I</title>
         
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
            <h2 class="title pull-left">Alterando DADOS do equipamento CTI  <?php echo $ctrl_ti; ?></h2>    <i>   <?php echo " < ".$codificacao." >"; ?> </i>
            <div class="form-group  col-md-6">
            </div>
            <div class="actions panel_actions pull-right">
                 <a href='./listaequip.php' class='btn btn-primary'>Voltar</a>
               
            </div>
     </header>
    <form class="form-horizontal" method="POST" id="sdev" action="alteraequip.php">
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
         <input id="ctrl_ti" name="ctrl_ti" type="text" value="<?php echo $ctrl_ti; ?>" hidden>
            <!-- FIM DOS CAMPOS CULTOS PARA INSERÇÃO DE DADOS-->
            <br/>
            <div class="form-group">
            <label class="col-md-4 control-label" for="objeto">Unidade:</label>
            <div class="col-md-4">
            <input  name="nsolicitante" id="nsolicitante" type="text" value = "<?php echo $ln['tbcmei_nome'];?>"
            placeholder="Nome do solicitante" class="form-control input-md"required disabled>
            </div>
                  </div>
        <center> <i>    <?php 
                        if (nomedoresponsavel($conn, $unidade_id)<>""){
                           $prov_resp = "Sugestao :  ".nomedoresponsavel($conn, $unidade_id);
                        }
                        else
                            $prov_resp = "Perguntar Nome do Responsável " ;
                         ?>     
                         </i></center>     
                    <!-- Text input-->
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="telefone">Responsavel Equipamento.: </label>
                    <div class="col-md-4">
                   <input  name="responsavel" id="responsavel" type="text" title="Digite o Nome do Responsavel"  value = "<?php echo $ln['tbequip_resp']; ?>"
                    placeholder="<?php echo $prov_resp; ?>"   class="form-control input-md" > 
                    </div>
                    </div>              
        
    
                    <!-- Text input-->
                     <div class="form-group" id="justificativa">
                            <label class="col-md-4 control-label" for="justificativa">Processador/Modelo:</label>
                            <div class="col-md-4">
                              <input  name="modelprocessador" id="modelprocessador" type="text"   value ="<?php echo preg_replace('/\s\s+/', ' ', $ln['tbequi_mod']);?>" class="form-control input-md">
                             </div>
                        </div>
                <!-- Text input-->
                <div class="form-group" id="justificativa">
                            <label class="col-md-4 control-label" for="justificativa">Desc placa/Modelo:</label>
                            <div class="col-md-4">
                           <input  name="descplaca" id="descplaca" type="text"   value = "<?php echo $ln['tbequi_modplaca']; ?>" class="form-control input-md">
                                
                            </div>
                        </div>

    <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="telefone">Tipo Equip.: </label>
              <div class="col-md-4">
                   <input  name="tipo_equip" id="tipo_equip" type="text" value = "<?php echo $ln['tbequi_tipo']; ?>"
                    placeholder="Desktop , Notebook , Tablet , Servidor ou Outros" class="form-control input-md" readonly > 
               </div>
                    </div>

        <!-- Text input-->
                          <div class="form-group">
                    <label class="col-md-4 control-label" for="telefone">Nome do Equipamento: </label>
                    <div class="col-md-4">
                   <input  name="nome_equip"  type="text" value = "<?php echo $ln['tbequi_nome']; ?>"
                     class="form-control input-md" > 
                    </div>
                    </div
             
           <!-- Text input-->
                          <div class="form-group">
                    <label class="col-md-4 control-label" for="telefone">Plaqueta: </label>
                    <div class="col-md-4">
                   <input  name="plaqueta"  type="text" value = "<?php echo $ln['tbequip_plaqueta']; ?>"
                     class="form-control input-md" > 
                    </div>
                    </div

                     <!-- Text input-->
                          <div class="form-group">
                    <label class="col-md-4 control-label" for="telefone">Lacre T.I. : </label>
                    <div class="col-md-4">
                   <input  name="lacre"  type="text" value = "<?php echo $ln['tbequip_lacre']; ?>"
                     class="form-control input-md" > 
                    </div>
                    </div


                     <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="telefone">Monitor: </label>
              <div class="col-md-4">
                   <input  name="monitor"  type="text" value = "<?php echo $ln['tbequip_monitor']; ?>"
                    placeholder="Monitor" class="form-control input-md"> 
               </div>
                    </div>
        <center> <i>    <?php echo mostra_monitores($conn, $tbequip_id); ?>  </i></center>     

    
          <?php
          if (($ln['tbequip_monitor'] == "UNICO") || ($ln['tbequip_monitor'] == "unico") || ($ln['tbequip_monitor'] == "único")|| ($ln['tbequip_monitor'] == "Unico")|| ($ln['tbequip_monitor'] == "") ) {
              $qtd_mon = "1";
          } else
              $qtd_mon = $ln['tbequip_monitor_num'];
          ?>     



    <!-- Text input-->
            <div class="form-group">
         <a href="vincula_monitor.php?id=<?php echo $unidade_id ?>&CTI=<?php echo $ctrl_ti ?> &ID_PC=<?php echo $codequip ?>" title="Associar Monitor ao PC "  <label class="col-md-4 control-label" for="telefone">Monitor Nº: </label></a>
                  <div class="col-md-4">
                   <input  name="monitor_num" id="monitor_num"   type="text" value = "<?php echo $qtd_mon  ?>"
                    class="form-control input-md" > 
               </div>
                    </div>
              

    
    <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="telefone">Monitor Obs. : </label>
              <div class="col-md-4">
                   <input  name="monitor_obs"  id="monitor_obs"  type="text" value = "<?php echo $ln['tbequip_monitor_obs'] ; ?>"
                    placeholder="Monitor" class="form-control input-md"> 
               </div>
                    </div>
         
        <!-- Text input-->
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="telefone">Saidas de Video : </label>
                    <div class="col-md-4">
                   <input  name="vid_saidas" id="vid_saidas"  type="text" value = "<?php echo $ln['tbequip_vid_saidas']; ?>"
                     class="form-control input-md" > 
                    </div>
                    </div>
    <!-- Text input-->
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="telefone">Videos em uso : </label>
                    <div class="col-md-4">
                   <input  name="vid_uso" id="vid_uso"  type="text" value = "<?php echo $ln['tbequip_vid_uso']; ?>"
                     class="form-control input-md" > 
                    </div>
                    </div>
    
     
    <!-- Text input-->
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="telefone">Memória: </label>
                    <div class="col-md-4">
                   <input  name="memoria"  type="text" value = "<?php echo $ln['tbequi_memoria'];?>"
                     class="form-control input-md" > 
                    </div>
                    </div>
                          <!-- Text input-->
                          <div class="form-group">
                    <label class="col-md-4 control-label" for="telefone">Tipo de memória: </label>
                    <div class="col-md-4">
                   <input  name="modmemoria"  type="text" value = "<?php echo $ln['tbequi_modelomemoria'];?>"
                     class="form-control input-md" > 
                    </div>
                    </div>
                        <!-- Text input-->
                          <div class="form-group">
                    <label class="col-md-4 control-label" for="telefone">Espaço em disco: </label>
                    <div class="col-md-4">
                   <input  name="armazenamento"  type="text" value = "<?php echo $ln['tbequi_armazenamento'];?>"
                     class="form-control input-md" > 
                    </div>
                    </div>
                          <!-- Text input-->
                          <div class="form-group">
                    <label class="col-md-4 control-label" for="telefone">Tipo de disco: </label>
                    <div class="col-md-4">
                   <input  name="tparmazenamento"  type="text" value = "<?php echo $ln['tbequi_tparmazenamento'];?>"
                     class="form-control input-md" > 
                    </div>
                    </div>
               
        
              
                    <!-- Text input-->
                          <div class="form-group">
                    <label class="col-md-4 control-label" for="telefone">Armazenamento Secundario: </label>
                    <div class="col-md-4">
                   <input  name="arm_sec"  type="text" value = "<?php echo $ln['tbequi_arm_sec']; ?>"
                     class="form-control input-md" > 
                    </div>
                    </div
                    <!-- Text input-->
                          <div class="form-group">
                    <label class="col-md-4 control-label" for="telefone">Armazenamento Secundario Tamanho: </label>
                    <div class="col-md-4">
                   <input  name="arm_sectam"  type="text" value = "<?php echo $ln['tbequi_arm_sectam']; ?>"
                     class="form-control input-md" > 
                    </div>
                    </div
                     <!-- Text input-->
                          <div class="form-group">
                    <label class="col-md-4 control-label" for="telefone">Slots Quantidade: </label>
                    <div class="col-md-4">
                   <input  name="slots"  type="text" value = "<?php echo $ln['tbequi_slots']; ?>"
                     class="form-control input-md" > 
                    </div>
                    </div
                    <!-- Text input-->
                          <div class="form-group">
                    <label class="col-md-4 control-label" for="telefone">Slots em uso: </label>
                    <div class="col-md-4">
                   <input  name="slots_uso"  type="text" value = "<?php echo $ln['tbequi_slots_uso']; ?>"
                     class="form-control input-md" > 
                    </div>
                    </div
   
                     <!-- Text input-->
                          <div class="form-group">
                    <label class="col-md-4 control-label" for="telefone">Fonte.: </label>
                    <div class="col-md-4">
                   <input  name="fonte" id="fonte"  type="text" value = "<?php echo $ln['tbequip_fonte']; ?>"
                     class="form-control input-md" > 
                    </div>
                    </div



 <!-- Text input-->
                          <div class="form-group">
                    <label class="col-md-4 control-label" for="telefone">Sistema Operac.: </label>
                    <div class="col-md-4">
                   <input  name="so"  type="text" value = "<?php echo $ln['tbequip_so']; ?>"
                     class="form-control input-md" > 
                    </div>
                    </div


                    <!-- Text input-->
                          <div class="form-group">
                    <label class="col-md-4 control-label" for="telefone">Aplicativos: </label>
                    <div class="col-md-4">
                   <input  name="app"  type="text" value = "<?php echo $ln['tbequi_app']; ?>"
                     class="form-control input-md" > 
                    </div>
                    </div
                     <!-- Text input-->
                          <div class="form-group">
                    <label class="col-md-4 control-label" for="telefone">Aplicativos Outros: </label>
                    <div class="col-md-4">
                   <input  name="app_out"  type="text" value = "<?php echo $ln['tbequi_app_out']; ?>"
                     class="form-control input-md" > 
                    </div>
                    </div

                    <!-- Text input-->
                          <div class="form-group">
                    <label class="col-md-4 control-label" for="telefone">Obs: </label>
                    <div class="col-md-4">
                   <input  name="obs" id="obs" type="text" value = "<?php echo $ln['tbequi_obs']; ?>"
                     class="form-control input-md" > 
                    </div>
                    </div
    
    
    <!-- Text input-->
                          <div class="form-group">
                    <label class="col-md-4 control-label" for="telefone">Estado teclado: </label>
                    <div class="col-md-4">
                   <input  name="teclado"  type="text" value = "<?php echo $ln['tbequi_teclado'];?>"
                    class="form-control input-md" > 
                    </div>
                    </div>
                     <!-- Text input-->
                          <div class="form-group">
                    <label class="col-md-4 control-label" for="telefone">Estado mouse: </label>
                    <div class="col-md-4">
                   <input  name="mouse"  type="text" value = "<?php echo $ln['tbequi_mouse'];?>"
                    class="form-control input-md" > 
                    </div>
                    </div>
                    <!-- Text input-->
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="telefone">Estado filtro: </label>
                    <div class="col-md-4">
                   <input  name="filtrodelinha"  type="text" value = "<?php echo $ln['tbequi_filtrodelinha'];?>"
                     class="form-control input-md" > 
                    </div>
                    </div>
                          
                    <!-- Text input-->
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="telefone">Nº de Utilizadores do Equip.: </label>
                    <div class="col-md-4">
                   <input  name="util_num" id="util_num"  type="text" value = "<?php echo $ln['tbequip_util_num']; ?>"
                     class="form-control input-md" > 
                    </div>
                    </div>
                    <!-- Text input-->
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="telefone">Utilizadores Nome.: </label>
                    <div class="col-md-4">
                   <textarea id="util_nomes" name="util_nomes" style="resize:none"
                            rows="3" placeholder="Nomes dos utilizadores" class="form-control input-md"  >
                            <?php echo $ln['tbequip_util_nomes']; ?>
                        </textarea>

                    </div>
                    </div>


    <!-- Text input-->
                    <!-- Text input-->
              
                          <!-- Text input-->
                          <!-- Button -->
                              <div class="form-group">
                              <div align="center"><input type="submit" value="ALTERAR DADOS" name="salvar" class="btn btn-primary" /></div>
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

    