<?php
include "../validar_session.php";  
include "../Config/config_sistema.php";
$tbaluno_id = $_REQUEST['tbaluno_id'];
$teste = 'teste';
echo $id_cmei;
//$consulta = mysql_query("SELECT * from tbaluno where tbaluno_id =$tbaluno_id ");
//while($linhas = mysql_fetch_object($consulta)) {
//$dtn = $linhas->tbaluno_dtnasc;
//$dtansc = implode("/",array_reverse(explode("-",$dtn)));
//}
//
?>
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
            <header class="panel_header">
                <h2 class="title pull-left">Dados do aluno</h2>
            </header>
            <div class="content-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div id="consulta">
                        <div class="row">
                            <div class="form-group  col-md-6">
                                <a id="gerarExcel" href="gerarExcel.php" class="btn btn-primary">Gerar Relatório -><?php echo $id_cmei;?></a>                           
                            </div>
                        </div>
                            <br />
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
                                 <tbody>
                                      <tr>
                                        <td><?php echo $id_cmei;?></td>
                                        <td>aqui</td>
                                        <td>aqui</td>
                                        <td>aqui</td>
                                        <td>aqui</td>
                                        <td><a href='#' class='btn btn-primary' target='_blank'>Incluir</a></td>
                                      </tr>
                                </tbody>
                                                            
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</section>