<?php
include "../Config/config_sistema.php";
header("Content-Type: text/html; charset=ISO-8859-1",true);
$resulttt = mysql_query("SELECT * from solicitacao_servicos") or die('Erro, query falhou');
$counttt = mysql_num_rows($resulttt);
$resultfin = mysql_query("SELECT * from solicitacao_servicos where id_status_servico = 3") or die('Erro, query falhou');
$countfin = mysql_num_rows($resultfin);
$resultand = mysql_query("SELECT * from solicitacao_servicos where id_status_servico = 2") or die('Erro, query falhou');
$countand = mysql_num_rows($resultand);
$resultpend = mysql_query("SELECT * from solicitacao_servicos where id_status_servico = 1") or die('Erro, query falhou');
$countpend = mysql_num_rows($resultpend);
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
                <h2 class="title pull-left">Acompanhamento de obras</h2>
            </header>
            <div class="content-body">
                <div class="row">
                    <div class="col-sm-5 col-md-3">
                        <div class="solicitacoes card">
                            <h3>Solicitacoes</h3>
                            <h2>
                                <?php
                                echo $counttt;
                            ?>
                            </h2>
                        </div>
                    </div>
                    <div class="col-sm-5 col-md-3">
                        <div class="finalizadas card">
                            <h3>Finalizadas</h3>
                            <h2>
                                <?php
                                echo $countfin;
                            ?>
                            </h2>
                        </div>
                    </div>
                    <div class="col-sm-5 col-md-3">
                        <div class="andamento card">
                            <h3>Andamento</h3>
                            <h2>
                                <?php
                                echo $countand;
                            ?>
                            </h2>
                        </div>
                    </div>
                    <div class="col-sm-5 col-md-3">
                        <div class="pendentes card">
                            <h3>Pendentes</h3>
                            <h2>
                                <?php
                                echo $countpend;
                            ?>
                            </h2>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <!-- Text input-->
                        <div class="form-group pull-right">
                            <div class="col-md-12">
                                <input id="pesquisa" name="pesquisa" type="text" placeholder="Pesquisar"
                                    class="form-control input-md">
                            </div>
                        </div>
                        <br>
                        <table id="example" class="table table-hover table-bordered display">
                            <thead>
                                <tr>
                                    <th scope="col">Numero do Pedido</th>
                                    <th scope="col">Unidade</th>
                                    <th scope="col">Solicitante</th>
                                    <th scope="col">E-mail</th>
                                    <th scope="col">Indicacao da Solicitacao</th>
                                    <th scope="col">Complexidade</th>
                                    <th scope="col">Tipo de Servico</th>
                                    <th scope="col">Descricao Servico</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Atualizar Status</th>
                                </tr>
                            </thead>
                            <?php
                            $query = "SELECT solicitacao_servicos.id_solicitacao,solicitacao_servicos.num_pedido, tbcmei.tbcmei_nome, solicitacao_servicos.solicitante, solicitacao_servicos.email, solicitacao_servicos.descricao_servico_txt, ind_solicitacao.descricao_ind, complexidade_servico.descricao_complexidade,tipo_servico.descricao_servico, status_servico.descricao_status, status_servico.id_status_servico 
                            FROM solicitacao_servicos
                            JOIN tbcmei ON solicitacao_servicos.id_unidade = tbcmei.tbcmei_id
                            JOIN ind_solicitacao ON solicitacao_servicos.id_ind_solicitacao = ind_solicitacao.id_ind_solicitacao 
                            JOIN complexidade_servico ON solicitacao_servicos.id_complexidade = complexidade_servico.id_complexidade 
                            JOIN tipo_servico ON solicitacao_servicos.id_tipo_servico = tipo_servico.id_tipo_servico 
                            JOIN status_servico ON solicitacao_servicos.id_status_servico = status_servico.id_status_servico";
                            $result = mysql_query($query) or die('Erro, query falhou');

                            if(mysql_num_rows($result) > 0){
                                while(list($id_solicitacao,$num_pedido, $tbcmei_nome, $solicitante, $email,$descricao_servico_txt, $descricao_ind_solitacao, $descricao_complexidade, $tipo_servico, $descricao_status, $id_status_servico) = mysql_fetch_array($result)){
                                    echo"<tbody id='myTable'>
                                            <tr>
                                                <td>$num_pedido</td>
                                                <td>$tbcmei_nome</td>
                                                <td>$solicitante</td>
                                                <td>$email</td>
                                                <td>$descricao_ind_solitacao</td>
                                                <td>$descricao_complexidade</td>
                                                <td>$tipo_servico</td>
                                                <td>$descricao_servico_txt</td>";
                                                if($id_status_servico == 1){
                                                    echo"<td><font color='red'>$descricao_status</font></td>
                                                    <td><a class='btn btn-warning' href='atualizarStatusSolicitacaoServico.php?id_solicitacao=$id_solicitacao&id_status_servico=$id_status_servico'>Em andamento</a></td>
                                                    </tr>
                                                    </tbody>";
                                                }
                                                else if($id_status_servico == 2){
                                                    echo"<td><font color='goldenrod'>$descricao_status</font></td>
                                                    <td><a class='btn btn-success' href='atualizarStatusSolicitacaoServico.php?id_solicitacao=$id_solicitacao&id_status_servico=$id_status_servico'>Finalizar</a></td>
                                                    </tr>
                                                    </tbody>";
                                                }if($id_status_servico == 3){
                                                    echo"<td><font color='green'>$descricao_status</font></td>
                                                    <td>Finalizado</td>
                                                    </tr>
                                                    </tbody>";
                                                }
                                }
                            }
                        ?>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
</section>