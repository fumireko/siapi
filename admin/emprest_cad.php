<?php
//include "../validar_session.php";  
//include "../Config/config_sistema.php";



include "bco_fun.php";
//$qr = mysql_query($sql) or die(mysql_error());

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
     <script type="text/javascript" src="ajaxbs_local2_emp.js"> </script>
      <script>
          $(document).on('Change', "[name='txtnome']", function () {
   getDados();
          });

          $(document).ready(function(){
               getDados();
               };



</script>
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
            <h2 class="title pull-left">Cadastro de Emprestimo de equipamento  </h2><br />
     
        <div class="form-group  col-md-6">
            </div>
            <div class="actions panel_actions pull-right">
                 <a href='./emprest_consulta.php' class='btn btn-primary'>Consultar Emprestimos </a>
              
                 <i class="box_toggle fa fa-chevron-down"></i>
                 <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                 <i class="box_close fa fa-times"></i>
            </div>
     </header>
    <form class="form-horizontal" method="POST" id="sdev" action="emprest_salva.php">
    <fieldset>
            <div id="MsgSucesso" class="alert alert-success" style="text-align:center; display:none;"
            role="alert">Solicitacao feita com sucesso!</div>
            <div id="MsgErro" class="alert alert-danger" style="text-align:center; display:none;"
            role="alert">Erro ao realizar a solicitacao!</div>
            <!-- CAMPOS OCULTOS PARA INSERÇÃO DE DADOS-->
                      <input id="unidade_usuario" name="unidade_usuario" type="text" value="<?php echo $tbcmei_nome;?>" hidden>
          
            <!-- FIM DOS CAMPOS CULTOS PARA INSERÇÃO DE DADOS-->
            <br/>
         
        
               
        <!-- Text input-->
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="telefone">Pesquisar Local : </label>
                    <div class="col-md-4">
                             <div id="Pesquisar">
                        <input type="text" name="txtnome" id="txtnome" placeholder="Digite o nome do local e Escolha abaixo " title="Digite o nome do local e SELECIONE abaixo " onchange="getDados();"   class="form-control input-md" >
                      
                        </div>
                     
                    </div>
                    </div>

    <!-- Text input-->
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="telefone"> </label>
                    <div class="col-md-4">
                    <div id="Resultado"></div>
            <hr>
                   
                    </div>
                    </div>
        



    <!-- Text input-->
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="telefone">Solicitado Por : </label>
                    <div class="col-md-4">
                   <input  name="solicitante" id="solicitante" type="text" title="Digite o Nome do Solicitante"  value = ""
                    placeholder="Nome de quem Solicitou o Emprestimo "   class="form-control input-md" > 
                    </div>
                    </div>              
        
    
                    <!-- Text input-->
                     <div class="form-group" id="justificativa">
                            <label class="col-md-4 control-label" for="justificativa">CTI do Equipamento(s):</label>
                            <div class="col-md-4">
                            <textarea id="ctrl_ti" name="ctrl_ti" style="resize:none"
                            rows="2" placeholder="" class="form-control input-md"  > 
                                                            </textarea>
                            </div>
                        </div>
    
    <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="telefone">Autorizado por: </label>
              <div class="col-md-4">
                   <input  name="autorizador" id="autorizador" type="text" value = ""
                    placeholder="Nome de quem autorizou o emprestimo" class="form-control input-md" > 
               </div>
                    </div>
    
    
    <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="telefone">Tipo Equip.: </label>
              <div class="col-md-4">
                   <input  name="tipo_equip" id="tipo_equip" type="text" value = ""
                    placeholder="Desktop , Notebook , Tablet , Servidor ou Outros" class="form-control input-md" > 
               </div>
                    </div>

        <!-- Text input-->
                          <div class="form-group">
                    <label class="col-md-4 control-label" for="telefone">Previsao de Retorno: </label>
                    <div class="col-md-4">
                   <input   name="retorno"  id="retorno" type="text" value = ""  placeholder="Data ou estimativa de retorno do(s) equipamento (s)" 
                     class="form-control input-md" > 
                    </div>
                    </div
             
          
    
       
                   
                          <!-- Text input-->
                          <!-- Button -->
                              <div class="form-group">
                              <div align="center"><input type="submit" value="REGISTRAR" name="salvar" class="btn btn-primary" /></div>
                         </div>
                        </div>
                        </fieldset>
                        </form>
                       <?php
                  //  }
                 ?>
    </section> 
    </section>   
    </div>
    </body>

    </html>

    