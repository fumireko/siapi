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
        $id = $_REQUEST['id'];
        $consulta = mysql_query("SELECT * from compra where id = $id ");
        while($linhas = mysql_fetch_object($consulta)) {
            $etapa = $linhas->estagio;
            $dti = implode("/",array_reverse(explode("-",$dt)));
        ?>
        <header class="panel_header">
           <h2 class="title pull-left">Requisição</h2>
            </header>
            <div class="content-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <tr> <td> <a id="gerarExcel" href="imp_compra.php?id=<?php echo $id?>" class="btn btn-primary">Gerar Relatório</a> </td></tr>
                        <form class="form-horizontal" method="POST" id="registro_compra" action = "registro_compra.php">
                                <!-- Text input-->
                                <label class="col control-label" for="protocolo">Requisição Nº</label>
                                <div class="col">
                                    <input hidden id="idCompra" name="id" type="text"  value="<?php echo $linhas->id?>">
                                    <input id="protocolo" name="protocolo" type="text"  value="<?php echo $linhas->id_pedido?>/<?php echo $linhas->ano_pedido?>"  class="form-control input-md" readonly>
                                </div>
                                 <!-- Text input-->
                                 <label class="col control-label" for="protocolo">Etapa</label>
                                <div class="col">
                                    <input id="item" value="<?php echo $linhas->estagio?>"  class="form-control input-md" readonly>
                                </div>
                                <!-- Text input-->
                                <label class="col control-label" for="protocolo">Item</label>
                                <div class="col">
                                    <input id="item" value="<?php echo $linhas->item?>"  class="form-control input-md" readonly>
                                </div>
                                <!-- Text input-->
                                <label class="col control-label" for="protocolo">Quantidade</label>
                                <div class="col">
                                    <input id="item" value="<?php echo $linhas->quantidade?>"  class="form-control input-md" readonly>
                                </div>
                                <!-- Text input-->
                                <label class="col control-label" for="protocolo">Justificativa</label>
                                <div class="col">
                                    <input id="item" value="<?php echo $linhas->justificativa?>"  class="form-control input-md" readonly>
                                </div>
                                <!-- Text input-->
                                <label class="col control-label" for="protocolo">Unidade</label>
                                <div class="col">
                                    <input id="item" value="<?php echo $linhas->unidade_usuario?>"  class="form-control input-md" readonly>
                                </div>
                                <!-- Text input-->
                                <label class="col control-label" for="protocolo">Substituição ou compra de novo:</label>
                                <div class="col">
                                    <input id="item" value="<?php echo $linhas->ação?>"  class="form-control input-md" readonly>
                                </div>
                                <!-- Text input-->
                                <label class="col control-label" for="protocolo">Substituição?</label>
                                <div class="col">
                                    <input id="item" value="<?php echo $linhas->substitui?>"  class="form-control input-md" readonly>
                                </div>
                                <!-- Text input-->
                                <label class="col control-label" for="protocolo">Já Solicitou</label>
                                <div class="col">
                                    <input id="item" value="<?php echo $linhas->solicitacao?>"  class="form-control input-md" readonly>
                                </div>
                                <!-- Text input-->
                                <label for="registro">Registro da Compra Nº<?php echo $linhas->id_pedido?>/<?php echo $linhas->ano_pedido?></label>
                                <div class="col">
                                    <textarea id="registro" name="registro" style="resize:none" rows="5" class="form-control input-md"></textarea>
                                </div>
                                <!-- Fechando while com dados do aluno-->
                             <?php
                             } 
                           ?>   
                                <?php
                                switch ($etapa){
                                    case 'Finalizado':
                                        
                                    break;
                                    case 'Arquivado':
                                        
                                    break;
                                    default:
                                        echo "<div align ='center'><input type='submit' value='Salvar' name='salvar'  class='btn btn-primary' /></div>";
                                    break;
                                }
                            ?>

                                <?php
                                    $search = "SELECT * FROM tbregistro INNER JOIN usuarios on tbregistro.tbregistro_usuario = usuarios.id WHERE tbregistro_compra_id like '%".$id."%' ORDER BY tbregistro_id";
                                    $query  = mysql_query($search) or die(mysql_error());
                                ?>
                                <table class="table table-hover table-bordered display">
                                    <thead>
                                        <tr>
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