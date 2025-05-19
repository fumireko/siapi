<?php
include "../Config/config_sistema.php";
header("Content-Type: text/html; charset=ISO-8859-1",true);
$result = mysql_query("SELECT tbcmei_id, tbcmei_nome FROM `tbcmei`") or die('Erro, query falhou');
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
                <h2 class="title pull-left">Solicitacao de servicos</h2>
            </header>
            <div class="content-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <form class="form-horizontal" method="POST" id="formSolicitacao" action="ssolicitacao.php">
                            <fieldset>
                                <div id="MsgSucesso" class="alert alert-success" style="text-align:center; display:none;"
                                    role="alert">Solicitacao feita com 
                                    sucesso!</div>
                                <div id="MsgErro" class="alert alert-danger" style="text-align:center; display:none;"
                                    role="alert">Erro ao realizar a solicitacao!</div>
                                <!-- Text input-->
                                <!-- Select Basic -->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="unidade_usuario">Unidade de Ensino</label>
                                    <div class="col-md-4">
                                        <select id="unidade_usuario" name="unidade_usuario" class="form-control"
                                            required>
                                            <option value="0">Selecionar</option>
                                            <?php while($option = mysql_fetch_array($result)) { ?>
                                            <option value="<?php echo $option['tbcmei_id'] ?>">
                                                <?php echo $option['tbcmei_nome'] ?>
                                            </option>
                                            <?php } ?>
                                        </select>
                                        <small>Caso o unidade de ensino nao apareca na lista siga ate a tela de
                                            cadastro de unidades e faca o cadastro.</small>
                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="local_servico">Local/Sala</label>
                                    <div class="col-md-4">
                                        <input id="local_servico" name="local_servico" id="local_servico" type="text"
                                            placeholder="Informe o ambiente para execução do serviço" class="form-control input-md"
                                            required>
                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="solicitante">Solicitante</label>
                                    <div class="col-md-4">
                                        <input id="solicitante" name="solicitante" type="text" placeholder="Informe a pessoa de contato"
                                            class="form-control input-md" required>

                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="email">E-mail</label>
                                    <div class="col-md-4">
                                        <input id="email" name="email" type="text" placeholder="Informe o e-mail para confirmação"
                                            class="form-control input-md" required>
                                    </div>
                                </div>

                                <!-- Select Basic -->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="indicacao_solicitacao">Indicacao da
                                        Solicitacao</label>
                                    <div class="col-md-4">
                                        <select id="indicacao_solicitacao" name="indicacao_solicitacao" class="form-control"
                                            required>
                                            <option value="0">Selecionar</option>
                                            <option value="1">Inicial (primeira solicitacao)</option>
                                            <option value="2">Reforco de solicitacao (para servicos ja solicitados, mas
                                                nao executados)</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Select Basic -->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="complexidade">Complexidade</label>
                                    <div class="col-md-4">
                                        <select id="complexidade" name="complexidade" class="form-control" required>
                                            <option value="0">Selecionar</option>
                                            <option value="1">Baixa (melhoria para o local, nao sendo necessaria
                                                execucao imediata)</option>
                                            <option value="2">Media (apresenta dificuldade para o funcionamento da
                                                unidade)</option>
                                            <option value="3">Alta (apresenta risco a seguranca ou impossibilidade de
                                                funcionamento da unidade)</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Select Basic -->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="tipo_servico">Tipo de Servico</label>
                                    <div class="col-md-4">
                                        <select id="tipo_servico" name="tipo_servico" class="form-control" onchange="habilitaCampos(this.value);"
                                            required>
                                            <option value="0">Selecionar</option>
                                            <option value="1">Construcao (pedreiro)</option>
                                            <option value="2">Hidraulica (encanador)</option>
                                            <option value="3">Eletrica</option>
                                            <option value="4">Marcenaria / Carpintaria</option>
                                            <option value="5">Pintura</option>
                                            <option value="6">Serralheria</option>
                                            <option value="7">Vidracaria</option>
                                            <option value="8">Chaveiro</option>
                                            <option value="9">Rocada</option>
                                            <option value="10">Retirada de entulhos/calicas</option>
                                            <option value="11">Telefonia e Alarmes (somente fiacao interna)</option>
                                            <option value="12">Distribuicao (areia / pedrisco / saibro / grama)</option>
                                            <option value="13">Materiais de construcao (sem mao de obra)</option>
                                            <option value="14">Dedetizacao</option>
                                            <option value="15">Desratizacao</option>
                                            <option value="16">Limpeza de caixa d'agua</option>
                                            <option value="17">Esgotamento de fossa</option>
                                            <option value="18">Outro</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="form-group" id="campo_outro" style="display: none;">
                                    <label class="col-md-4 control-label" for="outro_servico">Outro</label>
                                    <div class="col-md-4">
                                        <input id="outro_servico" name="outro_servico" type="text" placeholder="Outro tipo de serviço"
                                            class="form-control input-md">
                                    </div>
                                </div>
                                <!-- Select Basic -->
                                <div class="form-group" style="display: none;" id="tipo_servico_fossa">
                                    <label class="col-md-4 control-label" for="tipo_servico_fossa">Tipo de
                                        Servico(Esgotamento de fossa)</label>
                                    <div class="col-md-4">
                                        <select id="tipo_servico_fossa" name="tipo_servico_fossa" class="form-control">
                                            <option value="0">Selecionar</option>
                                            <option value="1">Hidrojateamento (desentupimento) - somente para canos de
                                                100mm externos</option>
                                            <option value="2">Coleta (esgotamento)</option>
                                            <option value="3">Desobstrucao (desentupir sanitários)</option>
                                            <option value="4">Desobstrucao (desentupir caixas de gordura)</option>
                                            <option value="5">Desobstrucao (desentupir ralos)</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="form-group" id="descricao_servico">
                                    <label class="col-md-4 control-label" for="descricao_servico">Descricao do Servico</label>
                                    <div class="col-md-4">
                                        <textarea id="descricao_servico" name="descricao_servico" style="resize:none"
                                            rows="5" placeholder="Descreva que tipo de manutenção necessita" class="form-control input-md"></textarea>
                                    </div>
                                </div>
                                <!-- Select Basic -->
                                <div class="form-group" id="qtd_caixas" style="display: none;">
                                    <label class="col-md-4 control-label" for="qtd_caixas">Quantidade de caixas</label>
                                    <div class="col-md-4">
                                        <select id="qtd_caixas" name="qtd_caixas" class="form-control">
                                            <option value="0">Selecionar</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="form-group" id="tmnho_caixas" style="display: none;">
                                    <label class="col-md-4 control-label" for="tmnho_caixas">Tamanho das Caixas</label>
                                    <div class="col-md-4">
                                        <input id="tmnho_caixas" name="tmnho_caixas" type="text" placeholder="Informe quantos litros"
                                            class="form-control input-md">
                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="form-group" id="dta_ult_limpeza" style="display: none;">
                                    <label class="col-md-4 control-label" for="dta_ult_limpeza">Data da ultima limpeza</label>
                                    <div class="col-md-4">
                                        <input id="dta_ult_limpeza" name="dta_ult_limpeza" type="date" class="form-control input-md">
                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="form-group" id="descricao_material" style="display: none;">
                                    <label class="col-md-4 control-label" for="descricao_material">Descricao do
                                        Material</label>
                                    <div class="col-md-4">
                                        <textarea id="descricao_material" name="descricao_material" style="resize:none"
                                            rows="5" placeholder="Descreva a quantidade e quais materiais necessita"
                                            class="form-control input-md"></textarea>
                                    </div>
                                </div>
                                <!-- Select Basic -->
                                <div class="form-group" id="material_disponivel">
                                    <label class="col-md-4 control-label" for="material_disponivel">A unidade de ensino
                                        disponibilizara material proprio?</label>
                                    <div class="col-md-4">
                                        <select id="material_disponivel" name="material_disponivel" class="form-control">
                                            <option value="0">Selecionar</option>
                                            <option value="1">Sim</option>
                                            <option value="2">Nao</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="form-group" style="display: none;" id="tipo_inseto">
                                    <label class="col-md-4 control-label" for="tipo_inseto">Tipo de Inseto</label>
                                    <div class="col-md-4">
                                        <input id="tipo_inseto" name="tipo_inseto" type="text" placeholder="Ex.: Barata, aranha, mosquitos, besouros, abelhas/vespas e etc."
                                            class="form-control input-md">
                                        <span><small>Este servico nao e valido para cobras e pombos.</small></span>
                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="form-group" style="display: none;" id="metragem">
                                    <label class="col-md-4 control-label" for="metragem">Metragem</label>
                                    <div class="col-md-4">
                                        <input id="metragem" name="metragem" type="text" placeholder="Informe a metragem da área construída"
                                            class="form-control input-md">
                                    </div>
                                </div>
                                <!-- Button -->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="btn_solitacao"></label>
                                    <div class="col-md-4">
                                        <button id="btn_solitacao" name="btn_solitacao" class="btn btn-primary pull-right">Solicitar</button>
                                        <button type="submit" class="btn btn-primary pull-right" disabled id="btnAguarde"
                                            style="padding:0 25px 0 25px;height:2.5rem; color:black; display: none">Aguarde
                                            <i class="fa fa-spinner fa-spin"></i></button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</section>