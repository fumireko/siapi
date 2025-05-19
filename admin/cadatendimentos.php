<?php
include "../validar_session.php"; 
include "../Config/config_sistema.php";
$nome_usuario = $_SESSION['nome_usuario'];
$id_usuario = $_SESSION['id_usuario'];
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
                <h2 class="title pull-left">Cadastro de Atendimento</h2>
            </header>
            <div class="content-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                    <form class="form-horizontal" method="POST" id="" action="salvaatendimento.php">
                            <div id="MsgSucesso" class="alert alert-success" style="text-align:center; display:none;" role="alert">Atendimento cadastrado com sucesso!</div>
                            <div id="MsgErro" class="alert alert-danger" style="text-align:center; display:none;" role="alert">Erro ao cadastrar Atendimento!</div>
                             <!-- Text input-->
                             <div class="form-group">
                                <label class="col-md-4 control-label" for="RG">RG</label>
                                <div class="col-md-4">
                                    <input id="telefone" name="rg" type="text" placeholder="Digite o RG" class="form-control input-md" required>
                                </div>
                            </div>
                           
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="nome">Nome</label>
                                <div class="col-md-4">
                                    <input id="nome" name="nome" type="text" placeholder="Digite o nome do Visitante" class="form-control input-md" required>
                                </div>
                            </div>
                           
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" maxlength="50"  for="Cod Crachá">Cod crachá</label>
                                <div class="col-md-4">
                                    <input id="assunto" name="codcracha" type="text" placeholder="Digite o codigo de barras" class="form-control input-md" required>
                                </div>
                            </div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="atendimento">Tipo de Atendimento</label>
                                <div class="col-md-4">
                                    <select class="form-control m-bot15" name="tpatendimento">
                                        <option value=""></option>
                                        <option value="Pessoal">Visita</option>
                                        <option value="Telefônico">Atentimento</option>
                                        <option value="Interno">Interno</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Text input-->
                            <div class="form-group" id="descricao">
                                <label class="col-md-4 control-label" for="descricao">Descricao do Atendimento</label>
                                <div class="col-md-4">
                                    <textarea id="descricao" name="descricao" style="resize:none" rows="5" placeholder="Descreva o Atendimento" class="form-control input-md"></textarea>
                                </div>
                            </div>
                             <!-- Text input-->
                             <div class="form-group">
                                <label class="col-md-4 control-label" for="departamento">Departamento</label>
                                <div class="col-md-4">
                                    <select class="form-control m-bot15" name="departamento">
                                        <option value=""></option>
                                        <?php
                                            $sql = "SELECT * FROM tbcmei WHERE interno = 'sim' order by tbcmei_nome";
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
                                    <!--<option value="Recepção">Recepção</option>
                                        <option value="RH Educação">RH Educação</option>
                                        <option value="Alimentação Escolar">Alimentação Escolar</option>
                                        <option value="Ouvidoria">Ouvidoria</option>
                                        <option value="Documentação Escolar-CMEI">Documentação Escolar-cmei</option>
                                        <option value="Documentação Escolar-Escolas">Documentação Escolar-Escolas</option>
                                        <option value="Pedagógico-Ed-Inf">Pedagógico-Ed-Inf</option>
                                        <option value="Pedagógico-Ens-Fund">Pedagógico-Ens-Fund</option>
                                        <option value="Transporte Escolar">Transporte Escolar</option>
                                        <option value="Suprimentos(Barracão)">Suprimentos(Barracão)</option>
                                        <option value="Obras e Manutenção">Obras e Manutenção</option>
                                        <option value="Controladorias Compras">Controladorias Compras</option>
                                        <option value="CAEC">CAEC</option>
                                        <option value="Departamento de Ed.Infantil">Departamento de Educação Infantil</option>
                                        <option value="Departamento do Ens.Fundamental">Departamento do Ensino Fundamental</option>
                                        <option value="Direção Executiva">Direção Executiva</option>
                                        <option value="Gabinete de Secretaria">Gabinete de Secretaria</option>
                                    </select>-->
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
