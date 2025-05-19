
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
            <h2 class="title pull-left">Inventário</h2>
                
    </header>
    <form class="form-horizontal" method="POST" id="formSolicitacao" action="sitem.php">
                               <!-- <fieldset>-->
                                    <div id="MsgSucesso" class="alert alert-success" style="text-align:center; display:none;"
                                        role="alert">Solicitacao feita com sucesso!</div>
                                    <div id="MsgErro" class="alert alert-danger" style="text-align:center; display:none;"
                                        role="alert">Erro ao realizar a solicitacao!</div>
                                    <!-- Text input-->
                                        <input id="unidade_usuario" name="unidade_usuario" type="text" value="<?php echo $tbcmei_nome;?>" hidden>
                                    <!-- Text input-->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="item">Informe o item que vai ser cadastrado:</label>
                                        <div class="col-md-7">
                                        <input class="form-control" list="item" name="item" required>
                                            <datalist id="item">
                                                <?php
                                                    $sql = "SELECT * FROM item order by id";
                                                    $resultado = mysql_query($sql) or die('Erro ao selecionar item: ' .mysql_error());
                                                    while($row = mysql_fetch_array($resultado))
                                                    {
                                                ?>
                                                <option value="<?php echo $row['item'];  ?>"> <?php echo $row['item']; ?> </option>
                                                <?php 
                                                    }
                                                ?>
                                            </datalist>
                                        </div>
                                    </div>
                                    <!-- Text input-->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="quantidade">Quantidade</label>
                                        <div class="col-md-4">
                                            <input id="quantidade" name="quantidade" type="number" min="1" placeholder="Informe a quantidade de items"
                                                class="form-control input-md" required>

                                        </div>
                                    </div>
                                    <!-- Text input-->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="estado">Informe o estado de conservação</label>
                                        <div class="col-md-4">
                                            <select name="estado" id="estado" onChange="substituicao(this.value);" required>
                                                <option value=""></option>
                                                <option value="Bom">Bom</option>
                                                <option value="Razoável">Razoável</option>
                                                <option value="Avariado">Avariado</option>
                                                <option value="PT">Perda Total</option>
                                            </select>
                                        </div>
                                    </div>                                        
                                    <!--Hidden input-->
                                    <div id="substituicao" name="descrição" style="display:none;">
                                        <!-- Text input-->
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="quantidade">Descreva integridade do bem</label>
                                            <div class="col-md-4">
                                                <input id="descrição" name="descrição" type="text" value="" placeholder="Informe em detalhe o defeito" class="form-control input-md">
                                                <div id="Razoável" name="Razoável" style="display:none;">
                                                    <small>ex. Liquidificador com alça estragada, cadeira com estafado rasgado, etc...</small><br>
                                                </div>
                                                <div id="Avariado" name="Avariado" style="display:none;">
                                                    <small>ex. Liquidificador com copo quebrado, cadeira sem assento, etc ...</small><br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Button -->
                                    <div class="form-group">
                                        <div align="center"><input type="submit" value="ENVIAR CADASTRO" name="salvar" /></div>
                                    </div>
                               <!-- </fieldset>-->
                            </form>
    </section> 
    </section>   
    </div>  
    </body>
    </html>
    

    <script>
        function substituicao(a)
        {
            var x = document.getElementById("Avariado");
            var y = document.getElementById("substituicao");
            var z = document.getElementById("Razoável");
            switch (a) {
                case 'Razoável':
                    x.style.display="none";
                    y.style.display="block";
                    z.style.display="block";
                    break;
                    
                case 'Avariado':
                    x.style.display="block";
                    y.style.display="block";
                    z.style.display="none";
                    break; 
                default:
                    x.style.display="none";
                    y.style.display="none";
                    z.style.display="none";
                    break;
            }
        }
    </script>
