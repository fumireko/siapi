<?php
include "../Config/config_sistema.php";
header("Content-Type: text/html; charset=ISO-8859-1",true);
$id_solicitacao = $_GET['id_solicitacao'];
$queryAtt = "UPDATE solicitacao_servico SET id_status_servico = value1, column2 = value2 WHERE condition;"
?>
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
                <h2 class="title pull-left">Detalhamento Solicitacao de Servico</h2>
            </header>
            <div class="content-body">
                <div class="detalhes_servico">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <?php
                            $query = "SELECT tbcmei.tbcmei_nome, solicitacao_servicos.solicitante, solicitacao_servicos.email, ind_solicitacao.descricao_ind, complexidade_servico.descricao_complexidade,tipo_servico.descricao_servico, status_servico.descricao_status FROM solicitacao_servicos JOIN tbcmei ON solicitacao_servicos.id_unidade = tbcmei.tbcmcei_id JOIN ind_solicitacao ON solicitacao_servicos.id_ind_solicitacao = ind_solicitacao.id_ind_solicitacao JOIN complexidade_servico ON solicitacao_servicos.id_complexidade = complexidade_servico.id_complexidade JOIN tipo_servico ON solicitacao_servicos.id_tipo_servico = tipo_servico.id_tipo_servico JOIN status_servico ON solicitacao_servicos.id_status_servico = status_servico.id_status_servico where id_solicitacao = 1";
                            $result = mysql_query($query) or die('Erro, query falhou');

                            if(mysql_num_rows($result) > 0){
                                while(list($tbcmei_nome, $solicitante, $email, $descricao_ind_solitacao, $descricao_complexidade, $tipo_servico, $descricao_status) = mysql_fetch_array($result)){
                                    echo"
                                    <form class='form-horizontal' action='detalhesSolicitacaoServico.php'>
                                    <div class='form-group'>
                                        <label class='col-md-2 control-label' for='unidade_solicitante'>Unidade Solicitante</label>
                                        <div class='col-md-3'>
                                            <input id='unidade_solicitante' name='unidade_solicitante' type='text' placeholder='$tbcmei_nome'
                                                class='form-control input-md input_detalhes' disabled>
                                        </div>
                                    </div>
                                    <div class='form-group'>
                                        <label class='col-md-2 control-label' for='solicitante'>Solicitante</label>
                                        <div class='col-md-3'>
                                            <input id='unidade_solicitante' name='solicitante' type='text' placeholder='$solicitante'
                                                class='form-control input-md input_detalhes' disabled>
                                        </div>
                                    </div>
                                    <div class='form-group'>
                                        <label class='col-md-2 control-label' for='email'>E-mail</label>
                                        <div class='col-md-3'>
                                            <input id='email' name='email' type='text' placeholder='$email'
                                                class='form-control input-md input_detalhes' disabled>
                                        </div>
                                    </div>
                                    <div class='form-group'>
                                        <label class='col-md-2 control-label' for='ind_solicitacao'>Indicacao Solicitacao</label>
                                        <div class='col-md-3'>
                                            <input id='ind_solicitacao' name='ind_solicitacao' type='text' placeholder='$descricao_ind_solitacao'
                                                class='form-control input-md input_detalhes' disabled>
                                        </div>
                                    </div>
                                    <div class='form-group'>
                                        <label class='col-md-2 control-label' for='complexidade'>Complexidade</label>
                                        <div class='col-md-5'>
                                            <input id='complexidade' name='complexidade' type='text' placeholder='$descricao_complexidade'
                                                class='form-control input-md input_detalhes' disabled>
                                        </div>
                                    </div>
                                    <div class='form-group'>
                                        <label class='col-md-2 control-label' for='tipo_servico'>Tipo de Servico</label>
                                        <div class='col-md-3'>
                                            <input id='tipo_servico' name='tipo_servico' type='text' placeholder='$tipo_servico'
                                                class='form-control input-md input_detalhes' disabled>
                                        </div>
                                    </div>
                                    <div class='form-group'>
                                        <label class='col-md-2 control-label' for='descricao_status'>Status</label>
                                        <div class='col-md-3'>
                                            <input id='descricao_status' name='descricao_status' type='text' placeholder='$descricao_status'
                                                class='form-control input-md input_detalhes' disabled>
                                        </div>
                                    </div>
                                    <div class='form-group'>
                                        <label class='col-md-2 control-label' for='descricao_status'>Descricao Servico</label>
                                        <div class='col-md-5'>
                                            <textarea  id='descricao_status' rows='6' name='descricao_status' style='resize:none' placeholder='$descricao_status'
                                                class='form-control input-md input_detalhes' disabled></textarea>
                                        </div>
                                    </div>
                                    <div class='form-group'>
                                        <label class='col-md-2 control-label' for='atualizar_status'>Atualizar Status</label>
                                        <div class='col-md-3 select_status'>
                                            <select id='atualizar_status'  name='atualizar_status' class='form-control'>
                                                <option value='1'>Nao iniciado</option>
                                                <option value='2'>Em andamento</option>
                                                <option value='3'>Finalizado</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Button -->
                                    <div class='form-group'>
                                        <label class='col-md-4 control-label' for='btn_atualizar'></label>
                                        <div class='col-md-4'>
                                            <button id='btn_atualizar' name='btn_atualizar' class='btn btn-primary pull-right'>Atualizar Status</button>
                                        </div>
                                    </div>
                                    </form>";
                                }
                            }
                        ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</section>