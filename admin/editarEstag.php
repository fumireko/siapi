
<?php
   include "../validar_session.php";  
   include "../Config/config_sistema.php";
   if (!isset($_SESSION)){
    session_start();
   }
   $email_usuario = $_SESSION['email_usuario'];
   $nome_usuario = $_SESSION['nome_usuario'];
   $nivel_usuario = $_SESSION['nivel_usuario'];

    $id_estag = $_GET['id_estag'];
    $consultaEstag = mysql_query("SELECT `tbestagiario_nome`, `tbestagiario_cpf`, `tbestagiario_email`, `tbestagiario_dtnasc`, `tbestagiario_endereco`, `tbestagiario_bairro`, `tbestagiario_cidade`, `tbestagiario_telfixo`, `tbestagiario_telcel`, `tbestagiario_telreca`, `tbestagiario_falarcom`, `tbestagiario_unipref`, `tbestagiario_turnopref`, `tbestagiario_instituicao`, `tbestagiario_nivel`, `tbestagiario_curso`, `tbestagiario_horario`, `tbestagiario_datainiciocurso`, `tbestagiario_datatermcurso`, `tbestagiario_formacaocomple`, `tbestagiario_empresa`, `tbestagiario_cargo`, `tbestagiario_tempexperiencia`, `tbestagiario_empresa1`, `tbestagiario_cargo1`, `tbestagiario_tempexperiencia1`, `tbestagiario_cursosextra`, `tbestagiario_resumodocurriculo`, `tbestagiario_status`, `obs_estag`, `outro_tec_estag`, `tipo_medio`, `tipo_tecnico` FROM `tbestagiario` WHERE tbestagiario.tbestagiario_id =  $id_estag") or die('Erro, query falhou');

    if(mysql_num_rows($consultaEstag) > 0){
        while($fetch = mysql_fetch_row($consultaEstag)){
            $nme_estag = $fetch[0];
            $cpf_estag = $fetch[1];
            $email_estag = $fetch[2];
            $nasc_estag = $fetch[3];
            $end_estag = $fetch[4];
            $bairro_estag =  $fetch[5];
            $cidade_estag =  $fetch[6];
            $telfixo_estag =  $fetch[7];
            $cel_estag =  $fetch[8];
            $telrec_estag =  $fetch[9];
            $falarcom_estag =  $fetch[10];
            $unipref_estag =  $fetch[11];
            $turnopref_estag =  $fetch[12];
            $instituicao_estag =  $fetch[13];
            $nvl_estag =  $fetch[14];
            $curso_estag =  $fetch[15];
            $horario_curso_estag =  $fetch[16];
            $dta_inicio_curso = $fetch[17];
            $dta_fim_curso = $fetch[18];
            $formcomplementar = $fetch[19];
            $exp_empresa1 = $fetch[20];
            $exp_cargo1_estag =  $fetch[21];
            $exp_tempo1_estag =  $fetch[22];
            $exp_empresa2 = $fetch[23];
            $exp_cargo2_estag =  $fetch[24];
            $exp_tempo2_estag =  $fetch[25];
            $cursos_extras =  $fetch[26];
            $resumoCV = $fetch[27];
            $status_estag = $fetch[28];
            $obs_estag = $fetch[29];
            $outro_tec = $fetch[30];
            $tipo_medio = $fetch[31];
            $tipo_tecnico = $fetch[32];
        }
    }

    // faz consulta no banco de dados
    $consulta = mysql_query("SELECT * FROM usuarios where email = '".$email_usuario."'");

    function detect_encoding($string)
    {
        ////w3.org/International/questions/qa-forms-utf-8.html
        if (preg_match('%^(?: [\x09\x0A\x0D\x20-\x7E] | [\xC2-\xDF][\x80-\xBF] | \xE0[\xA0-\xBF][\x80-\xBF] | [\xE1-\xEC\xEE\xEF][\x80-\xBF]{2} | \xED[\x80-\x9F][\x80-\xBF] | \xF0[\x90-\xBF][\x80-\xBF]{2} | [\xF1-\xF3][\x80-\xBF]{3} | \xF4[\x80-\x8F][\x80-\xBF]{2} )*$%xs', $string))
            return 'UTF-8';
    
        //If you need to distinguish between UTF-8 and ISO-8859-1 encoding, list UTF-8 first in your encoding_list.
        //if you list ISO-8859-1 first, mb_detect_encoding() will always return ISO-8859-1.
        return mb_detect_encoding($string, array('UTF-8', 'ASCII', 'ISO-8859-1', 'JIS', 'EUC-JP', 'SJIS'));
    }
 
    function convert_encoding($string, $to_encoding, $from_encoding = '')
    {
        if ($from_encoding == '')
            $from_encoding = detect_encoding($string);
    
        if ($from_encoding == $to_encoding)
            return $string;
    
        return mb_convert_encoding($string, $to_encoding, $from_encoding);
    }

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-BR" lang="pt-BR" ng-app="App">


<head>
    <meta name="author" content="Admin" />
    <title>SEMED - Sistema de Gestao Escolar</title>
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
                            <?php echo $nome_usuario;?>
                        </h4>
                    </div>
                </div>
                <!-- USER INFO - END -->
                <ul class="wraplist">
                    <li class=''> <a><i class="fas fa-user"></i> <span class='title'>Perfil</span>
                            <span class='arrow '></span> </a>
                        <ul class='sub-menu'>
                            <li> <a href='../admin/#/alterarSenhaUsuario'> <span class='title'>Alterar Senha</span></a>
                            </li>
                        </ul>
                    </li>
                    <?php
            if($nivel_usuario == 1){
                echo "  <li class=''>
                            <a>
                                <i class='fas fa-toolbox'></i>
                                <span class='title'>Administrativo</span>
                                <span class='arrow open'></span>
                            </a>
                            <ul class='sub-menu'>
                                <li>
                                    <a class='' href='../admin/#modeloArqADM'>Modelos de documentos</a>
                                </li>
                                <li>
                                    <a class='' href='../admin/#legislacaoADM'>Legislação</a>
                                </li>
                                <li>
                                    <a class='' href='../admin/#reuCapADM'>Reuniões e capacitações</a>
                                </li>
                                <li>
                                    <a class='' href='../admin/#popADM'>Protocolos - POP</a>
                                </li>
                                <li>
                                    <a class='' href='../admin/#cadUsuariosSemed'>Cadastro de Usuários</a>
                                </li>
                                <li>
                                <a class='' href='../admin/#cadUnidadesSemed'>Cadastro de Unidades</a>
                            </li>
                            </ul>
                        </li>";
            }
        ?>
                    <?php 
        if($nivel_usuario != 4){
            echo"
            <li class=''>
            <a>
                <i class='fas fa-chalkboard-teacher'></i>
                <span class='title'>Pedagógico</span>
                <span class='arrow '></span>
            </a>
            <ul class='sub-menu'>
                <li>
                    <a class='' href='../admin/#modeloArqPEDAG'>Modelos de documentos</a>
                </li>
                <li>
                    <a class='' href='../admin/#matCompPEDAG'>Material complementar</a>
                </li>
                <li>
                    <a class='' href='../admin/#reuAssesPEDAG'>Reuniões e assessorias</a>
                </li>
                <li class=''> <a><span class='title'>Capacitações</span>
                        <span class='arrow '></span> </a>
                    <ul class='sub-menu'>
                        <li> <a> <span class='title'>CMEIs</span> <span class='arrow '></span>
                            </a>
                            <ul class='sub-menu'>
                                <li> <a href='../admin/#infantil1'> <span class='title'>Infantil I</span>
                                    </a></li>
                                <li> <a href='../admin/#infantil2'> <span class='title'>Infantil II</span>
                                    </a></li>
                                <li> <a href='../admin/#infantil3'> <span class='title'>Infantil III</span>
                                    </a></li>
                                <li> <a href='../admin/#infantil4'> <span class='title'>Infantil IV</span>
                                    </a></li>
                                <li> <a href='../admin/#infantil5'> <span class='title'>Infantil V</span>
                                    </a></li>
                                <li> <a href='../admin/#areas'> <span class='title'>Áreas</span> </a></li>
                                <li> <a href='../admin/#coordenacao'> <span class='title'>Cooredenação</span>
                                    </a></li>
                                <li> <a href='../admin/#direcao'> <span class='title'>Direção</span> </a></li>
                                <li> <a href='../admin/#auxTutores'> <span class='title'>Auxiliares e tutores</span>
                                    </a></li>
                                <li> <a href='../admin/#matComplementar'> <span class='title'>Mat. Complementar</span>
                                    </a></li>
                            </ul>
                        </li>
                        <li> <a> <span class='title'>Escolas</span> <span class='arrow '></span>
                            </a>
                            <ul class='sub-menu'>
                                <li> <a href='../admin/#infantil4Escola'> <span class='title'>Infantil IV</span>
                                    </a></li>
                                <li> <a href='../admin/#infantil5Escola'> <span class='title'>Infantil V</span>
                                    </a></li>
                                <li> <a href='../admin/#ano1'> <span class='title'>1º ano</span> </a></li>
                                <li> <a href='../admin/#ano2'> <span class='title'>2º ano</span> </a></li>
                                <li> <a href='../admin/#ano3'> <span class='title'>3º ano</span> </a></li>
                                <li> <a href='../admin/#ano4'> <span class='title'>4º ano</span> </a></li>
                                <li> <a href='../admin/#ano5'> <span class='title'>5º ano</span> </a></li>
                                <li> <a href='../admin/#arte'> <span class='title'>Arte</span> </a></li>
                                <li> <a href='../admin/#edFisica'> <span class='title'>Educação Física</span>
                                    </a></li>
                                <li> <a href='../admin/#ensReligioso'> <span class='title'>Ens. Religioso</span>
                                    </a></li>
                                <li> <a href='../admin/#inforEducativa'> <span class='title'>Informática
                                            Educativa</span> </a></li>
                                <li> <a href='../admin/#lousaInterativa'> <span class='title'>Lousa Interativa</span>
                                    </a></li>
                                <li> <a href='../admin/#ingles'> <span class='title'>Inglês</span> </a></li>
                                <li> <a href='../admin/#edAmbiental'> <span class='title'>Ed. Ambiental</span>
                                    </a></li>
                                <li> <a href='../admin/#EjaFase1'> <span class='title'>EJA - Fase i</span>
                                    </a></li>
                                <li> <a href='../admin/#edEspecial'> <span class='title'>Educação Especial</span>
                                    </a></li>
                                <li> <a href='../admin/#coordenacaoEscola'> <span class='title'>Coordenação</span>
                                    </a></li>
                                <li> <a href='../admin/#direcaoEscola'> <span class='title'>Direção</span> </a></li>
                                <li> <a href='../admin/#auxTutoresEscola'> <span class='title'>Auxiliares e tutores</span>
                                    </a></li>
                                <li> <a href='../admin/#matComplementarEscola'> <span class='title'>Mat.
                                            Complementar</span>
                                    </a></li>
                            </ul>
                        </li>
                    </ul>
                </li>";
        }
        ?>
                    <?php
                if($nivel_usuario == 1 || $nivel_usuario == 2){
                    echo"
                    <li> <a href='../admin/#projPEDAG'> <span class='title'>Projetos Pedagógicos</span>
                    </a>
                    </li>
                    <li> <a href='../admin/#cadastrosPEDAG'> <span class='title'>Cadastros</span>
                        </a>
                    </li>
                    <li> <a href='../admin/#assessPEDAG'> <span class='title'>Assessoria Pedagógica</span>
                        </a>
                    </li>
                    <li> <a href='../admin/#popPEDAG'> <span class='title'>Protocolos - POP</span>
                        </a>
                    </li>
                    </ul>
                    </li>";
                }
                ?>

                <?php
                if($nivel_usuario == 1){
                    echo"<li class=''>
                    <a>
                        <i class='fas fa-parachute-box'></i>
                        <span class='title'>Suprimento de Pessoal</span>
                        <span class='arrow '></span>
                    </a>
                    <ul class='sub-menu'>
                        <li>
                            <a class='' href='../admin/#modeloArqSupPes'>Modelos de documentos</a>
                        </li>
                        <li>
                            <a class='' href='../admin/#qdrFuncional'>Quadro funcional</a>
                        </li>
                        <li>
                            <a class='' href='../admin/#regFuncional'>Registro funcional</a>
                        </li>
                        <li>
                            <a class='' href='../admin/#relEstagiarios'>Lista Estagiários</a>
                        </li>
                    </ul>
                </li>
                <li class=''>
                    <a>
                        <i class='far fa-file-alt'></i>
                        <span class='title'>Documentação Escolar</span>
                        <span class='arrow '></span>
                    </a>
                    <ul class='sub-menu'>
                        <li>
                            <a class='' href='../admin/#modeloArqDocEscolar'>Modelos de documentos</a>
                        </li>
                        <li>
                            <a class='' href='../admin/#docLegal'>Documentação legal</a>
                        </li>
                        <li>
                            <a class='' href='../admin/#regEscolar'>Registro escolar</a>
                        </li>
                    </ul>
                </li>";
                }
                ?>
                <?php
                        if($nivel_usuario == 4){
                            echo"
                            <li class=''> 
                                <a>
                                    <i class='fas fa-paint-roller'></i>
                                    <span class='title'>Monitoramentode serviços</span>
                                    <span class='arrow '></span> 
                                </a>
                                <ul class='sub-menu'>
                                    <li> <a href='../admin/#solicServicosObras'> <span class='title'>Solicitação de serviços</span></a></li>
                                    <li><a href='../admin/#acompObras'><span class='title'>Acompanhamento de serviços</span></a></li>
                                </ul>
                            </li>";
                        }
                        ?>
                <?php
                        if($nivel_usuario == 1){
                            echo"
                            <li class=''> 
                            <a>
                                <i class='fas fa-paint-roller'></i>
                                <span class='title'>Monitoramentode serviços</span>
                                <span class='arrow '></span> 
                            </a>
                            <ul class='sub-menu'>
                                <li> <a href='../admin/#solicServicosObras'> <span class='title'>Solicitação de serviços</span></a></li>
                        <li><a href='../admin/#acompObrasPorUnidade'> <span class='title'>Acompanhamento de serviços solicitados</span></a></li>
                    </ul>
                </li>
                <li class=''> <a> <i class='fas fa-utensils'></i> <span class='title'>Alimentação
                            escolar</span>
                        <span class='arrow '></span> </a>
                    <ul class='sub-menu'>
                        <li> <a href='../admin/#modeloArqAlimentacaoEscolar'> <span class='title'>Modelos de documentos</span>
                            </a>
                        </li>
                        <li> <a href='../admin/#solicServicosAlimentEscolar'> <span class='title'>Solicitação de serviços</span>
                            </a>
                        </li>
                        <li> <a href='../admin/#orientTecnica'> <span class='title'>Orientação técnica</span> 
                            </a>
                        </li>
                    </ul>
                </li>
                <li class=''> <a><i class='fas fa-box'></i> <span class='title'>Suprimentos
                            e logística</span>
                        <span class='arrow '></span> </a>
                    <ul class='sub-menu'>
                        <li> <a href='../admin/#solicServicosSuprLog'> <span class='title'>Solicitação de serviços</span>
                            </a>
                        </li>
                        <li> <a href='../admin/#comprasSuprLog'> <span class='title'>Compras</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class=''> <a> <i class='fas fa-money-bill-alt'></i> <span class='title'>Controladoria
                            e finanças</span>
                        <span class='arrow '></span> </a>
                    <ul class='sub-menu'>
                        <li> <a href='../admin/#modeloArqContrFinancas'> <span class='title'>Modelos de documentos</span> 
                            </a>
                        </li>
                        <li> <a href='../admin/#prestContasContrFinancas'> <span class='title'>Prestação de contas</span> 
                            </a>
                        </li>
                        <li> <a href='../admin/#programasContrFinancas'> <span class='title'>Programas</span>
                            </a>
                        </li>
                        <li> <a href='../admin/#capRecursosContrFinancas'> <span class='title'>Captação de recursos</span> 
                            </a>
                        </li>
                        <li> <a href='../admin/#legislacaoContrFinancas'> <span class='title'>Legislação</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class=''> <a><i class='fas fa-bus-alt'></i> <span class='title'>Transporte
                            escolar</span>
                        <span class='arrow '></span> </a>
                    <ul class='sub-menu'>
                        <li> <a href='../admin/#transpEspec'> <span class='title'>Transporte especial(aulas)</span></a>
                        </li>
                    </ul>
                </li>";
                }
                ?>
                <?php
                if($nivel_usuario == 1 || $nivel_usuario == 2){
                    echo"<li class=''> <a><i class='far fa-smile-beam'></i><span class='title'>Atendimento especializado</span><span class='arrow '></span> </a>
                        <ul class='sub-menu'>
                            <li> <a href='../admin/#modeloArqAtendEspec'> <span class='title'>Modelos de documentos</span>
                                </a>
                            </li>
                            <li> <a href='../admin/#encaminTriagem'> <span class='title'>Encaminhamento/triagem</span></a>
                            </li>
                            <li> <a href='../admin/#agendamentoAtendEspec'> <span class='title'>Agendamento</span>
                                </a>
                            </li>
                            <li> <a href='../admin/#orientTecnAtendEspec'> <span class='title'>Orientação técnica</span>
                                </a>
                            </li>
                        </ul>
                    </li>";                    
                }
                ?>
                <?php if($nivel_usuario == 3){
                    echo"</ul>
                    </li>";
                }
                ?>

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
                <h1 class="title">Sistema de Gestao Escolar</h1>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="col-lg-12">
        <section class="box ">
            <header class="panel_header">
                <h2 class="title pull-left">Editar Estagiario</h2>
            </header>
            <div class="content-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <form class="form-horizontal" method="POST" id="formEditEstagiario">
                            <fieldset>
                                <div id="MsgSucesso" class="alert alert-success" style="text-align:center; display:none;"
                                    role="alert">Salvo com sucesso!</div>
                                <div id="MsgErro" class="alert alert-danger" style="text-align:center; display:none;"
                                    role="alert">Erro ao editar as informacoes!</div>
                                <input type="hidden" id="id_estag" name="id_estag" value="<?php echo $id_estag ?>">    
                                <!-- Select Basic -->
                                <div class="form-group">
                                    <label class="col control-label" for="status_estag">Status</label>
                                    <select class="form-control" name="status_estag" id="status_estag">
                                        <option value="0" <?php echo $status_estag==0?'selected':'';?>>Selecionar</option>
                                        <option value="1" <?php echo $status_estag==1?'selected':'';?>>Pendente</option>
                                        <option value="2" <?php echo $status_estag==2?'selected':'';?>>Selecao</option>
                                        <option value="3" <?php echo $status_estag==3?'selected':'';?>>Apto CMEI</option>
                                        <option value="4" <?php echo $status_estag==4?'selected':'';?>>Apto Escola</option>
                                        <option value="5" <?php echo $status_estag==5?'selected':'';?>>Apto Ambos</option>
                                        <option value="6" <?php echo $status_estag==6?'selected':'';?>>Reprovado</option>
                                        <option value="7" <?php echo $status_estag==7?'selected':'';?>>Ausente</option>
                                        <option value="8" <?php echo $status_estag==8?'selected':'';?>>Contratado</option>
                                        <option value="9" <?php echo $status_estag==9?'selected':'';?>>Demitido</option>
                                        <option value="10" <?php echo $status_estag==10?'selected':'';?>>Desistente</option>
                                        <option value="11" <?php echo $status_estag==11?'selected':'';?>>Nao Contratar</option>
                                    </select>
                                </div>
                                <div class="form-row">
                                    <div class="form-group">
                                        <label class="col control-label" for="unidade_preferencia">Unidade de
                                            Preferencia</label>
                                        <div class="col">
                                            <select id="unidade_preferencia" name="unidade_preferencia" class="form-control">
                                                <option value="0" <?php echo $unipref_estag==0?'selected':'';?>>Selecionar</option>
                                                <option value="1" <?php echo $unipref_estag==1?'selected':'';?>>CMEI - Centro Municipal de Educacao Infantil
                                                    (crianças de 0 a
                                                    5 anos)</option>
                                                <option value="2" <?php echo $unipref_estag==2?'selected':'';?>>Escolas Municipais (crianças a partir de 4 anos)</option>
                                                <option value="3" <?php echo $unipref_estag==3?'selected':'';?>>Indiferente</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col control-label" for="turno_preferencia">Turno de preferencia</label>
                                        <div class="col">
                                            <select id="turno_preferencia" name="turno_preferencia" class="form-control">
                                                <option value="0" <?php echo $turnopref_estag==0?'selected':'';?>>Selecionar</option>
                                                <option value="1" <?php echo $turnopref_estag==1?'selected':'';?>>Manha</option>
                                                <option value="2" <?php echo $turnopref_estag==2?'selected':'';?>>Tarde</option>
                                                <option value="3" <?php echo $turnopref_estag==3?'selected':'';?>>Indiferente</option>
                                            </select>
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
                                            <input id="cpf_estag" name="cpf_estag" type="text" value="<?php echo $cpf_estag?>" placeholder="Informe o CPF do estagiário"
                                                class="form-control input-md">
                                        </div>
                                    </div>
                                    <!-- Text input-->
                                    <div class="form-group col">
                                        <label class="col control-label" for="nome_estag">Nome</label>
                                        <div class="col">
                                            <input id="nome_estag" name="nome_estag" type="text" value="<?php echo $nme_estag?>" placeholder="Informe o nome do estagiário"
                                                class="form-control input-md">
                                        </div>
                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="form-row">
                                    <div class="form-group col">
                                        <label class="col control-label" for="nasc_estag">Data de Nascimento</label>
                                        <div class="col">
                                            <input id="nasc_estag" name="nasc_estag" type="date" value="<?php echo $nasc_estag?>" placeholder="Informe a data de nascimento do estagiário"
                                                class="form-control input-md">
                                        </div>
                                    </div>
                                    <!-- Text input-->
                                    <div class="form-group col">
                                        <label class="col control-label" for="email_estag">E-mail</label>
                                        <div class="col">
                                            <input id="email_estag" name="email_estag" type="mail" value="<?php echo $email_estag?>" placeholder="Informe o e-mail do estagiário"
                                                class="form-control input-md">
                                        </div>
                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="form-row">
                                    <div class="form-group col">
                                        <label class="col control-label" for="end_estag">Endereco</label>
                                        <div class="col">
                                            <input id="end_estag" name="end_estag" type="text" value="<?php echo $end_estag?>" placeholder="Informe o endereço do estagiário"
                                                class="form-control input-md">
                                        </div>
                                    </div>
                                    <!-- Text input-->
                                    <div class="form-group col">
                                        <label class="col control-label" for="bairro_estag">Bairro</label>
                                        <div class="col">
                                            <input id="bairro_estag" name="bairro_estag" type="text" value="<?php echo $bairro_estag?>" placeholder="Informe o bairro do estagiário"
                                                class="form-control input-md">
                                        </div>
                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="form-row">
                                    <div class="form-group col">
                                        <label class="colcontrol-label" for="cidade_estag">Cidade</label>
                                        <div class="col">
                                            <input id="cidade_estag" name="cidade_estag" type="text" value="<?php echo $cidade_estag?>" placeholder="Informe a cidade do estagiário"
                                                class="form-control input-md">
                                        </div>
                                    </div>
                                    <!-- Text input-->
                                    <div class="form-group col">
                                        <label class="col control-label" for="fixo_estag">Telefone Fixo</label>
                                        <div class="col">
                                            <input id="fixo_estag" name="fixo_estag" type="text" value="<?php echo $telfixo_estag?>" placeholder="Informe o telefone fixo do estagiário"
                                                class="form-control input-md">
                                        </div>
                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="form-row">
                                    <div class="form-group col">
                                        <label class="col control-label" for="cel_estag">Celular</label>
                                        <div class="col">
                                            <input id="cel_estag" name="cel_estag" type="tel" value="<?php echo $cel_estag?>" placeholder="Informe o celular do estagiário"
                                                class="form-control input-md">
                                        </div>
                                    </div>
                                    <!-- Text input-->
                                    <div class="form-group col">
                                        <label class="col control-label" for="recado_estag">Telefone de recados</label>
                                        <div class="col">
                                            <input id="recado_estag" name="recado_estag" type="text" value="<?php echo $telrec_estag?>" placeholder="Informe o telefone para recado do estagiário"
                                                class="form-control input-md">
                                        </div>
                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="form-row">
                                    <div class="form-group col-6">
                                        <label class="col control-label" for="falar_com_estag">Falar com</label>
                                        <div class="col">
                                            <input id="falar_com_estag" name="falar_com_estag" type="text" value="<?php echo $falarcom_estag?>" placeholder="Informe a pessoa para recado do estagiário"
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
                                            <input id="inst_ens_estag" name="inst_ens_estag" type="text" value="<?php echo $instituicao_estag?>" placeholder="Informe a instituição de ensino do estagiário"
                                                class="form-control input-md">
                                        </div>
                                    </div>
                                    <!-- Select Basic -->
                                    <div class="form-group col">
                                        <label class="col control-label" for="nvl_estag">Nivel</label>
                                        <div class="col">
                                            <select id="nvl_estag" name="nvl_estag" onchange="habilitaCamposNivel(this.value)"
                                                class="form-control">
                                                <option value="0" <?php echo $nvl_estag==0?'selected':'';?>>Selecionar</option>
                                                <option value="1" <?php echo $nvl_estag==1?'selected':'';?>>Medio</option>
                                                <option value="2" <?php echo $nvl_estag==2?'selected':'';?>>Superior</option>
                                                <option value="3" <?php echo $nvl_estag==3?'selected':'';?>>Pos-graduação</option>
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
                                                <option value="0" <?php echo $tipo_medio==0?'selected':'';?>>Selecionar</option>
                                                <option value="1" <?php echo $tipo_medio==1?'selected':'';?>>Regular</option>
                                                <option value="2" <?php echo $tipo_medio==2?'selected':'';?>>Tecnico</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Select Basic -->
                                    <div class="form-group col-6" id="div_tipo_tecnico" style="display:none">
                                        <label class="col control-label" for="tipo_tecnico">Tecnico</label>
                                        <div class="col">
                                            <select id="tipo_tecnico" name="tipo_tecnico" onchange="habilitaCampoTecnico(this.value)"
                                                class="form-control">
                                                <option value="0" <?php echo $tipo_tecnico==0?'selected':'';?>>Selecionar</option>
                                                <option value="1" <?php echo $tipo_tecnico==1?'selected':'';?>>Magisterio</option>
                                                <option value="2" <?php echo $tipo_tecnico==2?'selected':'';?>>ADM</option>
                                                <option value="3" <?php echo $tipo_tecnico==3?'selected':'';?>>Informatica</option>
                                                <option value="4" <?php echo $tipo_tecnico==4?'selected':'';?>>Outros</option>
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
                                                <option value="0" <?php echo $formcomplementar==0?'selected':'';?>>Selecionar</option>
                                                <option value="1" <?php echo $formcomplementar==1?'selected':'';?>>Sim, já possuo magisterio concluído. Cursando agora a
                                                    graduacao</option>
                                                <option value="2" <?php echo $formcomplementar==2?'selected':'';?>>Nao cursei o magisterio, somente a graduacao</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="form-row">
                                    <div class="form-group col">
                                        <label class="col control-label" for="curso_estag">Curso</label>
                                        <div class="col">
                                            <input id="curso_estag" name="curso_estag" type="text" value="<?php echo $curso_estag?>" placeholder="Informe o curso do estagiário"
                                                class="form-control input-md">
                                        </div>
                                    </div>
                                    <!-- Select Basic -->
                                    <div class="form-group col">
                                        <label class="col control-label" for="hr_aula_estag">Horario da aula</label>
                                        <div class="col">
                                            <select id="hr_aula_estag" name="hr_aula_estag" class="form-control">
                                                <option value="0" <?php echo $horario_curso_estag==0?'selected':'';?>>Selecionar</option>
                                                <option value="1" <?php echo $horario_curso_estag==1?'selected':'';?>>Manha</option>
                                                <option value="2" <?php echo $horario_curso_estag==2?'selected':'';?>>Tarde</option>
                                                <option value="3" <?php echo $horario_curso_estag==3?'selected':'';?>>Noite</option>
                                                <option value="4" <?php echo $horario_curso_estag==4?'selected':'';?>>EaD</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="form-row">
                                    <div class="form-group col">
                                        <label class="col control-label" for="dta_ini_estag">Inicio do Curso</label>
                                        <div class="col">
                                            <input id="dta_ini_estag" name="dta_ini_estag" type="text" value="<?php echo convert_encoding($dta_inicio_curso, 'UTF-8') ?>" placeholder="Informe a data de início do curso"
                                                class="form-control input-md">
                                        </div>
                                    </div>
                                    <!-- Text input-->
                                    <div class="form-group col">
                                        <label class="col control-label" for="dta_fim_estag">Previsao de termino</label>
                                        <div class="col">
                                            <input id="dta_fim_estag" name="dta_fim_estag" type="text" value="<?php echo convert_encoding($dta_fim_curso, 'UTF-8')?>" placeholder="Informe a data de término do curso"
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
                                            <input id="empresa_ult_estag" name="empresa_ult_estag"  type="text" value="<?php echo $exp_empresa1?>"
                                                placeholder="Informe a última empresa do estagiário" class="form-control input-md">
                                        </div>
                                    </div>
                                    <!-- Text input-->
                                    <div class="form-group col">
                                        <label class="col control-label" for="cargo_ult_estag">Cargo Exercido</label>
                                        <div class="col">
                                            <input id="cargo_ult_estag" name="cargo_ult_estag" type="text" value="<?php echo $exp_cargo1_estag?>" placeholder="Informe o cargo exercido pelo estagiário"
                                                class="form-control input-md">
                                        </div>
                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="form-row">
                                    <div class="form-group col">
                                        <label class="col  control-label" for="exp_ult_estag">Tempo de experiencia</label>
                                        <div class="col ">
                                            <input id="exp_ult_estag" name="exp_ult_estag" type="text" value="<?php echo $exp_tempo1_estag?>" placeholder="Informe o de experiência"
                                                class="form-control input-md">
                                        </div>
                                    </div>
                                    <!-- Text input-->
                                    <div class="form-group col">
                                        <label class="col  control-label" for="empresa_penult_estag">Penultima Empresa</label>
                                        <div class="col ">
                                            <input id="empresa_penult_estag" name="empresa_penult_estag" type="text" value="<?php echo $exp_empresa2?>"
                                                placeholder="Informe a penúltima empresa do estagiário" class="form-control input-md">
                                        </div>
                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="form-row">
                                    <div class="form-group col">
                                        <label class="col  control-label" for="cargo_penult_estag">Cargo Exercido</label>
                                        <div class="col ">
                                            <input id="cargo_penult_estag" name="cargo_penult_estag" type="text" value="<?php echo $exp_cargo2_estag?>"
                                                placeholder="Informe o cargo exercido pelo estagiário" class="form-control input-md">
                                        </div>
                                    </div>
                                    <!-- Text input-->
                                    <div class="form-group col">
                                        <label class="col  control-label" for="exp_penult_estag">Tempo de experiencia</label>
                                        <div class="col ">
                                            <input id="exp_penult_estag" name="exp_penult_estag" type="text" value="<?php echo $exp_tempo2_estag?>"
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
                                            <input id="cursos_extras_estag" name="cursos_extras_estag" type="text" value="<?php echo $cursos_extras?>"
                                                placeholder="Informe os cursos extras do estagiário" class="form-control input-md">
                                        </div>
                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col  control-label" for="cv_estag">Resumo do curriculo</label>
                                    <div class="col ">
                                        <textarea class="form-control" id="cv_estag" name="cv_estag" rows="10" style="resize:none"><?php echo $resumoCV?></textarea>
                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col  control-label" for="obs_estag">Observacoes</label>
                                    <div class="col ">
                                        <textarea class="form-control" id="obs_estag" name="obs_estag" rows="10" style="resize:none"><?php echo $obs_estag?></textarea>
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