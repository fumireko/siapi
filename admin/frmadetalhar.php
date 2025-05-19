<?php
include "../validar_session.php"; 
include "../Config/config_sistema.php";
$nome_usuario = $_SESSION['nome_usuario'];
header('Content-Type: text/html; charset=utf-8');
//include_once  "./atualiza.php";
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-BR" lang="pt-BR" ng-app="App">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<!-- JS -->
<script src="assets/js/jquery-1.7.2.min.js"></script>
<script src="js/salvarUnidade.js"></script>
<section class="wrapper main-wrapper">
    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
        <div class="page-title">
            <div class="pull-left">
                <h1 class="title">Sistema de Gestão Escolar</h1>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="col-lg-12">
        <section class="box ">
            <header class="panel_header">
                <h2 class="title pull-left">Detalhar chamado. </h2>
            </header>
            <div class="content-body">
                <div class="row">
                    
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <form class="form-horizontal" method="POST" id="" action="salvaaluno.php">
                            <div id="MsgSucesso" class="alert alert-success" style="text-align:center; display:none;" role="alert">Aluno cadastrado com sucesso!</div>
                            <div id="MsgErro" class="alert alert-danger" style="text-align:center; display:none;" role="alert">Erro ao cadastrar Aluno!</div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="nome">Nome da crian&ccedil;a</label>
                                <div class="col-md-4">
                                    <input id="nome" name="nome" type="text" placeholder="Digite o nome da criança" class="form-control input-md" required>
                                </div>
                            </div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="cpf_mae">CPF da criança</label>
                                <div class="col-md-4">
                                    <input data-js="cpf" id="cpf" name="cpf" type="text" minlength="10" maxlength="14" class="form-control input-md" required>
                                </div>
                            </div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="dta_nasc">Data de nascimento</label>
                                <div class="col-md-4">
                                    <input id="dta_nasc" name="dta_nasc" type="date" placeholder="Digite a data de nascimento" class="form-control input-md" required>
                                </div>
                            </div>
                             <!-- Text input-->
                             <div class="form-group">
                                <label class="col-md-4 control-label" for="nome_mae">Nome da mãe</label>
                                <div class="col-md-4">
                                    <input id="nome_mae" name="nome_mae" type="text" placeholder="Digite o nome da mãe" class="form-control input-md" required>
                                </div>
                            </div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="telefone">Telefone</label>
                                <div class="col-md-4">
                                    <input id="telefone" name="telefone" type="text" minlength="5" maxlength="15" class="form-control input-md" required>
                                </div>
                            </div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="celu">Celular</label>
                                <div class="col-md-4">
                                    <input id="celu" name="celu" type="tel" minlength="5" maxlength="13" class="form-control input-md" required>
                                </div>
                            </div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="celu">Celular2</label>
                                <div class="col-md-4">
                                    <input id="celular" name="celular" type="tel" minlength="5" maxlength="13" class="form-control input-md" required>
                                </div>
                            </div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="cep">CEP</label>
                                <div class="col-md-4">
                                    <input id="cep" name="cep" type="text" class="form-control input-md" required>
                                </div>
                            </div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="rua">Rua</label>
                                <div class="col-md-4">
                                    <input id="rua" name="rua" type="text" placeholder="Digite o endereço" class="form-control input-md" required>
                                </div>
                            </div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="num">Numero</label>
                                <div class="col-md-4">
                                    <input id="num" name="num" type="text" placeholder="Digite o numero" class="form-control input-md" required>
                                </div>
                            </div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="comp">Complemento</label>
                                <div class="col-md-4">
                                    <input id="comp" name="comp" type="text" placeholder="Digite o Complemento" class="form-control input-md" required>
                                </div>
                            </div>
                             <!-- Text input-->
                             <div class="form-group">
                                <label class="col-md-4 control-label" for="bairro">Bairro</label>
                                <div class="col-md-4">
                                    <input id="telefone" name="bairro" type="text" placeholder="Digite o bairro" class="form-control input-md" required>
                                </div>
                            </div>
                             <!-- Text input-->
                             <div class="form-group">
                                <label class="col-md-4 control-label" for="cidade">Cidade</label>
                                <div class="col-md-4">
                                    <input id="telefone" name="cidade" type="text" placeholder="Digite a cidade" class="form-control input-md" required>
                                </div>
                            </div>
                             <!-- Text input-->
                             <div class="form-group">
                                <label class="col-md-4 control-label" for="estado">Estado</label>
                                <div class="col-md-4">
                                    <input id="telefone" name="estado" type="text" placeholder="Digite o numero" class="form-control input-md" required>
                                </div>
                            </div>
                             <!-- Button -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="btn_cadastro_unidade"></label>
                                <div class="col-md-4">
                                    <button id="btn_cadastro_unidade" name="btn_cadastro_unidade" class="btn btn-primary pull-right">Cadastrar</button>
                               
                                    <button type="submit" class="btn btn-primary pull-right" disabled id="btnAguarde" style="padding:0 25px 0 25px;height:2.5rem; color:black; display: none">Aguarde
                                        <i class="fa fa-spinner fa-spin"></i></button>
                                    
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </section>
    </div>
</section>
</html>