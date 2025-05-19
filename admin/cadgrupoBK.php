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
                <h2 class="title pull-left">Cadastro de Grupos<?php echo $nome_usuario ?></h2>
            </header>
            <div class="content-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <form class="form-horizontal" method="POST" id="" action="salvagrupo.php">
                            <div id="MsgSucesso" class="alert alert-success" style="text-align:center; display:none;" role="alert">Grupo cadastrado com sucesso!</div>
                            <div id="MsgErro" class="alert alert-danger" style="text-align:center; display:none;" role="alert">Erro ao cadastrar Grupo!</div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="nome">Nome do Grupo</label>
                                <div class="col-md-4">
                                    <input id="nome" name="nome" type="text" placeholder="Digite o nome do Grupo" class="form-control input-md" required>
                                </div>
                            </div>
                             <!-- Text input-->
                             <div class="form-group">
                                <label class="col-md-4 control-label" for="id_cmei">Unidades</label>
                                <div class="col-md-4">
                                    <select class="form-control m-bot15" name="id_cmei">
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
        <?php 
            
        
        
        echo "aqui" ?>



    </div>
</section>
</html>
<script type='text/javascript'>
    $(document).ready(function() {
        $('.mdb-select').materialSelect();
    });
</script>