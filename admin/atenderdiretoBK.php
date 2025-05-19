<?php
//include "../validar_session.php"; 
include "../Config/config_sistema.php";
$nome_usuario = $_SESSION['nome_usuario'];
header('Content-Type: text/html; charset=utf-8');
//include_once  "./atualiza.php";
if (file_exists('init.php'))
{
    require_once 'init.php';
}
else
{
    exit('Nao foi possivel encontrar o arquivo de inicializao');
}
?>


<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-BR" lang="pt-BR" ng-app="App">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<!-- JS -->
<body>
    <!-- aqui começa o menu -->
    <!-- START TOPBAR -->
         
    <?php 
    //   include "index.php"
    ?> 

<script src="assets/js/jquery-1.7.2.min.js"></script>
<script src="js/salvarUnidade.js"></script>
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
<section class="wrapper main-wrapper">
    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
        <div class="page-title">
            <div class="pull-left">
                <h1 class="title">Sistema de Gestão T.I</h1>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="col-lg-12">
        <section class="box ">
            <header class="panel_header">
                <h2 class="title pull-left">Cadastro de cursistas</h2>
            </header>
            <div class="content-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                    <form class="form-horizontal" method="POST" id="" action="salvacmei.php">
                            <div id="MsgSucesso" class="alert alert-success" style="text-align:center; display:none;" role="alert">Atendimento cadastrado com sucesso!</div>
                            <div id="MsgErro" class="alert alert-danger" style="text-align:center; display:none;" role="alert">Erro ao cadastrar Atendimento!</div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="nome">Nome</label>
                                <div class="col-md-4">
                                    <input id="nsolicitante" name="nsolicitante" type="text" placeholder="Digite o nome" class="form-control input-md" required>
                                </div>
                            </div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="email">Email</label>
                                <div class="col-md-4">
                                    <input id="email" name="email" type="text" placeholder="Digite email" class="form-control input-md" required>
                                </div>
                            </div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="telefone">Telefone</label>
                                <div class="col-md-4">
                                    <input id="Telefone" name="Telefone" type="text" placeholder="Digite o email do participante" class="form-control input-md" required>
                                </div>
                            </div>
                            <!-- Select Input-->
                            
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="nome">Sua secretaria</label>
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
      										<div class="form-group">
     										 <label class="form-label" for="field-5">Secret&aacute;ria</label>
     										 <select name="estado" id="estado" class="form-control m-bot15"  onchange="buscar_cidades()">
        									 <option value="">Selecione...</option>
        										<?php foreach ($arrEstados as $value => $name) {
         									 echo "<option value='{$value}'>{$name}</option>";
       										 }?>
      										</select>
      										</div>
      										<div  class="form-group" id="load_cidades">
       										 <label  class="form-label" for="field-6">Departamento</label>
       										 <select name="cidade" id="cidade"  class="form-control m-bot15">
          									<option value="">Selecione o departamento</option>
        									</select>
      										</div>
                             <!-- Text input-->
                             <div class="form-group">
                                <label class="col-md-4 control-label" for="telefone">Região</label>
                                <div class="col-md-4">
                                <option></option>
                                            <option>Osasco</option>
                                            <option>Sede</option>
                                            <option>Regional Maracana;</option>
                                        </select>
                                </div>
                            </div>                          
                             
             
                             <!-- Button -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="btn_cadastro_unidade"></label>
                                <div class="col-md-4">
                                    <button id="btn_cadastro_unidade" name="btn_cadastro_unidade" class="btn btn-primary pull-right">Cadastrar</button>
                                    <button type="submit" class="btn btn-primary pull-right" disabled id="btnAguarde" style="padding:0 25px 0 25px;height:2.5rem; color:black; display: none">Aguarde
                                        <i class="fa fa-spinner fa-spin"></i></button>
                                    <?php echo $i; ?>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</section>
                                            </body>
</html>