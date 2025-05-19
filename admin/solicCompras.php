    <?php
    include "../validar_session.php";  
    include "../Config/config_sistema.php";
    if (!isset($_SESSION)){
        session_start();
    }
    $tbcmei_nome = $_SESSION['tbcmei_nome'];
    ?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-BR" lang="pt-BR" ng-app="App">
    <head>
        <meta name="author" content="Admin" />
        <title>SEMED - Sistema de Gestao Escolar</title>
    <style>
            @import url('https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300');
        .titulos{
            font-size: 2rem;
            font-family: 'Open Sans Condensed', sans-serif;
            color: rgba(31, 181, 172, 1.0);
            text-align: center;
        }
        .titulos:after, .titulos:before {
            content: '';
            display: block;
            width: 80px;
            height: 3px;
            background: rgba(31, 181, 172, 1.0);
            margin: auto;
        }
        </style>  
    </head>
    <!-- BEGIN BODY -->
    <body>
        <!-- aqui começa o menu -->
        <!-- START TOPBAR -->
        <?php 
        include "index.php"
        ?> 
        <?php
    include "../Config/config_sistema.php";
    header("Content-Type: text/html; charset=ISO-8859-1",true);
    $result = mysql_query("SELECT tbcmei_id, tbcmei_nome FROM `tbcmei` WHERE interno != 'sim'") or die('Erro, query falhou');
    ?>
        <div id="main-content">

    <section class="wrapper main-wrapper">
    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
    <div class="page-title">
        <div class="pull-left">
            <h1 class="title">Sistema de Gestao Escolar</h1>
        </div>
    </div>
    </div>
    <div class="clearfix"></div>

    <section class="box ">
    <header class="panel_header">
            <h2 class="title pull-left">Solicitação de Requisições</h2>
                
    </header>
    <form class="form-horizontal" method="POST" id="formSolicitacao" action="scompra.php">
                                <fieldset>
                                    <div id="MsgSucesso" class="alert alert-success" style="text-align:center; display:none;"
                                        role="alert">Solicitacao feita com sucesso!</div>
                                    <div id="MsgErro" class="alert alert-danger" style="text-align:center; display:none;"
                                        role="alert">Erro ao realizar a solicitacao!</div>
                                    <!-- Text input-->
                                        <input id="unidade_usuario" name="unidade_usuario" type="text" value="<?php echo $tbcmei_nome;?>" hidden>
                                    <!-- Text input-->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="objeto">Informe o item que necessita:</label>
                                        <div class="col-md-4">
                                            <input id="objeto" name="objeto" id="objeto" type="text"
                                                placeholder="Informe o objeto que precisa" class="form-control input-md"
                                                required>
                                        </div>
                                    </div>
                                    <!-- Text input-->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="quantidade">Quantidade</label>
                                        <div class="col-md-4">
                                            <input id="quantidade" name="quantidade" type="number" min="1" placeholder="Informe a quantidade que precisa"
                                                class="form-control input-md" required>

                                        </div>
                                    </div>
                                <!-- Text input-->
                                <div class="form-group" id="justificativa">
                                        <label class="col-md-4 control-label" for="justificativa">Justificativa</label>
                                        <div class="col-md-4">
                                            <textarea id="justificativa" name="justificativa" style="resize:none"
                                                rows="5" placeholder="DISCORRA DETALHADAMENTE A JUSTIFICATIVA DA SOLICITAÇÃO" class="form-control input-md"></textarea>
                                        </div>
                                    </div>
                                    <!-- Text input-->
                                <div class="form-group">
                                        <label class="col-md-4 control-label" for="acao">Novo item ou substituição</label>
                                        <div class="col-md-4">
                                            <select name="acao" id="acao" onChange="substituicao(this.value);" required>
                                                <option value=""></option>
                                                <option value="novo">Novo</option>
                                                <option value="substituição">Substituição</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Text input-->
                                    <div id="substituicao" name="substituicao" style="display:none;">
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="substitui">A unidade já solicitou a retirada dos itens a serem substituidos?</label>
                                            <div class="col-md-4">
                                                <select name="solicitacao" id="solicitacao">
                                                        <option value=""></option>
                                                        <option value="sim">sim</option>
                                                        <option value="não">não</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="substitui">Qual o motivo da substituição?</label>
                                            <div class="col-md-4">
                                                <textarea id="substitui" name="substitui" style="resize:none" rows="5" placeholder="Qual o motivo da substituição?" class="form-control input-md" value=""></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Button -->
                                    <div class="form-group">
                                    <div align="center"><input type="submit" value="ENVIAR CADASTRO" name="salvar" /></div>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
    </section> 
    </section>   
    </div>
    </body>

    </html>

    <script>
        function substituicao(a)
        {
            if(a =='substituição'){
                return document.getElementById("substituicao").style.display="block";
            }
            else{
                return document.getElementById("substituicao").style.display="none";
            }
        }
    </script>