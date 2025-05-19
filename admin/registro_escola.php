<?php
include "../validar_session.php";
include "../Config/config_sistema.php";
if (!isset($_SESSION))
{
    session_start();
}
$tbcmei_nome = $_SESSION['tbcmei_nome'];
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
header("Content-Type: text/html; charset=ISO-8859-1", true);
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
            <h2 class="title pull-left">Preenchimento da situação da documentção escolar</h2>
                
    </header>
    <form class="form-horizontal" method="POST" id="formSolicitacao" action="sregistro.php">
                                <fieldset>
                                    <div id="MsgSucesso" class="alert alert-success" style="text-align:center; display:none;"
                                        role="alert">Registro feito com sucesso!</div>
                                    <div id="MsgErro" class="alert alert-danger" style="text-align:center; display:none;"
                                        role="alert">Erro ao realizar a solicitacao!</div>
                                    <!-- Text input-->
                                        <input id="unidade_usuario" name="unidade_usuario" type="text" value="<?php echo $tbcmei_nome; ?>" hidden>
                                                    <!-- Bombeiros -->
                                    <!-- Text input-->
                                    <div class="form-group">
                                            <center><h2 class="title">Bombeiros</h2></center>
                                            <label class="col-md-4 control-label" for="Numero">Informe o nº de Processo</label>
                                            <div class="col-md-2">
                                                <input id="Numero" name="Numero" type="number" min="1" placeholder="Insira o nº de Processo" class="form-control input-md" required>
                                            </div>
                                        </div>
                                    <!-- Text input-->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="projeto">Projeto</label>
                                        <div class="col-md-4">
                                            <select name="projeto" id="projeto" required>
                                                <option value=""></option>
                                                <option value="sim">sim</option>
                                                <option value="não">não</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Text input-->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="gas">Central de Gás</label>
                                        <div class="col-md-4">
                                            <select name="gas" id="gas" required>
                                                <option value=""></option>
                                                <option value="sim">sim</option>
                                                <option value="não">não</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Text input-->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="hidrantes">Hidrantes</label>
                                        <div class="col-md-4">
                                            <select name="hidrantes" id="hidrantes" required>
                                                <option value=""></option>
                                                <option value="sim">sim</option>
                                                <option value="não">não</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Text input-->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="extintores">Extintores</label>
                                        <div class="col-md-4">
                                            <select name="extintores" id="extintores" required>
                                                <option value=""></option>
                                                <option value="sim">sim</option>
                                                <option value="não">não</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Text input-->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="sinalizacao">Sinalização</label>
                                        <div class="col-md-4">
                                            <select name="sinalizacao" id="sinalizacao" required>
                                                <option value=""></option>
                                                <option value="sim">sim</option>
                                                <option value="não">não</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Text input-->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="brigada">Brigada de Incêndio</label>
                                        <div class="col-md-4">
                                            <select name="brigada" id="brigada" required>
                                                <option value=""></option>
                                                <option value="sim">sim</option>
                                                <option value="não">não</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Text input-->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="iluminacao">Iluminação</label>
                                        <div class="col-md-4">
                                            <select name="iluminacao" id="iluminacao" required>
                                                <option value=""></option>
                                                <option value="sim">sim</option>
                                                <option value="não">não</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Text input-->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="guarda_corpo">Guarda Corpo</label>
                                        <div class="col-md-4">
                                            <select name="guarda_corpo" id="guarda_corpo" required>
                                                <option value=""></option>
                                                <option value="sim">sim</option>
                                                <option value="não">não</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Text input-->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="corrimao">Corrimão</label>
                                        <div class="col-md-4">
                                            <select name="corrimao" id="corrimao" required>
                                                <option value=""></option>
                                                <option value="sim">sim</option>
                                                <option value="não">não</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                                                                <!-- Vigilancia Sanitaria -->
                                    <!-- Text input-->
                                    <div class="form-group">
                                    <center><h2 class="title">Vigilância Sanitária</h2></center>
                                        <label class="col-md-4 control-label" for="caixa_agua">Limpeza Caixa Da Água</label>
                                        <div class="col-md-4">
                                            <select name="caixa_agua" id="caixa_agua" required>
                                                <option value=""></option>
                                                <option value="sim">sim</option>
                                                <option value="não">não</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Text input-->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="dedetizacao">Dedetização</label>
                                        <div class="col-md-4">
                                            <select name="dedetizacao" id="dedetizacao" required>
                                                <option value=""></option>
                                                <option value="sim">sim</option>
                                                <option value="não">não</option>
                                            </select>
                                        </div>
                                    </div>

                                                                            <!-- SEMED -->
                                    <!-- Text input-->
                                    <div class="form-group">
                                    <center><h2 class="title">SEMED</h2></center>
                                        <label class="col-md-4 control-label" for="atas">Atas Renovação</label>
                                        <div class="col-md-4">
                                            <select name="atas" id="atas" required>
                                                <option value=""></option>
                                                <option value="sim">sim</option>
                                                <option value="não">não</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Text input-->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="conselho">Conselho Escolar</label>
                                        <div class="col-md-4">
                                            <select name="conselho" id="conselho" required>
                                                <option value=""></option>
                                                <option value="sim">sim</option>
                                                <option value="não">não</option>
                                            </select>
                                        </div>
                                    </div>

                                                                        <!-- Núcleo Regional da Área Norte -->
                                    <!-- Text input-->
                                    <div class="form-group">
                                    <center><h2 class="title">Núcleo Regional da Área Norte</h2></center>
                                        <label class="col-md-4 control-label" for="credenciamento">Credenciamento</label>
                                        <div class="col-md-4">
                                            <select name="credenciamento" id="credenciamento" required>
                                                <option value=""></option>
                                                <option value="sim">sim</option>
                                                <option value="não">não</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Text input-->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="infantil">Renovação Educação Infantil</label>
                                        <div class="col-md-4">
                                            <select name="infantil" id="infantil" required>
                                                <option value=""></option>
                                                <option value="sim">sim</option>
                                                <option value="não">não</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Text input-->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="fundamental">Renovação Ensino Fundamental</label>
                                        <div class="col-md-4">
                                            <select name="fundamental" id="fundamental" required>
                                                <option value=""></option>
                                                <option value="sim">sim</option>
                                                <option value="não">não</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <!-- Button -->
                                    <div class="form-group">
                                        <div class="col-md-8">
                                            <input type="submit" value="ENVIAR REGISTRO" name="salvar"class="btn btn-primary pull-right"/>
                                        </div>
                                    </div>
                                    </div>
                                </fieldset>
                            </form>
    </section> 
    </section>   
    </div>
    </body>

    </html>
