<?php
include "../validar_session.php"; 
include "../Config/config_sistema.php";
$nome_usuario = $_SESSION['nome_usuario'];
$unidade_usuario = $_SESSION['unidade_usuario'];
$sec_id = $_SESSION['sec_id'];
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
                <h1 class="title">Sistema de Gestão T.I </h1>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="col-lg-12">
        <section class="box ">
            <header class="panel_header">
                <h2 class="title pull-left">Abrir Chamado <?php echo $nome_usuario ?></h2>
            </header>
            <div class="content-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <form class="form-horizontal" method="POST" id="" action="schamado_logado.php">
                            <div id="MsgSucesso" class="alert alert-success" style="text-align:center; display:none;" role="alert">Aluno cadastrado com sucesso!</div>
                            <div id="MsgErro" class="alert alert-danger" style="text-align:center; display:none;" role="alert">Erro ao cadastrar Aluno!</div>
                            <!-- Text input-->
                           
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="nome">Nome</label>
                                <div class="col-md-4">
                                    <input id="nome" name="nome1" type="text" disabled="disable" value ="<?php echo $nome_usuario ?>"placeholder="Digite o nome do solicitante" class="form-control input-md" required>
                                    <input id="nome" name="nome" type="hidden"  value ="<?php echo $nome_usuario ?>"placeholder="Digite o nome do solicitante" class="form-control input-md" required>
                                </div>
                            </div>
                            
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="email">Seu email</label>
                                <div class="col-md-4">
                                    <input id="telefone" name="email" type="text" minlength="5" maxlength="15" class="form-control input-md" required>
                                </div>
                            </div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="celu">Telefone</label>
                                <div class="col-md-4">
                                    <input id="celu" name="telefone" type="tel"  minlength="5" maxlength="13" class="form-control input-md" required>
                                </div>
                            </div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="celu">Seu Departamento</label>
                                <div class="col-md-4">
                                    <input id="celular" name="dpto" type="text" disabled="disable" value ="<? echo $tbcmei_nome;?>" minlength="5" maxlength="13" class="form-control input-md" required>
                                    <input id="id_setor" name="id_setor" type="text"  value ="<? echo $unidade_usuario;?>" minlength="5" maxlength="13" class="form-control input-md" required>
                                    <input id="id_setor" name="sec_id" type="text"  value ="<? echo $sec_id;?>" minlength="5" maxlength="13" class="form-control input-md" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="celu">Região</label>
                                <div class="col-md-4">
                                <select class="form-control m-bot15" name="regiao" required>
                                            <option></option>
                                            <option value="Sede">Sede</option>
                                            <option value="Sede">Osasco</option>
                                            <option value="Regional Maracana">Regional Maracanã</option>
                                            
                                        </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="celu">Tipo de serviço</label>
                                <div class="col-md-4">
                                <select class="form-control m-bot15" name="tpservico" required>
                                <option></option>
                                            <option>Suporte T&eacute;cnico CPU</option>
                                            <option>Suporte T&eacute;cnico REDE/INTERNET</option>
                                            <option>Suporte T&eacute;cnico SITE</option>
                                            <option>E-MAIL</option>
                                            <option>TELEFONIA</option>
                                            <option>IPM</option>
                                            <option>OUTROS</option>
                                            
                                        </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label" for="celu">Plaqueta</label>
                                <div class="col-md-4">
                                    <input id="celu" name="plaqueta" type="tel"  minlength="1" maxlength="13" class="form-control input-md">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="celu">Problema</label>
                                <div class="col-md-4">
                                <textarea class="form-control"  cols="5" id="field-6" name="prob" style="resize:none" required></textarea>
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