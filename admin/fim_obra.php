<?php
   include "../validar_session.php";
   include "../Config/config_sistema.php";
   $id_solicitacao = $_REQUEST['id_solicitacao'];

   if (!isset($_SESSION)){
    session_start();
   }
   $email_usuario = $_SESSION['email_usuario'];
   $nome_usuario = $_SESSION['nome_usuario'];
   $nivel_usuario = $_SESSION['nivel_usuario'];
   $unidade_usuario = $_SESSION['unidade_usuario'];
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
        <!-- aqui termina o menu -->
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
    <div class="col-lg-12">
        <section class="box ">
         <!-- Dados do aluno-->
        <?php
        $id_solicitacao = $_REQUEST['id_solicitacao'];
        $consulta = mysql_query("SELECT * from solicitacao_servicos where id_solicitacao = $id_solicitacao ");
        while($linhas = mysql_fetch_object($consulta)) {
            $dt = $linhas->dia_solic;
            $dia = $linhas->dia_comeco;
            $diaf = $linhas->dia_fim;
            $dti = implode("/",array_reverse(explode("-",$dt)));
            $dtc = implode("/",array_reverse(explode("-",$dia)));
            $dtf = implode("/",array_reverse(explode("-",$diaf)));
        ?>
        <header class="panel_header">
           <h2 class="title pull-left">Dados do Chamado ou dos Pequenos Reparos</h2>
            </header>
            <div class="content-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <form class="form-horizontal" method="POST" id="alterObra" action = "salva_fim_obra.php">
                            <div class="form-row">
                                <!-- Text input-->
                                <input hidden id="idObra" name="id_solicitacao" type="text"  value="<?php echo $linhas->id_solicitacao?>">
                                <label class="col control-label" for="protocolo">Nº do protocolo</label>
                                <div class="col">
                                    <input id="protocolo" name="protocolo" type="text"  value="<?php echo $linhas->num_pedido?>" class="form-control input-md" readonly>
                                </div>
                                <!-- Text input-->
                                <label class="col control-label" for="categoria">Categoria</label>
                                <div class="col">
                                    <input id="categoria" name="categoria" type="text"  value="<?php echo $linhas->categoria?>" class="form-control input-md" readonly>
                                </div>
                                <!-- Select Basic -->
                                <label class="col control-label" for="status">Status</label>
                                <div class="col">
                                    <select id="status" name="status" class="form-control" required>
                                        <option value="Finalizado">DE:<?php echo $linhas->status_obra?> PARA Finalizado</option>
                                    </select>
                                </div>
                                <!-- Text input-->
                                <label class="col control-label" for="dia_solic">Data Aberto</label>
                                <div class="col">
                                    <input id="dia_solic" class="form-control input-md" type="text"  value="<?php echo $dti?>" readonly>
                                </div>
                                <!-- Text input-->
                                <label class="col control-label" for="dia_solic">Data Começo</label>
                                <div class="col">
                                    <input id="dia_solic" class="form-control input-md" type="text"  value="<?php echo $dtc?>" readonly>
                                </div>
                                <!-- Text input-->
                                <label class="col control-label" for="dia_solic">Data Fim</label>
                                <div class="col">
                                    <input id="dia_solic" class="form-control input-md" type="text"  value="<?php echo $dtf?>" readonly>
                                </div>
                                <!-- Text input-->
                                <label class="col control-label" for="field-1">Solicitante</label>
                                <div class="col">
                                    <input type="text" class="form-control" id="field-1" value="<?PHP echo $linhas->solicitante?>" readonly>
                                </div>
                                <!-- Text input-->
                                <label class="col control-label" for="field-1">Email</label>
                                <div class="controls">
                                    <input type="text" class="form-control" id="field-1" value="<?PHP echo $linhas->email?>" readonly>
                                </div>
                                <!-- Text input-->
                                <label for="unidade">Requerente</label>
                                <div class="controls">
                                    <input type="text" class="form-control" id="field-1" value="<?php echo $linhas->unidade?>" readonly>
                                </div>
                                <!-- Text input-->
                                <label for="tipo_servico">Tipo De Servico</label>
                                <div class="controls">
                                    <input type="text" class="form-control" id="field-1" value="<?php echo $linhas->tipo_servico?>" readonly>
                                </div>
                                <!-- Text input-->
                                <label for="local_sala">Local</label>
                                <div class="controls">
                                    <input type="text" class="form-control" id="field-1" value="<?php echo $linhas->local_sala?>" readonly>
                                </div>
                                <!-- Text input-->
                                <label for="material_disponivel">Local Possui Material</label>
                                <div class="controls">
                                    <input type="text" class="form-control" id="field-1" value="<?php echo $linhas->material_disponivel?>" readonly>
                                </div>
                                <!-- Text input-->
                                <label class="col control-label" for="field-1">Descriçaõ</label>
                                <div class="col">
                                    <input type="text" class="form-control" id="field-1" value="<?PHP echo $linhas->descricao_servico_txt?>" readonly>
                                </div>
                                <!-- Fechando while com dados do aluno-->
                             <?php
                             }
                           ?>
                                <div align ="center"><input type="submit" value="Salvar" name="salvar"  class='btn btn-primary' /></div>
                            </form>
                            <form class="form-horizontal" method="POST" id="PDF" action="comprovante_fim.php" enctype="multipart/form-data">
                                <!-- Pdf input-->
                                <label for="registro">Comprovante do Fim do Serviço</label>
                                <input hidden id="idObra" name="id_solicitacao" type="text"  value="<?php echo $id_solicitacao;?>">
                                <input type="file" name="arquivo" id="arquivo" required/>
                                <div align ="center"><input type="submit" value="Salvar" name="salvar" class='btn btn-primary' /></div>
                            </form>
                                <?php
                                    $search = "SELECT * FROM tbregistro INNER JOIN usuarios on tbregistro.tbregistro_usuario = usuarios.id WHERE tbregistro_id_solicitacao like '%".$id_solicitacao."%' ORDER BY tbregistro_id";
                                    $query  = mysql_query($search) or die(mysql_error());
                                ?>
                                <table class="table table-hover table-bordered display">
                                    <thead>
                                        <tr>
                                            <th>Dia</th>
                                            <th>Hora</th>
                                            <th>Registro</th>
                                            <th>Usuário</th>
                                        </tr>
                                    </thead>
                                <?php
                                    $t = 0;
                                    $i=0;
                                    while( $linha = mysql_fetch_assoc($query) )
                                    {
                                        $dia = $linha['dia_registro'];
                                        $data= implode("/",array_reverse(explode("-",$dia )));
                                        $t++;
                                   
                                        $style = ( $i % 2 == 0 )? "style='background:#eeeeee;'" : "style='background:#CCCCCC;'"
                                ?>
                                    <tbody>
                                        <tr>
                                            <td class="bg-primary text-white" align="center" colspan="5">
                                                <?php echo $t;?>&#867; Registro
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <?php echo $data?>
                                            </td>
                                            <td>
                                                <?php echo $linha['hora_registro'];?>
                                            </td>
                                            <td>
                                                <?php echo $linha['tbregistro_msg'];?>
                                            </td>
                                            <td>
                                                <?php echo $linha['nome'];?>
                                            </td>
                                        </tr>
                                    </tbody>
                                <?php
                                    }
                                ?>
                                </table>

                        
                    </div>
                </div>
            </div>
        </section>
    </div>
</section>

        </div>

</body>

</html>
