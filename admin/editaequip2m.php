<?php
//include "../validar_session.php";  
include "../Config/config_sistema.php";
include "conn2.php";

include "bco_fun.php";
if (!isset($_SESSION)){
    session_start();
}
$tbequip_id = $_GET['tbequip_id'];

$sql = "SELECT * from tb_monitores where id = '".$tbequip_id."' ORDER BY id";
//$qr = mysql_query($sql) or die(mysql_error());
$qr = mysqli_query($conn, $sql) ;//or die(mysqli_error());
//$qr = mysqli_query($conn,$sql) or die (mysqli_error("erro "));
//$ln = mysqli_fetch_assoc($qr);    ///while( $ln = mysqli_fetch_assoc($qr) )
 $total = mysqli_num_rows($qr);
if ($total == 0) {
    echo "Registro não localizado  " . $tbequip_id;
} else {

    while ($ln = mysqli_fetch_assoc($qr)) {
        // $unidade_id = $ln['tbcmei_id'];
        // $nomeunidade = $ln['tbcmei_nome'];
        $codequip = $ln['id'];
        // $dtlan = $ln['tbequi_datalanc'];
        //$datalanc = implode("/",array_reverse(explode("-",$dtlan)));

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
            <h2 class="title pull-left">Alterando DADOS do equipamento Controle T.I   <?php echo $ln['ctrl_ti'] ?> </h2> <i> COD  <?php echo $codequip; ?> </i> 
            <div class="form-group  col-md-6">
            </div>
            <div class="actions panel_actions pull-right">
                 <a href='./listaequip.php' class='btn btn-primary'>Voltar</a>
                 <i class="box_toggle fa fa-chevron-down"></i>
                 <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                 <i class="box_close fa fa-times"></i>
            </div>
     </header>
    <form class="form-horizontal" method="POST" id="sdev" action="alteraequipm.php">
    <fieldset>
            <div id="MsgSucesso" class="alert alert-success" style="text-align:center; display:none;"
            role="alert">Solicitacao feita com sucesso!</div>
            <div id="MsgErro" class="alert alert-danger" style="text-align:center; display:none;"
            role="alert">Erro ao realizar a solicitacao!</div>
        
       


        <!-- CAMPOS OCULTOS PARA INSERÇÃO DE DADOS-->
            <input id="cod" name="codequip" type="text" value="<?php echo $codequip; ?>" hidden>
            <input id="unidade_usuario" name="unidade_usuario" type="text" value="<?php echo $tbcmei_nome; ?>" hidden>
            <input id="nomeunidade" name="nomeunidade" type="text" value="<?php echo $nomeunidade; ?>" hidden>
            <input id="unidade_id" name="unidade_id" type="text" value="<?php echo $unidade_id; ?>" hidden>
            <input id="ctrl_ti" name="ctrl_ti" type="text" value="<?php echo $ln['ctrl_ti']; ?>" hidden>
            <!-- FIM DOS CAMPOS CULTOS PARA INSERÇÃO DE DADOS-->
           
        <br/>
          <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="telefone">Controle Interno: </label>
              <div class="col-md-4">
                   <input  name="tipo_equip" id="tipo_equip" type="text" value = "<?php echo " Local :" . $ln['local_id'] . "  Sec: " . $ln['sec_id'] . "  CTI :  " . $ln['ctrl_ti'] . " tabela :  " . $ln['id']; ?>"
                    placeholder="Desktop , Notebook , Tablet , Servidor ou Outros" class="form-control input-md"  readonly> 
               </div>
                    </div>
    
        
        
        <div class="form-group">
            <label class="col-md-4 control-label" for="objeto">Unidade:</label>
            <div class="col-md-4">
            <input  name="nsolicitante" id="nsolicitante" type="text" value = "<?php echo nomedolocal($conn, $ln['local_id']); ?>"
            placeholder="Nome do solicitante" class="form-control input-md"required disabled>
            </div>
                  </div>
        <center> <i>   
                   </i></center>     
                    <!-- Text input-->
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="telefone">Vinculo ao Computador: </label>
                    <div class="col-md-4">
                   <input  name="id_doequip" id="id_doequip" type="password" title="Digite o Nome do Responsavel" readonly  value = "<?php echo $ln['id_equip']; ?>"  class="form-control input-md" > <?php echo  "CTI : ".  ret_cti_tbequip($conn, $ln['id_equip']);   ?>
                    </div>
                    </div>              
               
    <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="telefone">Tipo Equip.: </label>
              <div class="col-md-4">
                   <input  name="mon_tipo" id="mon_tipo" type="text" value = "<?php echo $ln['mon_tipo']; ?>"
                    placeholder="Monitor " class="form-control input-md" > 
               </div>
                    </div>

        <!-- Text input-->
                          <div class="form-group">
                    <label class="col-md-4 control-label" for="telefone">Marca: </label>
                    <div class="col-md-4">
                   <input  name="mon_marca"  type="text" value = "<?php echo $ln['mon_marca']; ?>"
                     class="form-control input-md" > 
                    </div>
                    </div
             
           <!-- Text input-->
                          <div class="form-group">
                    <label class="col-md-4 control-label" for="telefone">Plaqueta: </label>
                    <div class="col-md-4">
                   <input  name="mon_plaqueta"  type="text" value = "<?php echo $ln['mon_plaqueta']; ?>"
                     class="form-control input-md" > 
                    </div>
                    </div



                     <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="telefone">Tamanho: </label>
              <div class="col-md-4">
                   <input  name="mon_tam"  type="text" value = "<?php echo $ln['mon_tam']; ?>"
                    placeholder="Monitor" class="form-control input-md"> 
               </div>
                    </div>
              

    
    <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="telefone">Monitor Saida. : </label>
              <div class="col-md-4">
                   <input  name="mon_saida"  id="mon_saida"  type="text" value = "<?php echo $ln['mon_saida']; ?>"
                     placeholder="VGA , HDMI , DVI , DISPLAY PORT"   class="form-control input-md"> 
               </div>
                    </div>
         
    <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="telefone">Obs. : </label>
              <div class="col-md-4">
                   <input  name="mon_obs"  id="mon_obs"  type="text" value = "<?php echo $ln['obs']; ?>"
                     placeholder="Observacoes Gerais de Monitor"   class="form-control input-md"> 
               </div>
                    </div>
   
        

                
   
                    </div>
                    </div>

                  <!-- Button -->
                              <div class="form-group">
                              <div align="center"><input type="submit" value="ALTERAR DADOS" name="salvar" class="btn btn-primary" /></div>
                         </div>
                        </div>
                        </fieldset>
                        </form>
                       <?php

    }
}

                 ?>
    </section> 
    </section>   
    </div>
    </body>

    </html>

    