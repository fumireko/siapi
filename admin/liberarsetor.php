<?php
    include "../validar_session.php";
    include "../Config/config_sistema.php";  
    if (!isset($_SESSION)){
    session_start();
}
$tbcmei_nome = $_SESSION['tbcmei_nome'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-BR" lang="pt-BR" ng-app="App">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <meta name="author" content="Admin" />
        <title>SEMTI - Sistema de Gestao T.I</title>
         <script>
            function buscar_cidades(){
            var estado = $('#estado').val();
            if(estado){
                var url = 'ajax_buscar_cidades.php?estado='+estado;
                $.get(url, function(dataReturn) {
                $('#load_cidades').html(dataReturn);
            });
       }
    }
    </script>
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
            <h2 class="title pull-left">Atender direto</h2>
            <div class="form-group  col-md-6">
            </div>
            <div class="actions panel_actions pull-right">
                 <a href='./atenderdireto.php' class='btn btn-primary'>Novo</a>
                 <a href='./atenderdireto.php' class='btn btn-primary'>Novo</a>
                 <i class="box_toggle fa fa-chevron-down"></i>
                 <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                 <i class="box_close fa fa-times"></i>
            </div>
     </header>

    <form class="form-horizontal" method="POST" id="sliberasetor" action="sliberasetor.php">
    <fieldset>
            <div id="MsgSucesso" class="alert alert-success" style="text-align:center; display:none;"
            role="alert">Solicitacao feita com sucesso!</div>
            <div id="MsgErro" class="alert alert-danger" style="text-align:center; display:none;"
            role="alert">Erro ao realizar a solicitacao!</div>
            <!-- Text input-->
            <input id="unidade_usuario" name="unidade_usuario" type="text" value="<?php echo $tbcmei_nome;?>" hidden>
            <!-- Text input-->
            <br/>
            <div class="form-group">
          
            <div class="col-md-4">
           
            </div>
                  </div>
                     <!-- Text input-->
                   <div class="form-group">
                   
                   <div class="col-md-4">
                  
                   
               </div>
            </div>
                <!-- Text input-->
            <div class="form-group">
              
              <div class="col-md-4">
                   
               </div>
                    </div>
                       <!-- Text input-->
                     <div class="form-group">
                    <label class="col-md-4 control-label" for="email">Secretaria:</label>
                    <div class="col-md-4">
                    <?php include('conexao.php'); 
					   $sql = "SELECT * FROM tbsecretaria ORDER BY sec_nome";
					   $res = mysql_query($sql, $conexao);
					   $num = mysql_num_rows($res);
					   for ($i = 0; $i < $num; $i++) {
					   $dados = mysql_fetch_array($res);
					   $arrEstados[$dados['sec_id']] = $dados['sec_nome'];
					  }
					?>            
                    <form>
                        <select name="estado" id="estado" class="form-control m-bot15"  onchange="buscar_cidades()">
        			    	<option value="">Selecione...</option>
        				    <?php foreach ($arrEstados as $value => $name) {
         				 echo "<option value='{$value}'>{$name}</option>";
       					 }?>
      					</select>
                        </div>
                        </div>
                        <!-- Text input-->
                        <div class="form-group">
                        <label class="col-md-4 control-label" for="email">Departamentos:</label>
                        <div class="col-md-4">
                            <select name="cidade" id="load_cidades" class="form-control m-bot15">
          			    	<option value="">Selecione o departamento</option>
        	    			</select>
                        </div>
                        </div>
                         <!-- Text input-->
                                                                     
                         <!-- Text input Fim-->
                         <!-- Button -->
                              <div class="form-group">
                              <div align="center"><input type="submit" value="ENVIAR CADASTRO" name="salvar" class="btn btn-primary" /></div>
                         </div>
                                    </div>
                                </fieldset>
                            </form>
    </section> 
    </section>   
    </div>
    </body>

    </html>

    
