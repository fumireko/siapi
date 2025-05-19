<?php
include "../Config/config_sistema.php";
include('conexao.php');
include('upload.php');
#mysql_query("SET NAMES 'utf8'");
#mysql_query('SET character_set_connection=utf8');
#mysql_query('SET character_set_client=utf8');
#mysql_query('SET character_set_results=utf8');
###############################################
#                                             #
# DESENVOLVIDO POR: HELENILDO DE LIMA ARRAIS  #
# E-Mail: helenildo_ti@hotmail.com            #
#                                             #
###############################################
if (file_exists('init.php'))
{
    require_once 'init.php';
}
else
{
    exit('Nao foi possivel encontrar o arquivo de inicializao');
}
?>
<!DOCTYPE html>
<html class=" ">
    <head>
        <!-- 
         * @Package: Ultra Admin - Responsive Theme
         * @Subpackage: Bootstrap
         * @Version: 4.1
         * This file is part of Ultra Admin Theme.
        -->
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <meta charset="utf-8" />
        <title>ABRIR CHAMADO</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon" />    <!-- Favicon -->
        <link rel="apple-touch-icon-precomposed" href="assets/images/apple-touch-icon-57-precomposed.png">  <!-- For iPhone -->
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/apple-touch-icon-114-precomposed.png">    <!-- For iPhone 4 Retina display -->
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/apple-touch-icon-72-precomposed.png">    <!-- For iPad -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/apple-touch-icon-144-precomposed.png">    <!-- For iPad Retina display -->
        <!-- CORE CSS FRAMEWORK - START -->
        <link href="assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen"/>
        <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/fonts/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/animate.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" type="text/css"/>
        <!-- CORE CSS FRAMEWORK - END -->
        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 
       <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
       <script>
    function buscar_cidades()
    {
      var estado = $('#estado').val();
      if(estado){
        var url = 'ajax_buscar_cidades.php?estado='+estado;
        $.get(url, function(dataReturn) {
          $('#load_cidades').html(dataReturn);
        });
      }
    }
    function buscar_plaqueta(){
      var plaqueta = $('#plaqueta').val();
      if(estado){
        var url = 'ajax_buscar_plaqueta.php?plaqueta='+plaqueta;
        $.get(url, function(dataReturn)
         {
          $('#load_plaqueta').html(dataReturn);
        });
      }
    } 
    function buscar_servicos(){
      var servicos = $('#servicos').val();
      if(servicos){
        var url = 'ajax_buscar_servicos.php?servicos='+servicos;
        $.get(url, function(dataReturn)
         {
          $('#load_servicos').html(dataReturn);
        });
      }
    } 
  

   function exibir_ocultar(el)
 
   {
     var inputtpservico = document.getElementById('inputtpservico'); 
     var inputsuporteCpu = document.getElementById('suporteCpu');
     var inputsuporteApp = document.getElementById('suporteApp');

     if (el.value === 'Suporte Tecnico CPU')
      { 
        inputsuporteCpu.style.display = "block"; 
      }

    else 
        if (el.value === 'Instalação de aplicativos')
        { 
        inputsuporteApp.style.display = "block"; 
        }
        else
            {
             inputsuporteCpu.style.display = "none";   
            }
      }
 
    </script>
        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 
        <!-- CORE CSS TEMPLATE - START -->
        <link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css"/>
 
        <!-- CORE CSS TEMPLATE - END -->
    </head>
<form method="post" action="salvarchamado1.php" name="Frmchamado1" onSubmit="return(valida(this))">
                    <div class="col-lg-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Chamado T&eacute;cnico</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="content-body">
                                <div class="row">
                                    <div class="col-md-8 col-sm-9 col-xs-10">
                                        <div class="form-group">
                                            <label class="form-label" for="field-1">Nome do contato</label>
                                           <div class="controls">
                                                <input type="text" class="form-control" name="nsolicitante" id="field-1" required >

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="field-3">Seu E-mail</label>
                                            <br>
                                            <em> (Atrav&eacute;s deste e-mail voc&ecirc; receber&aacute; retorno referente ao seu chamado)</em>
                                                <div class="controls">
                                                <input type="text" class="form-control" id="field-3" name="email" >
                                            </div>
                                        </div>
                                        <form>
                                        <div class="form-group">
                                        <label class="form-label" for="field-7">Tipo:</label>
                                        
                                        <select class="form-control m-bot15" name="servicos" id="servicos" required onchange="buscar_servicos()">
                                       <option></option>
                                            <option value="Suporte Tecnico CPU">Suporte Tecnico CPU</option>
                                            <option value="Suporte Tecnico REDE/INTERNET">Suporte Tecnico REDE/INTERNET</option>
                                            <option value="Suporte Tecnico SITE">Suporte Tecnico SITE</option>
                                            <option value="E-MAIL">E-MAIL</option>
                                            <option value="TELEFONIA">TELEFONIA</option>
                                            <option value="IPM">IPM</option>
                                            <option value="OUTROS">OUTROS</option>
                                        </select>
                                        </div>
                                         <!-- CAMPOS PARA SUPORTE TECNICO   --> 
                                         
                                         <div class="form-group"id="load_servicos">
                                            <label class="form-label" for="field-3">Serviços</label>
                                            <br>
                                            <em> (Atrav&eacute;s deste e-mail voc&ecirc; receber&aacute; retorno referente ao seu chamado)</em>
                                             <input type="text" id="sub" class="form-control" name="sub">
											<div class="controls">
                                                
                                            </div>
                                        </div>
                                       
                                        
                                        <!-- FIM SUPORTE TECNICO --> 
                                        <!-- CAMPOS PARA ITENS DE APPS PARA INSTALAR --> 
                                        <div class="form-group" id="suporteApp"  style="display:none"> 
                                            <label class="form-label" for="field-1">Aplicativos</label>
                                           <div class="controls">
                                           <select class="form-control m-bot15" id="apps" name="apps" required>
                                            <option></option>
                                            <option value="Computador com barulho">Computador com barulho</option>
                                            <option value="AnyDesk">AnyDesk</option>
                                            <option value="Cartão sus">Cartão sus</option>
                                            <option value="Chrome">Chrome</option>
                                            <option value="Editores de texto/planilha (LibreOffice)">Editores de texto/planilha (LibreOffice)</option>
                                        </select>

                                            </div>
                                        </div>
                                        <!-- FIM ITENS DE APPS PARA INSTALAR --> 
                                            <div class="form-group">
                                            <label class="form-label" for="field-4">Telefone</label>
                                            <div class="controls">
                                                <input type="text" id="field-4" class="form-control" name="telefone" required>
                                            </div>
                                        </div>
                                        <?php include('conexao.php'); 
											   $sql = "SELECT * FROM tbsecretaria ORDER BY sec_nome";
											   $res = mysql_query($sql, $conexao);
											   $num = mysql_num_rows($res);
											   for ($i = 0; $i < $num; $i++) {
											   $dados = mysql_fetch_array($res);
											   $arrEstados[$dados['sec_id']] = $dados['sec_nome'];
											   }
											   ?>                   
    																						
                                               
      										<div class="form-group">
     										 <label class="form-label" for="field-5">Sua secretaria</label>
                                              <br>
                                              <em> (Neste campo você seleciona a secretaria na qual esta lotado)</em>
     										 <select name="estado" id="estado" class="form-control m-bot15"  onchange="buscar_cidades()">
        									 <option value="">Selecione...</option>
        										<?php foreach ($arrEstados as $value => $name) {
                                                
         									 echo "<option value='{$value}'>{$name}</option>";
       										 }?>
      										</select>
      										</div>
      										<div  class="form-group" id="load_cidades">
       										 <label  class="form-label" for="field-6">Seu departamento</label>
                                                <br>
                                              <em> (Descrição do equipamento)</em>
       										 <select name="cidade" id="cidade"  class="form-control m-bot15">
          									<option value=""></option>
        									</select>
      										</div>

                                            <!-- CARREGAR PLAQUETA      --> 
                                            <div class="form-group">
                                            <label class="form-label" for="field-4">Plaqueta</label>
                                            <div class="controls">
                                                <input type="text" id="plaqueta" class="form-control" name="plaqueta" required onchange="buscar_plaqueta()">
                                            </div>
                                        </div>
                                        <div  class="form-group" id="load_plaqueta">
       										 <label  class="form-label" for="field-6">Descição do equipamento</label>
                                                <br>
                                              <em> (Descrição do equipamento)</em>
       										 
                                            <textarea class="form-control" cols="5" id="desc" name="desc" disabled rows="3">  </textarea>
      										</div>
                                             <!-- FIM DO CARREGAMENTO DE PLAQUETA CSS TEMPLATE  -->
                                            </form>
                                        <div class="form-group">
                                        <label class="form-label" for="field-7">Sua regi&atilde;o:</label>
                                        
                                        <select class="form-control m-bot15" name="regiao" required>
                                            <option></option>
                                            <option value="Sede">Sede</option>
                                            <option value="Sede">Osasco</option>
                                            <option value="Regional Maracana">Regional Maracanã</option>
                                            
                                        </select>
                                        </div>
                                       <div class="form-group">
                                            <label class="form-label" for="field-8">Descreva detalhadamente a solicita&ccedil;&atilde;o:</label>
                                            <div class="controls">
                                                <textarea class="form-control"  cols="5" id="field-6" name="prob" style="resize:none" required></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                                <input type="submit" class="btn btn-primary " name="enviar"></input>
                                            </div>
                                        </div>

                                    </div>
                                </div>


                            </div>
                            </form>

</html>