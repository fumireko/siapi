
<?php
 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-BR" lang="pt-BR" ng-app="App">


<head>
    <meta name="author" content="Admin" />
    <title>Cadastro de Curriculo</title>
    <!-- 
         * @Package: Ultra Admin - Responsive Theme
         * @Subpackage: Bootstrap
         * @Version: 4.1
         * This file is part of Ultra Admin Theme.
        -->
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="css/semed.css">

    <!-- CORE CSS FRAMEWORK - START -->
    <link href="assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/fonts/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/animate.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" type="text/css" />
    <!-- CORE CSS FRAMEWORK - END -->

    <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START -->
    <link href="assets/plugins/datatables/css/jquery.dataTables.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="assets/plugins/datatables/extensions/TableTools/css/dataTables.tableTools.min.css" rel="stylesheet"
        type="text/css" media="screen" />
    <link href="assets/plugins/datatables/extensions/Responsive/css/dataTables.responsive.css" rel="stylesheet" type="text/css"
        media="screen" />
    <link href="assets/plugins/datatables/extensions/Responsive/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet"
        type="text/css" media="screen" /> <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END -->

    <!-- CORE CSS TEMPLATE - START -->
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
    <!-- CORE CSS TEMPLATE - END -->

    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
        crossorigin="anonymous">

    <!-- ANGULAR -->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.25/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.25/angular-route.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- JS -->
    <script src="js/app.js"></script>
    <script src="js/habilitaCampos.js" ></script>
    <script src="js/salvarSolicitacaoServico.js" ></script>
    <script src="js/alterarSenhaUsuario.js" ></script>
    <script src="js/salvarUsuario.js" ></script>
    <script src="js/salvarUnidade.js" ></script>
    <script src="js/editarEstag.js" ></script>

    
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
    <!-- START TOPBAR -->
    <div class='page-topbar '>
        <div class='logo-area'>
        </div>
    </div>
    <!-- END TOPBAR -->
    <!-- START CONTAINER -->
    <div class="page-container row-fluid">
        <!-- SIDEBAR - START -->
        <div class="page-sidebar">
            <!-- MAIN MENU - START -->
            <div class="page-sidebar-wrapper menu" id="main-menu-wrapper">
                <!-- USER INFO - START -->
                <div class="profile-info row">
                    <div class="profile-details col-md-12 col-sm-12 col-xs-12">
                        <h4 class="usuario_logado">
                            Bem-Vindo,
                            <?php //echo $nome_usuario;?>
                        </h4>
                    </div>
                </div>
                <!-- USER INFO - END -->
                <ul class="wraplist">
                    <li class=''> <a><i class="fas fa-user"></i> <span class='title'>Perfil</span>
                            <span class='arrow '></span> </a>
                        <ul class='sub-menu'>
                            <li> <a href='../index.php'> <span class='title'>Acessar o Sistema</span></a>
                            </li>
                        </ul>
                    </li>
              
             
                <li class=""> <a> <i class="fas fa-sitemap"></i> <span class="title">Organizacional</span>
                        <span class="arrow "></span> </a>
                    <ul class="sub-menu">
                        <li> <a href="../admin/#organograma"> <span class="title">Organograma</span>
                            </a>
                        </li>
                        <li> <a href="../admin/#sistemaOrganiz"> <span class="title">Sistema</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="" href="../logout.php"><i class="fas fa-sign-out-alt"></i><span class="title">Sair</span></a>
                </li>
                </ul>
            </div>
        </div>
        <!-- MAIN MENU - END -->
        <!--  SIDEBAR - END -->
        <!-- START CONTENT -->
        <div id="main-content">
        <section class="wrapper main-wrapper">
    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
        <div class="page-title">
            <div class="pull-left">
                <h1 class="title">Sistema de Cadastro de Curriculo</h1>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="col-lg-12">
        <section class="box ">
            <header class="panel_header">
                <h2 class="title pull-left">Dados de Horarios e Locais</h2>
            </header>
            <div class="content-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <form class="form-horizontal" method="POST" id="formEditEstagiario" action="salvarest.php">
                            <fieldset>
                                <div id="MsgSucesso" class="alert alert-success" style="text-align:center; display:none;"
                                    role="alert">Salvo com sucesso!</div>
                                <div id="MsgErro" class="alert alert-danger" style="text-align:center; display:none;"
                                    role="alert">Erro ao editar as informacoes!</div>
                                <input type="hidden" id="id_estag" name="id_estag" value="">    
                              
                                <div class="form-row">
                                    <div class="form-group">
                                        <label class="col control-label" for="unidade_preferencia">Área de  Preferencia</label>
                                        <div class="col">
                                            <select id="unidade_preferencia" name="unidade_preferencia" class="form-control">
                                                <option value="0" >Selecionar</option>
                                                <option value="1" >CMEI </option>
                                                <option value="2" >Escolas Municipais</option>
                                                 <option value="4" >Saude</option>
                                                 <option value="5" >Administrativo</option>
                                                 <option value="6" >Informatica</option>
                                                 <option value="7" >Ambiental</option>
                                                <option value="3" >Indiferente</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col control-label" for="turno_preferencia">Turno de preferencia</label>
                                        <div class="col">
                                            <select id="turno_preferencia" name="turno_preferencia" class="form-control">
                                                <option value="0" >Selecionar</option>
                                                <option value="1" >Manha</option>
                                                <option value="2" >Tarde</option>
                                                <option value="3" >Indiferente</option>
                                            </select>
                                        </div>
                                    </div>
                                
                                <div class="form-group">
                                        <label class="col control-label" for="turno_preferencia">Observação</label>
                                        <div class="col">
                                           <input id="obs1_estag" name="obs1_estag" type="text" value="" placeholder="Observaçoes"   
                                         class="form-control input-md">
                                                  </div>
                                    </div>
                                
                                
                                
                                </div>
                                <!-- Select Basic -->

                                <h1 class="titulos">Dados Pessoais</h1>
                                <!-- Text input-->
                                <div class="form-row">
                                    <div class="form-group col">
                                        <label class="col control-label" for="cpf_estag">CPF</label>
                                        <div class="col">
                                            <input id="cpf_estag" name="cpf_estag" type="text" value="" placeholder="Informe o CPF do estagiário"
                                                class="form-control input-md">
                                        </div>
                                    </div>
                                    <!-- Text input-->
                                    <div class="form-group col">
                                        <label class="col control-label" for="nome_estag">Nome</label>
                                        <div class="col">
                                            <input id="nome_estag" name="nome_estag" type="text" value="" placeholder="Informe o nome do estagiário"
                                                class="form-control input-md">
                                        </div>
                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="form-row">
                                    <div class="form-group col">
                                        <label class="col control-label" for="nasc_estag">Data de Nascimento</label>
                                        <div class="col">
                                            <input id="nasc_estag" name="nasc_estag" type="date" value="" placeholder="Informe a data de nascimento do estagiário"
                                                class="form-control input-md">
                                        </div>
                                    </div>
                                    <!-- Text input-->
                                    <div class="form-group col">
                                        <label class="col control-label" for="email_estag">E-mail</label>
                                        <div class="col">
                                            <input id="email_estag" name="email_estag" type="mail" value="" placeholder="Informe o e-mail do estagiário"
                                                class="form-control input-md">
                                        </div>
                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="form-row">
                                    <div class="form-group col">
                                        <label class="col control-label" for="end_estag">Endereco</label>
                                        <div class="col">
                                            <input id="end_estag" name="end_estag" type="text" value="" placeholder="Informe o endereço do estagiário"
                                                class="form-control input-md">
                                        </div>
                                    </div>
                                    <!-- Text input-->
                                    <div class="form-group col">
                                        <label class="col control-label" for="bairro_estag">Bairro</label>
                                        <div class="col">
                                            <input id="bairro_estag" name="bairro_estag" type="text" value="" placeholder="Informe o bairro do estagiário"
                                                class="form-control input-md">
                                        </div>
                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="form-row">
                                    <div class="form-group col">
                                        <label class="colcontrol-label" for="cidade_estag">Cidade</label>
                                        <div class="col">
                                            <input id="cidade_estag" name="cidade_estag" type="text" value="" placeholder="Informe a cidade do estagiário"
                                                class="form-control input-md">
                                        </div>
                                    </div>
                                    <!-- Text input-->
                                    <div class="form-group col">
                                        <label class="col control-label" for="fixo_estag">Telefone Fixo</label>
                                        <div class="col">
                                            <input id="fixo_estag" name="fixo_estag" type="text" value="" placeholder="Informe o telefone fixo do estagiário"
                                                class="form-control input-md">
                                        </div>
                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="form-row">
                                    <div class="form-group col">
                                        <label class="col control-label" for="cel_estag">Celular</label>
                                        <div class="col">
                                            <input id="cel_estag" name="cel_estag" type="tel" value="" placeholder="Informe o celular do estagiário"
                                                class="form-control input-md">
                                        </div>
                                    </div>
                                    <!-- Text input-->
                                    <div class="form-group col">
                                        <label class="col control-label" for="recado_estag">Telefone de recados</label>
                                        <div class="col">
                                            <input id="recado_estag" name="recado_estag" type="text" value="" placeholder="Informe o telefone para recado do estagiário"
                                                class="form-control input-md">
                                        </div>
                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="form-row">
                                    <div class="form-group col-6">
                                        <label class="col control-label" for="falar_com_estag">Falar com</label>
                                        <div class="col">
                                            <input id="falar_com_estag" name="falar_com_estag" type="text" value="" placeholder="Informe a pessoa para recado do estagiário"
                                                class="form-control input-md">
                                        </div>
                                    </div>
                                </div>
                                <h1 class="titulos">Formacao</h1>
                                <!-- Text input-->
                                <div class="form-row">
                                    <div class="form-group col">
                                        <label class="col control-label" for="inst_ens_estag">Instituicao de Ensino</label>
                                        <div class="col">
                                            <input id="inst_ens_estag" name="inst_ens_estag" type="text" value="" placeholder="Informe a instituição de ensino do estagiário"
                                                class="form-control input-md">
                                        </div>
                                    </div>
                                    <!-- Select Basic -->
                                    <div class="form-group col">
                                        <label class="col control-label" for="nvl_estag">Nivel</label>
                                        <div class="col">
                                            <select id="nvl_estag" name="nvl_estag" onchange="habilitaCamposNivel(this.value)"
                                                class="form-control">
                                                <option value="0" >Selecionar</option>
                                                <option value="1" >Medio</option>
                                                <option value="2" >Tecnico</option>
                                                <option value="3" >Superior</option>
                                                <option value="4" >Pos-graduação</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- Select Basic -->
                                <div class="form-row">
                                    <div class="form-group col-6" id="div_tipo_medio" style="display:none">
                                        <label class="col control-label" for="tipo_medio">Medio</label>
                                        <div class="col">
                                            <select id="tipo_medio" name="tipo_medio" onchange="habilitaCampoMedio(this.value)"
                                                class="form-control">
                                                <option value="0" >Selecionar</option>
                                                <option value="1" >Regular</option>
                                                <option value="2" >Tecnico</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Select Basic -->
                                    <div class="form-group col-6" id="div_tipo_tecnico" style="display:none">
                                        <label class="col control-label" for="tipo_tecnico">Tecnico</label>
                                        <div class="col">
                                            <select id="tipo_tecnico" name="tipo_tecnico" onchange="habilitaCampoTecnico(this.value)"
                                                class="form-control">
                                                <option value="0" >Selecionar</option>
                                                <option value="1" >Magisterio</option>
                                                <option value="2" >ADM</option>
                                                <option value="3" >Informatica</option>
                                                <option value="4" >Outros</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="form-row">
                                    <div class="form-group col-6" id="div_outro_tec_estag" style="display:none">
                                        <label class="col control-label" for="outro_tec_estag">Outro curso Tecnico</label>
                                        <div class="col">
                                            <input id="outro_tec_estag" name="outro_tec_estag" type="text" value="<?php echo $outro_tec?>" placeholder="Informe tipo de Técnico do estagiário"
                                                class="form-control input-md">
                                        </div>
                                    </div>
                                </div>
                                <!-- Select Basic -->
                                <div class="form-row">
                                    <div class="form-group col-6" id="div_form_complementar" style="display:none">
                                        <label class="col control-label" for="form_complementar">Formacao complementar</label>
                                        <div class="col">
                                            <select id="form_complementar" name="form_complementar" class="form-control">
                                                <option value="0" >Selecionar</option>
                                                <option value="1" >Sim, já possuo magisterio concluído. Cursando agora a graduacao</option>
                                                <option value="2" >Nao cursei o magisterio, somente a graduacao</option>
                                            </select>
                                        </div>                                  </div>
                                </div>
                                <!-- Text input-->
                                <div class="form-row">
                                    <div class="form-group col">
                                        <label class="col control-label" for="curso_estag">Curso</label>
                                        <div class="col">
                                            <input id="curso_estag" name="curso_estag" type="text" value="" placeholder="Informe o curso do estagiário"
                                                class="form-control input-md">
                                        </div>
                                    </div>
                                    <!-- Select Basic -->
                                    <div class="form-group col">
                                        <label class="col control-label" for="hr_aula_estag">Horario da aula</label>
                                        <div class="col">
                                            <select id="hr_aula_estag" name="hr_aula_estag" class="form-control">
                                                <option value="0" >Selecionar</option>
                                                <option value="1" >Manha</option>
                                                <option value="2" >Tarde</option>
                                                <option value="3" >Noite</option>
                                                <option value="4" >>EaD</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="form-row">
                                    <div class="form-group col">
                                        <label class="col control-label" for="dta_ini_estag">Inicio do Curso</label>
                                        <div class="col">
                                            <input id="dta_ini_estag" name="dta_ini_estag" type="text" value="" placeholder="Informe a data de início do curso"
                                                class="form-control input-md">
                                        </div>
                                    </div>
                                    <!-- Text input-->
                                    <div class="form-group col">
                                        <label class="col control-label" for="dta_fim_estag">Previsao de termino</label>
                                        <div class="col">
                                            <input id="dta_fim_estag" name="dta_fim_estag" type="text" value="" placeholder="Informe a data de término do curso"
                                                class="form-control input-md">
                                        </div>
                                    </div>
                                </div>
                                <h1 class="titulos">Experiencia Profissional</h1>
                                <!-- Text input-->
                                <div class="form-row">
                                    <div class="form-group col">
                                        <label class="col control-label" for="empresa_ult_estag">Ultima Empresa</label>
                                        <div class="col">
                                            <input id="empresa_ult_estag" name="empresa_ult_estag"  type="text" value=""
                                                placeholder="Informe a última empresa do estagiário" class="form-control input-md">
                                        </div>
                                    </div>
                                    <!-- Text input-->
                                    <div class="form-group col">
                                        <label class="col control-label" for="cargo_ult_estag">Cargo Exercido</label>
                                        <div class="col">
                                            <input id="cargo_ult_estag" name="cargo_ult_estag" type="text" value="" placeholder="Informe o cargo exercido pelo estagiário"
                                                class="form-control input-md">
                                        </div>
                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="form-row">
                                    <div class="form-group col">
                                        <label class="col  control-label" for="exp_ult_estag">Tempo de experiencia</label>
                                        <div class="col ">
                                            <input id="exp_ult_estag" name="exp_ult_estag" type="text" value="" placeholder="Informe o de experiência"
                                                class="form-control input-md">
                                        </div>
                                    </div>
                                    <!-- Text input-->
                                    <div class="form-group col">
                                        <label class="col  control-label" for="empresa_penult_estag">Penultima Empresa</label>
                                        <div class="col ">
                                            <input id="empresa_penult_estag" name="empresa_penult_estag" type="text" value=""
                                                placeholder="Informe a penúltima empresa do estagiário" class="form-control input-md">
                                        </div>
                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="form-row">
                                    <div class="form-group col">
                                        <label class="col  control-label" for="cargo_penult_estag">Cargo Exercido</label>
                                        <div class="col ">
                                            <input id="cargo_penult_estag" name="cargo_penult_estag" type="text" value=""
                                                placeholder="Informe o cargo exercido pelo estagiário" class="form-control input-md">
                                        </div>
                                    </div>
                                    <!-- Text input-->
                                    <div class="form-group col">
                                        <label class="col  control-label" for="exp_penult_estag">Tempo de experiencia</label>
                                        <div class="col ">
                                            <input id="exp_penult_estag" name="exp_penult_estag" type="text" value=""
                                                placeholder="Informe o de experiência" class="form-control input-md">
                                        </div>
                                    </div>
                                </div>
                                <h1 class="titulos">Informacoes Complementares</h1>
                                <!-- Text input-->
                                <div class="form-row">
                                    <div class="form-group col-6">
                                        <label class="col  control-label" for="cursos_extras_estag">Cursos extras</label>
                                        <div class="col ">
                                            <input id="cursos_extras_estag" name="cursos_extras_estag" type="text" value=""
                                                placeholder="Informe os cursos extras do estagiário" class="form-control input-md">
                                        </div>
                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col  control-label" for="cv_estag">Resumo do curriculo</label>
                                    <div class="col ">
                                        <textarea class="form-control" id="cv_estag" name="cv_estag" rows="10" style="resize:none"></textarea>
                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col  control-label" for="obs_estag">Observacoes</label>
                                    <div class="col ">
                                        <textarea class="form-control" id="obs_estag" name="obs_estag" rows="10" style="resize:none"></textarea>
                                    </div>
                                </div>
                                <!-- Button -->
                                <div class="form-group">
                                    <label class="col  control-label" for="btn_cad_estagiario"></label>
                                    <div class="col ">
                                        <button id="btn_cad_estagiario" name="btn_cad_estagiario" class="btn btn-primary pull-right">Salvar</button>
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
        
        </div>
        <!-- END CONTENT -->
        <!-- END CONTAINER -->
        <!-- LOAD FILES AT PAGE END FOR FASTER LOADING -->
        <!-- CORE JS FRAMEWORK - START -->
        <script src="assets/js/jquery-1.11.2.min.js" type="text/javascript"></script>
        <script src="assets/js/jquery.easing.min.js" type="text/javascript"></script>
        <script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>
        <script src="assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js" type="text/javascript"></script>
        <script src="assets/plugins/viewport/viewportchecker.js" type="text/javascript"></script>
        <!-- CORE JS FRAMEWORK - END -->
        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START -->
        <script src="assets/plugins/datatables/js/jquery.dataTables.min.js" type="text/javascript"></script>
        <script src="assets/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js" type="text/javascript"></script>
        <script src="assets/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js" type="text/javascript"></script>
        <script src="assets/plugins/datatables/extensions/Responsive/bootstrap/3/dataTables.bootstrap.js" type="text/javascript"></script>
        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END -->
        <!-- CORE TEMPLATE JS - START -->
        <script src="assets/js/scripts.js" type="text/javascript"></script>
        <!-- END CORE TEMPLATE JS - END -->
        <!-- Sidebar Graph - START -->
        <script src="assets/plugins/sparkline-chart/jquery.sparkline.min.js" type="text/javascript"></script>
        <script src="assets/js/chart-sparkline.js" type="text/javascript"></script>
        <!-- Sidebar Graph - END -->
</body>

</html>