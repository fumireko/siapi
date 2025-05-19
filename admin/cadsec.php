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
<script src="js/app.js"></script>
<script src="js/salvarUnidade.js"></script>
<section class="wrapper main-wrapper">
    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
        <div class="page-title">
            <div class="pull-left">
                <h1 class="title">SMTI</h1>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="col-lg-12">
        <section class="box ">
            <header class="panel_header">
            <h2 class="title pull-left"> <a id="gerarExcel" href="./frmporstatus.php" class="btn btn-primary">Voltar</a> </h2></h2>
            </header>
            <div class="content-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <form class="form-horizontal" method="POST" id="" action="salvasec.php">
                            <div id="MsgSucesso" class="alert alert-success" style="text-align:center; display:none;" role="alert">Usuários cadastrada com sucesso!</div>
                            <div id="MsgErro" class="alert alert-danger" style="text-align:center; display:none;" role="alert">Erro ao cadastrar Usuários!</div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="nome">Secretaria</label>
                                <div class="col-md-4">
                                    <input id="nome" name="sec" type="text" placeholder="Digite o nome da Secretaria" class="form-control input-md" required>
                                </div>
                            </div>
                             <!-- Text input-->
                             <div class="form-group">
                                <label class="col-md-4 control-label" for="nome">Secretaria Sigla</label>
                                <div class="col-md-4">
                                    <input id="nome" name="sigla" type="text" placeholder="Digite uma sigla para essa Secretaria" class="form-control input-md" required>
                                </div>
                            </div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="senha">Responsável</label>
                                <div class="col-md-4">
                                    <input id="senha" name="resp" type="text" placeholder="Digite o nome do responsável" class="form-control input-md" required>
                                </div>
                            </div>
                            <!-- Text input-->
                            
                            <!-- Text input-->
                            
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
</html