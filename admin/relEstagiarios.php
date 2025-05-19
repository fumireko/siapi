<?php
include "../validar_session.php";  
include "../Config/config_sistema.php";

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
                <h2 class="title pull-left">Lista de Estagiários</h2>
            </header>
            <div class="content-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div id="consulta">
                        <div class="row">
                            <div class="form-group  col-md-6">
                                <a id="gerarExcel" href="gerarExcel.php" class="btn btn-primary">Gerar Relatório</a>                           
                            </div>
                        </div>
                            <br />
                            <?php
                                $sql = "SELECT tbestagiario.tbestagiario_id, tbestagiario.tbestagiario_nome, tbestagiario.tbestagiario_cpf, tbestagiario.tbestagiario_curso, tbunidade.descricao_unidade, status_estag.descricao_status
                                FROM tbestagiario 
                                JOIN status_estag ON status_estag.id_status = tbestagiario.tbestagiario_status
                                JOIN tbunidade ON tbunidade.id_unidade = tbestagiario.tbestagiario_unipref
                                ORDER BY tbestagiario.tbestagiario_nome";
                                $qr  = mysqli_query($conn,$sql) or die(mysqli_error());
                            ?> 
                            <table class="table table-hover table-bordered display" id="example">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>CPF</th>
                                        <th>Curso</th>
                                        <th>Unidade Preferencia</th>
                                        <th>Status</th>
                                        <th>Curriculo</th>
                                        <th>Editar Estagiario</th>
                                    </tr>
                                </thead>
                                <?php
                                if(mysqli_num_rows($qr) > 0){
                                    while(list($id_estag, $nme_estag, $cpf_estag, $curso_estag, $desc_unidade, $status_estag) = mysql_fetch_array($qr)){
                                        echo"<tbody>
                                                <tr>
                                                    <td>$nme_estag</td>
                                                    <td>$cpf_estag</td>
                                                    <td>$curso_estag</td>
                                                    <td>$desc_unidade</td>
                                                    <td>$status_estag</td>
                                                    <td>
                                                        <a href='gerarCurriculoEstagiario.php?id_estag=$id_estag' class='btn btn-primary' target='_blank'>Curriculo</a>
                                                    </td>
                                                    <td>
                                                        <a href='editarEstag.php?id_estag=$id_estag' class='btn btn-primary'>Editar</a>
                                                    </td>
                                                </tr>
                                            </tbody>";
                                    }
                                }    
                                ?>                                   
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</section>