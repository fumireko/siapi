<?php
include "../validar_session.php";  
include "../Config/config_sistema.php";
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-BR" lang="pt-BR" ng-app="App">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="author" content="Admin" />
    <title>SEMED - Sistema de Gestao Escolar</title>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="" name="description" />
    <meta content="" name="author" />
     <script src="js/app.js"></script>
    <body>
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
                <h2 class="title pull-left">Incluir na fila</h2>
            </header>
            <div class="content-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">    
                    
                        <div id="consulta">
                        <div class="row">
                            <div class="form-group  col-md-6">
                                <a id="gerarExcel" href="gerarExcel.php" class="btn btn-primary">Gerar Relatório</a>                           
                            </div>
                            <div class="row">
                            <div class="form-group  col-md-6">
                            <form class="form-horizontal" method="POST" id="busca_inc" action = "busca_inc.php">
                            <label class="col-md-4 control-label" for="dta_nasc">Data de nascimento</label>
                                <div class="col-md-4">
                                    <input id="dta_nasc" name="dta_nasc_busca" type="date" placeholder="Digite a data de nascimento" class="form-control input-md" required>
                                </div> 
                                <div class="col-md-4">
                                
                                <div align ="center"><input type="submit" value="Buscar" name="buscar"  class='btn btn-primary' /> </div>   
                                </div> 
                                </form>                        
                            </div>
                            <form class="form-horizontal" method="POST" id="dadosfila"   action="./#/dadosfila">
                        </div>
                            <br />
                            <?php
                                $sql = " SELECT * FROM tbaluno  ORDER BY tbaluno_id DESC LIMIT 10";
                                $qr  = mysql_query($sql) or die(mysql_error());
                            ?> 
                            <table class="table table-hover table-bordered display" id="example">
                                <thead>
                                    <tr>
                                        <th>Codigo</th>
                                        <th>Nome</th>
                                        <th>Nome da mãe</th>
                                        <th>Status</th>
                                        <th>Dt nasc</th>
                                        <th>Acão</th>
                                   </tr>
                                </thead>
                                <?php
                    
                                $i=0;
                                while( $ln = mysql_fetch_assoc($qr) )
                                {
                                  $i++;
                                  $data = $ln['tbaluno_dtnasc'];
                                  $id = $ln['tbaluno_id'];
                                  $dt = implode("/",array_reverse(explode("-",$data)));
                                  $style = ( $i % 2 == 0 )? "style='background:#eeeeee;'" : "style='background:#CCCCCC;'"
                                ?>
                                <tbody>
                                        <tr>
                                            <td><?php echo $id;?> </td>
                                            <td><?php echo $ln['tbaluno_nome'];?></td>
                                            <td><?php echo $ln['tbaluno_nmae'];?></td>
                                            <td><?php echo $ln['tbaluno_status'];?></td>
                                            <td><?php echo  $dt;?></td>
                                            <td><a href='dadosfila.php?tbaluno_id=<?php echo $id;?>' class='btn btn-primary'>Incluir</a></td>
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
</body>
</html>