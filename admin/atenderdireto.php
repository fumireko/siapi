<?php
include "../validar_session.php";  
if (!isset($_SESSION)){
    session_start();
}
$tbcmei_nome = $_SESSION['tbcmei_nome'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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

    <form class="form-horizontal" method="POST" id="sdireto" action="sdireto.php">
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
            <label class="col-md-4 control-label" for="objeto">Nome:</label>
            <div class="col-md-4">
            <input id="objeto" name="nsolicitante" id="nsolicitante" type="text"
            placeholder="Nome do solicitante" class="form-control input-md"required>
            </div>
                  </div>
                     <!-- Text input-->
                   <div class="form-group">
                   <label class="col-md-4 control-label" for="email">Email:</label>
                   <div class="col-md-4">
                   <input id="email" name="email" id="email" type="text" 
                   placeholder="Email do solicitante" class="form-control input-md"required>
               </div>
            </div>
                <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="telefone">Telefone: </label>
              <div class="col-md-4">
                   <input id="objeto" name="telefone" id="objeto" type="text"
                    placeholder="Telefone do solicitante" class="form-control input-md"required>
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
                        <div class="form-group">
                        <label class="col-md-4 control-label" for="email">Região:</label>
                        <div class="col-md-4">
                         <select class="form-control m-bot15" name="regiao">
                                            <option></option>
                                            <option>Sede</option>
                                            <option>Regional Maracan&atilde;</option>
                                            <option>Regional Osasco</option>
                                        </select>
                        </div>
                        </div>
                        
                        <!-- Text input-->
                        <div class="form-group">
                        <label class="col-md-4 control-label" for="tipo">Tipo:</label>
                        <div class="col-md-4">
                         <select class="form-control m-bot15" name="tpservico">
                            <option></option>
                            <option>Suporte T&eacute;cnico</option>
                            <option>Telecom</option>
                            <option>IPM</option>
                        </select>
                        </div>
                        </div>
                         <!-- Text input-->
                            <div class="form-group">
                            <label class="col-md-4 control-label" for="email">Data inicio:</label>
                            <div class="col-md-4">
                            <input id="email" name="dtinicio" id="dtinicio" type="date"
                            placeholder="Email do solicitante" class="form-control input-md"required>
                        </div>
                        </div>
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="email">Data fim:</label>
                            <div class="col-md-4">
                            <input id="email" name="dtfim" id="dtfim" type="date"
                            placeholder="Email do solicitante" class="form-control input-md"required>
                        </div>
                        </div>
                         <!-- Text input-->
                         <div class="form-group">
                            <label class="col-md-4 control-label" for="email">Hora inicio:</label>
                            <div class="col-md-4">
                            <input id="email" name="hrainicio" id="hrainicio" type="time"
                            placeholder="Email do solicitante" class="form-control input-md"required>
                        </div>
                        </div>
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="email">Hora fim:</label>
                            <div class="col-md-4">
                            <input id="email" name="hrafim" id="hrafim" type="time"
                            placeholder="Email do solicitante" class="form-control input-md"required>
                        </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group" id="justificativa">
                            <label class="col-md-4 control-label" for="justificativa">Problema:</label>
                            <div class="col-md-4">
                            <textarea id="prob" name="prob" style="resize:none"
                            rows="3" placeholder="PROBLEMA" class="form-control input-md"></textarea>
                            </div>
                        </div>
                        <!-- Text input-->
                        <div class="form-group" id="jusStificativa">
                            <label class="col-md-4 control-label" for="justificativa">Solução:</label>
                            <div class="col-md-4">
                            <textarea id="solucao" name="solucao" style="resize:none"
                            rows="3" placeholder="SOLUÇÃO" class="form-control input-md"></textarea>
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
    </section> 
    </section>   
    </div>
    </body>

    </html>

    