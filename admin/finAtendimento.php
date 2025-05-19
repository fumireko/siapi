<?php
   include "../validar_session.php";  
   include "../Config/config_sistema.php";
   $tb_atendimento_id = $_REQUEST['tb_atendimento_id'];   

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
        $consulta = mysql_query("SELECT * from tb_atendimento INNER JOIN tbcmei ON tb_atendimento.tb_atendimento_departamento = tbcmei.tbcmei_id where tb_atendimento_id = $tb_atendimento_id");
        while($linhas = mysql_fetch_object($consulta)) {
            $data = $linhas->tb_atendimento_dia;
            $dt = implode("/",array_reverse(explode("-",$data)));
            $style = ( $i % 2 == 0 )? "style='background:#eeeeee;'" : "style='background:#CCCCCC;'"
        ?>
        <header class="panel_header">
           <h2 class="title pull-left">Fechar Atendimento</h2>
            </header>
            <div class="content-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <tr> <td> <a id="gerarExcel" href="atendimento_gerarExcel.php?tb_atendimento_id=<?php echo $tb_atendimento_id?>" class="btn btn-primary">Gerar Relatório</a> </td></tr>
                        <form class="form-horizontal" method="POST" id="updateAtendimento" action = "updateAtendimento.php">
                                <!-- Text input-->
                            <div class="form-row">
                                <label class="col control-label" for="protocolo">Data</label>
                                <div class="col">
                                    <input hidden id="tb_atendimento_id" name="tb_atendimento_id" type="text"  value="<?php echo $linhas->tb_atendimento_id?>">
                                    <input hidden id="status" name="status" type="text"  value="Finalizado">
                                    <input id="protocolo" type="text"  value="<?php echo $dt;?>" class="form-control input-md" readonly>
                                </div>
                                <!-- Text input-->
                                <label class="col control-label" for="dia_solic">Hora</label>
                                <div class="col">
                                    <input id="dia_solic" class="form-control input-md" type="text"  value="<?php echo $linhas->tb_atendimento_hora?>" readonly>
                                </div>
                                <!-- Text input-->
                                <label class="col control-label" for="field-1">Requerente</label>                         
                                <div class="col">
                                    <input type="text" class="form-control" id="field-1" value="<?PHP echo $linhas->tb_atendimento_nome?>" readonly>
                                </div>
                                <!-- Text input-->
                                <label class="col control-label" for="field-1">Telefone</label> 
                                <div class="controls">
                                    <input type="text" class="form-control" id="field-1" value="<?PHP echo $linhas->tb_atendimento_telefone?>" readonly>
                                </div>
                                <!-- Text input-->
                                <label for="complexidade">Tipo de Atendimento</label>
                                <div class="controls">
                                    <input type="text" class="form-control" id="field-1" value="<?php echo $linhas->tb_atendimento_atendimento?>" readonly>                                
                                </div>
                                <!-- Text input-->
                                <label for="unidade">Assunto</label>
                                <div class="controls">
                                    <input type="text" class="form-control" id="field-1" value="<?php echo $linhas->tb_atendimento_assunto?>" readonly>
                                </div>
                                <!-- Text input-->
                                <label for="tipo_servico">Departamento</label>
                                <div class="controls">
                                    <input type="text" class="form-control" id="field-1" value="<?php echo $linhas->tbcmei_nome?>" readonly>
                                </div>
                                <!-- Text input-->
                                <label for="field-1">Descrição</label>                         
                                <div class="col">
                                    <input type="text" class="form-control" id="field-1" value="<?PHP echo $linhas->tb_atendimento_descricao?>" readonly>
                                </div>
                                <!-- Text input-->
                                <label for="field-1">Status</label>                         
                                <div class="col">
                                    <input type="text" class="form-control" id="field-1" value="<?PHP echo $linhas->tb_atendimento_status?>" readonly>
                                </div>
                                <!-- Text input-->
                                <label for="registro">Registro de situação do atendimento</label>
                                <div class="col">
                                    <textarea id="registro" name="registro" style="resize:none" rows="5" class="form-control input-md"></textarea>
                                </div>
                                <!-- Fechando while com dados do aluno-->
                             <?php
                             } 
                           ?>   
                            <div class="controls">
                                <div  align ="center">
                                <input type="submit" value="Salvar" name="salvar"  class='btn btn-primary' />
                                <?php
                                                $search = "SELECT * FROM tbregistro WHERE tbregistro_tb_atendimento_id like '%".$tb_atendimento_id."%' ORDER BY tbregistro_id";
                                                $query  = mysql_query($search) or die(mysql_error());
                                            ?>
                                            <table class="table table-hover table-bordered display">
                                                <thead>
                                                    <tr>
                                                        <th>Dia</th>
                                                        <th>Hora</th>
                                                        <th>Mensagem</th>
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
                                                </tr>
                                            </tbody>
                                            <?php
                                                }    
                                            ?>
                                            </table>
                                </div>
                            </div>   
                        </form>    
                    </div>
                </div>
            </div>
        </section>
    </div>
</section>
        
        </div>
        
</body>

</html>