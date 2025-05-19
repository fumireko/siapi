<?php
include "../Config/config_sistema.php";
header("Content-Type: text/html; charset=ISO-8859-1",true);
$result = mysql_query("SELECT tbcmei_id, tbcmei_nome FROM `tbcmei`") or die('Erro, query falhou');
?>
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
                <h2 class="title pull-left">Cadastro de Usuarios</h2>
            </header>
            <div class="content-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <form class="form-horizontal" method="POST" id="formSalvaUsuario">
                            <div id="MsgSucesso" class="alert alert-success" style="text-align:center; display:none;"
                                role="alert">Usuario cadastrado com sucesso!</div>
                            <div id="MsgErro" class="alert alert-danger" style="text-align:center; display:none;" role="alert">Ja
                                existe um usuario com este e-mail!</div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="nome_usuario">Nome</label>
                                <div class="col-md-4">
                                    <input id="nome_usuario" name="nome_usuario" type="text" placeholder="Digite o nome do usuario"
                                        class="form-control input-md" required>
                                </div>
                            </div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="email_usuario">E-mail</label>
                                <div class="col-md-4">
                                    <input id="email_usuario" name="email_usuario" type="email" placeholder="Digite o e-mail do usuario"
                                        class="form-control input-md" required>
                                </div>
                            </div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="senha_usuario">Senha</label>
                                <div class="col-md-4">
                                    <input id="senha_usuario" name="senha_usuario" type="password" placeholder="Digite a senha do usuario"
                                        class="form-control input-md" required>
                                </div>
                            </div>
                            <!-- Select Basic -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="nivel_usuario">Nivel do usuario</label>
                                <div class="col-md-4">
                                    <select id="nivel_usuario" name="nivel_usuario" class="form-control" required>
                                        <option value="0">Selecionar</option>
                                        <option value="1">Administrativo</option>
                                        <option value="2">Pedagogico</option>
                                        <option value="3">Docente</option>
                                        <option value="4">Obras</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Select Basic -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="unidade_usuario">Unidade de Ensino</label>
                                <div class="col-md-4">
                                    <select id="unidade_usuario" name="unidade_usuario" class="form-control" required>
                                    <option value="0">Selecionar</option>
                                    <?php while($option = mysql_fetch_array($result)) { ?>
                                        <option value="<?php echo $option['tbcmei_id'] ?>"><?php echo $option['tbcmei_nome'] ?></option>
                                    <?php } ?>
                                    </select>
                                    <small>Caso o unidade de ensino nao apareca na lista siga ate a tela de cadastro de unidades e faca o cadastro.</small>
                                </div>
                            </div>
                            <!-- Button -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="btn_cadastro"></label>
                                <div class="col-md-4">
                                    <button id="btn_cadastro" name="btn_cadastro" class="btn btn-primary pull-right">Cadastrar</button>
                                    <button type="submit" class="btn btn-primary pull-right" disabled id="btnAguarde"
                                        style="padding:0 25px 0 25px;height:2.5rem; color:black; display: none">Aguarde
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