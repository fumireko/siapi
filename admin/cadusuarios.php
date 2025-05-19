<?php
include "../validar_session.php"; 
include "../Config/config_sistema.php";
$nome_usuario = $_SESSION['nome_usuario'];
$nivel_usuario = $_SESSION['nivel_usuario']; 
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
            <h2 class="title pull-left"> <a id="gerarExcel" href="./listauser.php" class="btn btn-primary">Listar usuários</a> </h2></h2>
            </header>
            <div class="content-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <form class="form-horizontal" method="POST" id="" action="salvaruser.php">
                            <div id="MsgSucesso" class="alert alert-success" style="text-align:center; display:none;" role="alert">Usuários cadastrada com sucesso!</div>
                            <div id="MsgErro" class="alert alert-danger" style="text-align:center; display:none;" role="alert">Erro ao cadastrar Usuários!</div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="nome">Nome</label>
                                <div class="col-md-4">
                                    <input id="nome" name="nome" type="text" placeholder="Digite o nome do Usuário" class="form-control input-md" required>
                                </div>
                            </div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="senha">Senha</label>
                                <div class="col-md-4">
                                    <input id="senha" name="senha" type="password" placeholder="Ecolha uma senha" class="form-control input-md" required>
                                </div>
                            </div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="senha">Confirmar Senha</label>
                                <div class="col-md-4">
                                    <input id="confsenha" name="confsenha" type="password" placeholder="Confirme a senha" class="form-control input-md" required>
                                </div>
                            </div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="email">Email/Login</label>
                                <div class="col-md-4">
                                    <input id="email" name="email" type="text" placeholder="Digite o email do Usuário" class="form-control input-md" required>
                                </div>
                            </div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="nivel">Nivel</label>
                                <div class="col-md-4">
                                <select class="form-control m-bot15" name="nivel" required >
                                       
                                        
                                        <?php if ($nivel_usuario == 1) 
                                        {
                                          echo '<option value="1"> 1 - administrador</option>';
                                          echo '<option value="2"> 2 - não atribuído</option>';
                                          echo '<option value="3"> 3 - fila de espera</option>';
                                          echo '<option value="4"> 4 - suporte gerencial</option>';
                                          echo '<option value="5"> 5 - caec</option>';
                                          echo '<option value="6"> 6 - escola de gestão</option>';
                                          echo '<option value="7"> 7 - patrimonio SMS</option>';
                                        }
                                        else 
                                            if ($nivel_usuario == 3 )
                                        {
                                            echo '<option value="3"> 3 - fila de espera</option>';
                                        }                                       
 
                                        else 
                                            if ($nivel_usuario == 4 )
                                        {
                                            echo '<option value="4"> 4 - suporte gerencial</option>';  
                                        }
                                        ?>    
                                        
                                    </select>
                            </div>
                            </div>
                            <!-- Text input-->
                             <div class="form-group">
                                <label class="col-md-4 control-label" for="id_cmei">Departamento</label>
                                <div class="col-md-4">
                                    <select class="form-control m-bot15" name="id_cmei" required >
                                        <option value=""></option>
                                        <?php
                                            $sql = "SELECT * FROM tbcmei order by tbcmei_nome";
                                            $resultado = mysql_query($sql) or die('Erro ao selecionar especialidade: ' .mysql_error());
                                            while($row = mysql_fetch_array($resultado))
                                            {
                                                $selected = ($row['tbcmei_id'] == $_POST['tbcmei_nome'])?'selected':'';
                                        ?>
                                        <option value="<?php echo $row['tbcmei_id'];  ?>" <?php echo $selected; ?>>
                                        <?php echo $row['tbcmei_nome']; ?>            </option>
                                        <?php 
                                        }
                                        ?>
                                    </select>
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
</html
