<?php
include "../validar_session.php";  
include "../Config/config_sistema.php";
if (!isset($_SESSION)){
    session_start();
   }
$email_usuario = $_SESSION['email_usuario'];
$nome_usuario = $_SESSION['nome_usuario'];
$nivel_usuario = $_SESSION['nivel_usuario'];
$unidade_usuario = $_SESSION['unidade_usuario'];
$id_usuario = $_SESSION['id_usuario'];

$consulta = mysql_query("select tbcmei.tbcmei_nome from tbcmei where tbcmei_id = '$unidade_usuario'");

header("Content-Type: text/html; charset=ISO-8859-1",true);
?>

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
            <header class="panel_header">
                <h2 class="title pull-left">Alterar Senha</h2>
            </header>
            <div class="content-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <form class="form-horizontal" method="post" id="formAlteraSenha">
                            <div id="MsgSucesso" class="alert alert-success" style="text-align:center; display:none;"
                                role="alert">Senha alterada com sucesso!</div>
                            <div id="MsgErro" class="alert alert-danger" style="text-align:center; display:none;" role="alert">Erro
                                ao alterar a senha!</div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="nome_usuario">Nome</label>
                                <div class="col-md-4">
                                    <input id="nome_usuario" name="nome_usuario" disabled type="text" value="<?php echo $nome_usuario ?>"
                                        class="form-control input-md">
                                    <input id="id_usuario" name="id_usuario" type="hidden" value="<?php echo $id_usuario ?>">
                                </div>
                            </div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="email_usuario">E-mail</label>
                                <div class="col-md-4">
                                    <input id="email_usuario" name="email_usuario" disabled type="email" value="<?php echo $email_usuario?>"
                                        class="form-control input-md">
                                </div>
                            </div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="unidade_usuario">Unidade de Ensino</label>
                                <div class="col-md-4">
                                    <?php
                                    if(mysql_num_rows($consulta) > 0){
                                        while(list($unidade_usuario) = mysql_fetch_array($consulta)){
                                            echo "<input id='unidade_usuario' name='unidade_usuario' disabled type='text' value='$unidade_usuario'
                                            class='form-control input-md'>";
                                        } 
                                    }                                      
                                    ?>
                                </div>
                            </div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="senha_usuario">Nova Senha</label>
                                <div class="col-md-4">
                                    <input id="senha_usuario" name="senha_usuario" type="password" placeholder="Digite a nova senha do usuario"
                                        class="form-control input-md" required>
                                </div>
                            </div>
                            <!-- Button -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="btn_alterar_senha"></label>
                                <div class="col-md-4">
                                    <button id="btn_alterar_senha" name="btn_alterar_senha" class="btn btn-primary pull-right">Alterar
                                        Senha</button>
                                    <button type="submit" class="btn btn-primary pull-right" disabled id="btnAguarde"
                                        style="padding:0 25px 0 25px;height:2.5rem; color:white; display: none">Aguarde
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