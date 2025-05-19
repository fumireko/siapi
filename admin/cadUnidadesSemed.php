<?php
include "../Config/config_sistema.php";
//include_once  "./atualiza.php";
?>
<!-- JS -->
<script src="js/app.js"></script>
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
                <h2 class="title pull-left">Cadastro de Unidades</h2>
            </header>
            <div class="content-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <form class="form-horizontal" method="POST" id="formSalvaUnidade" action="">
                            <div id="MsgSucesso" class="alert alert-success" style="text-align:center; display:none;" role="alert">Unidade cadastrada com sucesso!</div>
                            <div id="MsgErro" class="alert alert-danger" style="text-align:center; display:none;" role="alert">Erro ao cadastrar unidade!</div>
                            <div id="Msgvazio" class="alert alert-danger" style="text-align:center; display:none;" value = "novo" role="alert">Novo</div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="nome_unidade">Nome da crian&ccedil;a</label>
                                <div class="col-md-4">
                                    <input id="nome" name="nome" type="text" placeholder="Digite o nome da criança" class="form-control input-md" required>
                                </div>
                            </div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="coordenador_unidade">Coordenador(a)</label>
                                <div class="col-md-4">
                                    <input id="dta_nasc" name="dta_nasc" type="date" placeholder="Digite a data de nascimento" class="form-control input-md" required>
                                </div>
                            </div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="telefone_unidade">Telefone</label>
                                <div class="col-md-4">
                                    <input id="telefone_unidade" name="telefone_unidade" type="tel" placeholder="Digite o telefone da Unidade" class="form-control input-md" required>
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