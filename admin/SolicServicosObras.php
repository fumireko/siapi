<?php
   include "../validar_session.php";  
   include "../Config/config_sistema.php";
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
       <?php
include "../Config/config_sistema.php";
header("Content-Type: text/html; charset=ISO-8859-1",true);
$result = mysql_query("SELECT tbcmei_id, tbcmei_nome FROM `tbcmei` WHERE interno != 'sim'") or die('Erro, query falhou');
?>
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

<section class="box ">
<header class="panel_header">
        <h2 class="title pull-left">Solicitação de serviço</h2>
             
</header>
<form class="form-horizontal" method="POST" id="formSolicitacao" action="ssolicitacao.php">
                            <fieldset>
                                <div id="MsgSucesso" class="alert alert-success" style="text-align:center; display:none;"
                                    role="alert">Solicitacao feita com sucesso!</div>
                                <div id="MsgErro" class="alert alert-danger" style="text-align:center; display:none;"
                                    role="alert">Erro ao realizar a solicitacao!</div>
                                <!-- Text input-->
                                <!-- Select Basic -->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="unidade_usuario">Unidade de Ensino</label>
                                    <div class="col-md-4">
                                        <select id="unidade_usuario" name="unidade_usuario" class="form-control"
                                            required>
                                            <option value="0">Selecionar</option>
                                            <?php while($option = mysql_fetch_array($result)) { ?>
                                            <option value="<?php echo $option['tbcmei_nome'] ?>">
                                                <?php echo $option['tbcmei_nome'] ?>
                                            </option>
                                            <?php } ?>
                                        </select>
                                        <small>Caso o unidade de ensino nao apareca na lista siga ate a tela de cadastro de unidades e faca o cadastro.</small>
                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="local_servico">Local/Sala</label>
                                    <div class="col-md-4">
                                        <input id="local_servico" name="local_servico" id="local_servico" type="text"
                                            placeholder="Informe o ambiente para execução do serviço" class="form-control input-md"
                                            required>
                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="solicitante">Solicitante</label>
                                    <div class="col-md-4">
                                        <input id="solicitante" name="solicitante" type="text" placeholder="Informe a pessoa de contato"
                                            class="form-control input-md" required>

                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="email">E-mail</label>
                                    <div class="col-md-4">
                                        <input id="email" name="email" type="text" placeholder="Informe o e-mail para confirmacao"
                                            class="form-control input-md" required>
                                    </div>
                                </div>

                                <!-- Select Basic -->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="tipo_servico">Tipo de Servico</label>
                                    <div class="col-md-4">
                                        <select id="tipo_servico" name="tipo_servico" class="form-control" onchange="habilitaCampos(this.value);"
                                            required>
                                            <option value="">Selecionar</option>
                                            <option value="Construcao (pedreiro)">Construcao (pedreiro)</option>
                                            <option value="Hidraulica (encanador)">Hidraulica (encanador)</option>
                                            <option value="Eletrica">Eletrica</option>
                                            <option value="Marcenaria / Carpintaria">Marcenaria / Carpintaria</option>
                                            <option value="Pintura">Pintura</option>
                                            <option value="Serralheria">Serralheria</option>
                                            <option value="Vidracaria">Vidracaria</option>
                                            <option value="Chaveiro">Chaveiro</option>
                                            <option value="Rocada">Rocada</option>
                                            <option value="Retirada de entulhos/caliças">Retirada de entulhos/calicas</option>
                                            <option value="Telefonia e Alarmes (somente fiação interna)">Telefonia e Alarmes (somente fiacao interna)</option>
                                            <option value="Distribuição (areia / pedrisco / saibro / grama)">Distribuicao (areia / pedrisco / saibro / grama)</option>
                                            <option value="Materiais de construcao (sem mão de obra)">Materiais de construcao (sem mao de obra)</option>
                                            <option value="Dedetizacao">Dedetizacao(não valido para cobras e pombos)</option>
                                            <option value="Desratizacao">Desratizacao</option>
                                            <option value="Limpeza de caixa dagua">Limpeza de caixa dagua</option>
                                            <option value="Esgotamento de fossa">Esgotamento de fossa</option>
                                            <option value="Tela de cozinha">Tela de cozinha</option>
                                        </select>
                                        <small>Antes da solicitação  do serviço consulte o manual de orientações de serviços en contrado <a href="#" target="_blank">aqui</a></small><br>
                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="form-group" id="descricao_servico">
                                    <label class="col-md-4 control-label" for="descricao_servico">Descricao do Servico</label>
                                    <div class="col-md-4">
                                        <textarea id="descricao_servico" name="descricao_servico" style="resize:none"
                                            rows="5" placeholder="Descreva que tipo de manutenção necessita" class="form-control input-md"></textarea>
                                    </div>
                                </div>
                                <!-- Select Basic -->
                                <div class="form-group" id="material_disponivel">
                                    <label class="col-md-4 control-label" for="material_disponivel">A unidade de ensino
                                        disponibilizara material proprio?</label>
                                    <div class="col-md-4">
                                        <select id="material_disponivel" name="material_disponivel" class="form-control">
                                            <option value="">Selecionar</option>
                                            <option value="Sim">Sim</option>
                                            <option value="Nao">Nao</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- Button -->
                                <div class="form-group">
                                <div align="center"><input type="submit" value="ENVIAR CADASTRO" name="salvar" /></div>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
</section> 
</section>   
</div>
</body>

</html>