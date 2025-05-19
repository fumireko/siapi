<?php
//include "../validar_session.php"; 
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
                <h1 class="title">SMTI Cadastro de Departamentos </h1>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="col-lg-12">
        <section class="box ">
            <header class="panel_header">
                <h2 class="title pull-left"> <a id="gerarExcel" href="./listadepto.php" class="btn btn-primary">Voltar</a> </h2>
                
            </header>
            <div class="content-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                    <form class="form-horizontal" method="POST" id="" action="salvacmei.php">
                            <div id="MsgSucesso" class="alert alert-success" style="text-align:center; display:none;" role="alert">Atendimento cadastrado com sucesso!</div>
                            <div id="MsgErro" class="alert alert-danger" style="text-align:center; display:none;" role="alert">Erro ao cadastrar Atendimento!</div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="nome">Secretaria</label>
                                <div class="col-md-4">
                                    <select class="form-control m-bot15" name="tbcmei_sec_id">
			                        <option value=""></option>
			                        <?php
			                            $sql = "SELECT * FROM tbsecretaria order by sec_nome";
			                            $resultado = mysql_query($sql) or die('Erro ao selecionar: ' .mysql_error());
                                        while($row = mysql_fetch_array($resultado))
			                            {
    	    	                            $selected = ($row['sec_id'] == $_POST['sec_nome'])?'selected':'';
			                            ?>
                                            <option value="<?php echo $row['sec_id'];?>" <?php echo $selected; ?>>
                                            <?php echo $row['sec_nome']; ?>            </option>
                                            <?php 
                                         }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="nome">Nome do Departamento</label>
                                <div class="col-md-4">
                                    <input id="nome" name="nome" type="text" placeholder="Digite o nome do Departamento" class="form-control input-md" required>
                                </div>
                            </div>
                            
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="interno">É Interno?</label>
                                <div class="col-md-4">
                                    <select name="interno"class="form-control m-bot15">
                                        <option value=""></option>
                                        <option value="sim">sim</option>
                                        <option value="nao">não</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="interno">Local</label>
                                <div class="col-md-4">
                                    <select name="local"class="form-control m-bot15">
                                        <option value=""></option>
                                        <option value="Cmeis">Cmeis</option>
                                        <option value="Escolas">Escolas</option>
                                        <option value="Outros">Outros</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="telefone">Telefone</label>
                                <div class="col-md-4">
                                    <input id="telefone" name="telefone" type="text" placeholder="Digite o telefone" class="form-control input-md" required>
                                </div>
                            </div>
                             <!-- Text input-->
                             <div class="form-group">
                                <label class="col-md-4 control-label" for="coord">Diretor(a)</label>
                                <div class="col-md-4">
                                    <input id="coord" name="coord" type="text" placeholder="Digite o nome do(a) Diretor(a)" class="form-control" input-md required>
                                </div>
                            </div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="email">Email</label>
                                <div class="col-md-4">
                                    <input id="email" name="email" type="text" placeholder="Digite o email do cmei" class="form-control input-md" required>
                                </div>
                            </div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="cep">CEP</label>
                                <div class="col-md-4">
                                    <input id="cep" name="cep" type="text" placeholder="Digite o CEP" class="form-control input-md" >
                                </div>
                            </div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="rua">Rua</label>
                                <div class="col-md-4">
                                    <input id="rua" name="rua" type="text" placeholder="Digite o nome da rua" class="form-control input-md" >
                                </div>
                            </div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="comp">Complemento</label>
                                <div class="col-md-4">n type="submit" class="btn btn-primary pull-right" disabled id="b
                                    <input id="comp" name="comp" type="text" placeholder="Digite um complemento" class="form-control input-md" >
                                </div>
                            </div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="num">Numero</label>
                                <div class="col-md-4">
                                    <input id="num" name="num" type="text" placeholder="Digite o numero" class="form-control input-md" >
                                </div>
                            </div>
                             <!-- Text input-->
                             <div class="form-group">
                                <label class="col-md-4 control-label" for="bairro">Bairro</label>
                                <div class="col-md-4">
                                    <input id="bairro" name="bairro" type="text" placeholder="Digite o bairro" class="form-control input-md" >
                                </div>
                            </div>
                             <!-- Text input-->
                             <div class="form-group">
                                <label class="col-md-4 control-label" for="cidade">Cidade</label>
                                <div class="col-md-4">
                                    <input id="cidade" name="cidade" type="text" placeholder="Digite a cidade" class="form-control input-md" >
                                </div>
                            </div>
                             <!-- Text input-->
                             <div class="form-group">
                                <label class="col-md-4 control-label" for="estado">Estado</label>
                                <div class="col-md-4">
                                    <input id="estado" name="estado" type="text" placeholder="Digite o estado" class="form-control input-md" >
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
</html>