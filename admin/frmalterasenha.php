<?php
include "../validar_session.php"; 
include "../Config/config_sistema.php";
$nome_usuario = $_SESSION['nome_usuario'];
$email_usuario = $_SESSION['email_usuario'];
$id_user = $_SESSION['id_usuario'];
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
            <h1 class="title">SISTEMA DE GESTÃO T.I</h1>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="col-lg-12">
        <section class="box ">
            <header class="panel_header">
                <h2 class="title pull-left">Alterar senha <?php echo $nome_usuario ?> ID_user <?php echo $id_user ?> </h2>
            </header>
            <div class="content-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <form class="form-horizontal" method="POST" id="" action="salterasenha.php">
                            <div id="MsgSucesso" class="alert alert-success" style="text-align:center; display:none;" role="alert">Aluno cadastrado com sucesso!</div>
                            <div id="MsgErro" class="alert alert-danger" style="text-align:center; display:none;" role="alert">Erro ao cadastrar Aluno!</div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="nome">Login/Email</label> 
                                <input id="id_user" name="id_user" type="hidden" value = "<?php echo $id_user ?>" 
                                 class="form-control input-md" required>
                                <div class="col-md-4">
                                    <input id="nome" disabled name="email_usuario" type="text" value = "<?php echo $email_usuario ?>" class="form-control input-md" required>
                                </div>
                            </div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="Nova senha">Nova senha</label> 
                                <div class="col-md-4">
                                    <input data-js="novasenha" id="novasenha" name="novasenha" type="password" minlength="6" placeholder="Digite a nova senha" maxlength="14" class="form-control input-md" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label" for="conf">Confirmar</label>
                                <div class="col-md-4">
                                    <input data-js="conf" id="conf" name="conf" type="password" minlength="6" placeholder="Repita a senha" maxlength="14" class="form-control input-md" required>
                                </div>
                            </div>
                            <!-- Text input-->
                            
                             <!-- Text input-->
                             <div class="form-group">
                                <label class="col-md-4 control-label" for="pergunta">Dica de senha </label>
                                <div class="col-md-4">
                                <input data-js="resp" id="pergunta" name="pergunta" type="text" minlength="8" placeholder="Pergunta" class="form-control input-md" >
                                </div>
                                
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="resposta">Resposta</label>
                                <div class="col-md-4">
                                    <input data-js="resp" id="resposta" name="resposta" type="text" minlength="8" placeholder="Resposta" class="form-control input-md">
                                </div>
                            </div>
                            <!-- Text input-->
                            
                            <!-- Text input-->
                           
                             <!-- Button -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="btn_cadastro_unidade"></label>
                                <div class="col-md-4">
                                    <button id="btn_cadastro_unidade" name="btn_cadastro_unidade" class="btn btn-primary pull-right">Alterar</button>
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