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
                <h1 class="title">SISTEMA DE GESTÃO T.I</h1>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="col-lg-12">
        <section class="box ">
            <header class="panel_header">
                <h2 class="title pull-left">Cadastro de demanda <?php echo $nome_usuario ?></h2>
            </header>
            <tr> 
                <td> <a id="gerarExcel" href="atend_gerarExcel.php?" class="btn btn-primary">Gerar Relatório</a> </td>
                <td> <a id="gerarExcel" href="./listademanda.php" class="btn btn-primary">Listar demanda</a> </td>
            </tr>
            <div class="content-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <form class="form-horizontal" method="POST" id="" action="salvademanda.php">
                            <div id="MsgSucesso" class="alert alert-success" style="text-align:center; display:none;" role="alert">Aluno cadastrado com sucesso!</div>
                            <div id="MsgErro" class="alert alert-danger" style="text-align:center; display:none;" role="alert">Erro ao cadastrar Aluno!</div>
                            <!-- Text input-->
                            <div class="form-group">
                            <label class="col-md-4 control-label" for="nome">Nome</label>
                                <div class="col-md-4">
                                <select class="form-control m-bot15" name="nome">
                                        <option value=""></option>
                                        <?php
                                            $sql = "SELECT * FROM usuarios WHERE id_unidade = '17' order by id DESC";
                                            $resultado = mysql_query($sql) or die('Erro ao selecionar nome: ' .mysql_error());
                                            while($row = mysql_fetch_array($resultado))
                                            {
                                                $selected = ($row['nome '] == $_POST['nome'])?'selected':'';
                                        ?>
                                        <option value="<?php echo $row['nome'];  ?>" <?php echo $selected; ?>>
                                        <?php echo $row['nome']; ?></option>
                                        <?php 
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="telefone">Telefone</label>
                                <div class="col-md-4">
                                <input id="assunto" name="telefone" type="text" placeholder="Digite" class="form-control input-md" required>
                                </div>
                            </div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" maxlength="50"  for="assunto">Num documento</label>
                                <div class="col-md-4">
                                    <input id="assunto" name="numdoc" type="text" placeholder="Digite" class="form-control input-md" required>
                                </div>
                            </div>            
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="atendimento">Tipo de documento</label>
                                <div class="col-md-4">
                                    <select class="form-control m-bot15" name="tipodoc" required>
                                        <option value=""></option>
                                        <option value="Empenho">Empenho</option>
                                        <option value="Memorando">Memorando</option>
                                        <option value="Nota fiscal">Nota fiscal</option>
                                        <option value="Processo">Processo</option>
                                        <option value="P.I">P.I</option>
                                        <option value="Outros">Outros</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" maxlength="50"  for="assunto">Data para entrega</label>
                                <div class="col-md-4">
                                    <input id="assunto" name="dtaprazo" type="date" placeholder="Digite" class="form-control input-md" required>
                                </div>
                                </div>
                            <div class="form-group" id="descricao">
                                <label class="col-md-4 control-label" for="descricao">Descrição adicional</label>
                                <div class="col-md-4">
                                    <textarea id="descricao" name="obs" style="resize:none" rows="5" placeholder="Descreva a demanda" class="form-control input-md"></textarea>
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