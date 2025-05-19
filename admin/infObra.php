<?php
   include "../validar_session.php";  
   include "../Config/config_sistema.php";
   $id_solicitacao = $_REQUEST['id_solicitacao'];   

   if (!isset($_SESSION)){
    session_start();
   }
   $email_usuario = $_SESSION['email_usuario'];
   $nome_usuario = $_SESSION['nome_usuario'];
   $nivel_usuario = $_SESSION['nivel_usuario'];
   $unidade_usuario = $_SESSION['unidade_usuario']; 
   ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-BR" lang="pt-BR" ng-app="App">
<head>
    <meta name="author" content="Admin" />
    <title>SEMED - Sistema de Gestao Escolar</title>
<style>
        @import url('https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300');
    .titulos{
        font-size: 2rem;
        font-family: 'Open Sans Condensed', sans-serif;
        color: rgba(31, 181, 172, 1.0);
        text-align: center;
    }
    .titulos:after, .titulos:before {
        content: '';
        display: block;
        width: 80px;
        height: 3px;
        background: rgba(31, 181, 172, 1.0);
        margin: auto;
    }
    </style>  
</head>
<!-- BEGIN BODY -->
<body>
    <!-- aqui começa o menu -->
    <!-- START TOPBAR -->
    <?php 
       include "index.php"
    ?> 
        <!-- aqui termina o menu -->
         <div id="main-content">
        <section class="wrapper main-wrapper">
    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
        <div class="page-title">
            <div class="pull-left">
                <h1 class="title">Sistema de Gestao Escolar</h1>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="col-lg-12">
        <section class="box ">
         <!-- Dados do aluno-->
        <?php
        $id_solicitacao = $_REQUEST['id_solicitacao'];
        $consulta = mysql_query("SELECT * from solicitacao_servicos where id_solicitacao = $id_solicitacao ");
        while($linhas = mysql_fetch_object($consulta)) {
            $dt = $linhas->dia_solic;
            $dti = implode("/",array_reverse(explode("-",$dt)));
        ?>
        <header class="panel_header">
           <h2 class="title pull-left">Dados da Obra ou do Chamado ou dos Pequenos Reparos</h2>
            </header>
            <div class="content-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <form class="form-horizontal" method="POST" id="alterObra" action = "alterObra.php">
                            <div class="form-row">
                                <!-- Text input-->
                                
                                <label class="col control-label" for="protocolo">Nº do Protocolo SEMOV</label>
                                <div class="col">
                                    <input hidden id="idObra" name="id_solicitacao" type="text"  value="<?php echo $linhas->id_solicitacao?>">
                                    <input hidden id="status" name="status" type="text"  value="Aberto">
                                    <input id="protocolo" name="protocolo" type="text"  value="<?php echo $linhas->num_pedido?>" placeholder="Informe o Nº do Protocolo SEMOV" class="form-control input-md">
                                </div>
                                <!-- Select Basic -->
                                <label class="col control-label" for="categoria">Categoria</label>
                                    <div class="col">
                                        <select id="categoria" name="categoria" class="form-control" 
                                            required>
                                            <option value="Não catalogado">Selecionar</option>
                                            <option value="Pequenos Reparos/Chamado">Pequenos Reparos/Chamado</option>
                                            <option value="Obra">Obra</option>
                                        </select>
                                    </div>
                                <!-- Text input-->
                                <label class="col control-label" for="dia_solic">Data</label>
                                <div class="col">
                                    <input id="dia_solic" class="form-control input-md" type="text"  value="<?php echo $dti?>" readonly>
                                </div>
                                <!-- Text input-->
                                <label class="col control-label" for="field-1">Solicitante</label>                         
                                <div class="col">
                                    <input type="text" class="form-control" id="field-1" value="<?PHP echo $linhas->solicitante?>" readonly>
                                </div>
                                <!-- Text input-->
                                <label class="col control-label" for="field-1">Email</label> 
                                <div class="controls">
                                    <input type="text" class="form-control" id="field-1" value="<?PHP echo $linhas->email?>" readonly>
                                </div>
                                <!-- Text input-->
                                <label for="unidade">Requerente</label>
                                <div class="controls">
                                    <input type="text" class="form-control" id="field-1" value="<?php echo $linhas->unidade?>" readonly>
                                </div>
                                <!-- Text input-->
                                <label for="tipo_servico">Tipo De Servico</label>
                                <div class="controls">
                                    <input type="text" class="form-control" id="field-1" value="<?php echo $linhas->tipo_servico?>" readonly>
                                </div>
                                <!-- Text input-->
                                <label for="local_sala">Local</label>
                                <div class="controls">
                                    <input type="text" class="form-control" id="field-1" value="<?php echo $linhas->local_sala?>" readonly>
                                </div>
                                <!-- Text input-->
                                <label for="material_disponivel">Local Possui Material</label>
                                <div class="controls">
                                    <input type="text" class="form-control" id="field-1" value="<?php echo $linhas->material_disponivel?>" readonly>
                                </div>
                                <!-- Text input-->
                                <label class="col control-label" for="field-1">Descrição</label>                         
                                <div class="col">
                                    <input type="text" class="form-control" id="field-1" value="<?PHP echo $linhas->descricao_servico_txt?>" readonly>
                                </div>
                                <!-- Fechando while com dados do aluno-->
                             <?php
                             } 
                           ?>   
                                <div align ="center"><input type="submit" value="Salvar" name="salvar"  class='btn btn-primary' /></div>
                        </form>    
                    </div>
                </div>
            </div>
        </section>
    </div>
</section>
        
        </div>
        
</body>

</html>