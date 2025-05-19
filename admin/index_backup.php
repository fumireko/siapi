<?php
   include "../validar_session.php";  
   include "../Config/config_sistema.php";

   if (!isset($_SESSION)){
    session_start();
   }
   $email_usuario = $_SESSION['email_usuario'];
   $nome_usuario = $_SESSION['nome_usuario'];
   $nivel_usuario = $_SESSION['nivel_usuario'];
// faz consulta no banco de dados
$consulta = mysql_query("SELECT * FROM usuarios where email = '".$email_usuario."'");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-BR" lang="pt-BR" ng-app="App">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
    <script src="js/dadosfila.js" ></script>
    
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
                            <li> <a href='#alterarSenhaUsuario'> <span class='title'>Alterar Senha</span></a>
                            </li>
                        </ul>
                    </li>
                       <?php


                  
             switch ($nivel_usuario){
             case 0:
             echo $nivel_usuario;
             break;
             case 1:
                
                echo "  <li class=''>
                            <a>
                                <i class='fas fa-toolbox'></i>
                                <span class='title'>Administrativo</span>
                                <span class='arrow open'></span>
                            </a>
                            <ul class='sub-menu'>
                                <li>
                                    <a class='' href='./#/modeloArqADM'>Modelos de documentos</a>
                                </li>
                                <li>
                                    <a class='' href='./#/legislacaoADM'>Legislação</a>
                                </li>
                                <li>
                                    <a class='' href='./#/reuCapADM'>Reuniões e capacitações</a>
                                </li>
                                <li>
                                    <a class='' href='./#/popADM'>Protocolos - POP</a>
                                </li
                               
				<li>
                                	<a class=''>Cadastros</a>
                               		<ul class='sub-menu'>
                     				<li> <a class='' href='./#/cadatendimentos'>Cadastro de Atendimentos</a></li>
						             <li><a class='' href='./#/cadUsuariosSemed'>Cadastro de Usuários</a></li>
                                     <li><a class='' href='./#/cadUnidadesSemed'>Cadastro de Unidades</a></li>
                                     <li><a class='' href='./#/cadevento'>Cadastro de Eventos</a></li>                             
                                	</ul>
                                </li>
				<li>
                                	<a class=''>Relatorios</a>
                               		<ul class='sub-menu'>
                                      <li><a class='' href='./atendimentos.php'>lista de Atendimento</a></li>
                                      <li><a class='' href='./grupos.php'>lista de Grupos</a></li>  
                                      <li><a class='' href='./eventos.php'>lista de Eventos</a></li>                           
                                	</ul>
                                </li>
                            </ul>
                        </li>
                          <li class=''>
                                     <a>
                                         <i class='fas fa-sitemap'></i>
                                         <span class='title'>Fila de espera</span>
                                         <span class='arrow open'></span>
                                     </a>
                                     <ul class='sub-menu'>
                                         <li>
                                             <a class=''>Cadastros</a>
                                             <ul class='sub-menu'>
                                                <li> <a class='' href='./#/cadaluno'>Cadastro de aluno</a></li>
                                                <li> <a class='' href='./#/cadcmei'>Cadastro de Cmei</a></li>
                                                <li> <a class='' href='./#/cadusuarios'>Cadastro de Usuarios</a></li>    
                                                <li> <a class='' href='./#/cadgrupo'>Cadastro de Grupo</a></li>
                                            </ul>
                                         </li>  

                                         <li>
                                             <a class=''>Fila de espera</a>
                                             <ul class='sub-menu'>
                                                 <li> <a class='' href='./incfilaadm.php'>Incluir adm</a></li>
                                                 <li> <a class='' href='./incfila.php'>Incluir</a></li>                   
                                            </ul>
                                         </li>  
                                            <a class=''>Movimento</a>
                                            <ul class='sub-menu'>
                                                <li> <a class='' href='./#/search'>Manutenção</a></li>
                                                <li> <a class='' href='./#/matricular'>Matricular aluno</a></li>
                                                <li> <a class='' href='./#/transferir'>Matriculados</a></li>
                                                <li> <a class='' href='#'>Devolver na fila</a></li>
                                                <li> <a class='' href='#'>Lista de Estagiarios  </a></li>
                                            </ul>
                                         </li>
                                        
                                     </ul>
                                 </li>
            <li class=''>
            <a>
                <i class='fas fa-chalkboard-teacher'></i>
                <span class='title'>Pedagógico</span>
                <span class='arrow '></span>
            </a>
            <ul class='sub-menu'>
                <li>
                    <a class='' href='#modeloArqPEDAG'>Modelos de documentos</a>
                </li>
                <li>
                    <a class='' href='#matCompPEDAG'>Material complementar</a>
                </li>
                <li>
                    <a class='' href='#reuAssesPEDAG'>Reuniões e assessorias</a>
                </li>
                <li class=''> <a><span class='title'>Capacitações</span>
                        <span class='arrow '></span> </a>
                    <ul class='sub-menu'>
                        <li> <a> <span class='title'>CMEIs</span> <span class='arrow '></span>
                            </a>
                            <ul class='sub-menu'>
                                <li> <a href='#infantil1'> <span class='title'>Infantil I</span>
                                    </a></li>
                                <li> <a href='#infantil2'> <span class='title'>Infantil II</span>
                                    </a></li>
                                <li> <a href='#infantil3'> <span class='title'>Infantil III</span>
                                    </a></li>
                                <li> <a href='#infantil4'> <span class='title'>Infantil IV</span>
                                    </a></li>
                                <li> <a href='#infantil5'> <span class='title'>Infantil V</span>
                                    </a></li>
                                <li> <a href='#areas'> <span class='title'>Áreas</span> </a></li>
                                <li> <a href='#coordenacao'> <span class='title'>Cooredenação</span>
                                    </a></li>
                                <li> <a href='#direcao'> <span class='title'>Direção</span> </a></li>
                                <li> <a href='#auxTutores'> <span class='title'>Auxiliares e tutores</span>
                                    </a></li>
                                <li> <a href='#matComplementar'> <span class='title'>Mat. Complementar</span>
                                    </a></li>
                            </ul>
                        </li>
                        <li> <a> <span class='title'>Escolas</span> <span class='arrow '></span>
                            </a>
                            <ul class='sub-menu'>
                                <li> <a href='#infantil4Escola'> <span class='title'>Infantil IV</span>
                                    </a></li>
                                <li> <a href='#infantil5Escola'> <span class='title'>Infantil V</span>
                                    </a></li>
                                <li> <a href='#ano1'> <span class='title'>1º ano</span> </a></li>
                                <li> <a href='#ano2'> <span class='title'>2º ano</span> </a></li>
                                <li> <a href='#ano3'> <span class='title'>3º ano</span> </a></li>
                                <li> <a href='#ano4'> <span class='title'>4º ano</span> </a></li>
                                <li> <a href='#ano5'> <span class='title'>5º ano</span> </a></li>
                                <li> <a href='#arte'> <span class='title'>Arte</span> </a></li>
                                <li> <a href='#edFisica'> <span class='title'>Educação Física</span>
                                    </a></li>
                                <li> <a href='#ensReligioso'> <span class='title'>Ens. Religioso</span>
                                    </a></li>
                                <li> <a href='#inforEducativa'> <span class='title'>Informática
                                            Educativa</span> </a></li>
                                <li> <a href='#lousaInterativa'> <span class='title'>Lousa Interativa</span>
                                    </a></li>
                                <li> <a href='#ingles'> <span class='title'>Inglês</span> </a></li>
                                <li> <a href='#edAmbiental'> <span class='title'>Ed. Ambiental</span>
                                    </a></li>
                                <li> <a href='#EjaFase1'> <span class='title'>EJA - Fase i</span>
                                    </a></li>
                                <li> <a href='#edEspecial'> <span class='title'>Educação Especial</span>
                                    </a></li>
                                <li> <a href='#coordenacaoEscola'> <span class='title'>Coordenação</span>
                                    </a></li>
                                <li> <a href='#direcaoEscola'> <span class='title'>Direção</span> </a></li>
                                <li> <a href='#auxTutoresEscola'> <span class='title'>Auxiliares e tutores</span>
                                    </a></li>
                                <li> <a href='#matComplementarEscola'> <span class='title'>Mat.
                                            Complementar</span>
                                    </a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                    <li> <a href='#projPEDAG'> <span class='title'>Projetos Pedagógicos</span>
                    </a>
                    </li>
                    <li> <a href='#cadastrosPEDAG'> <span class='title'>Cadastros</span>
                        </a>
                    </li>
                    <li> <a href='#assessPEDAG'> <span class='title'>Assessoria Pedagógica</span>
                        </a>
                    </li>
                    <li> <a href='#popPEDAG'> <span class='title'>Protocolos - POP</span>
                        </a>
                    </li>
                    </ul>
                    </li>
                    <li class=''>
                    <a>
                        <i class='fas fa-parachute-box'></i>
                        <span class='title'>Suprimento de Pessoal</span>
                        <span class='arrow '></span>
                    </a>
                    <ul class='sub-menu'>
                        <li>
                            <a class='' href='#modeloArqSupPes'>Modelos de documentos</a>
                        </li>
                        <li>
                            <a class='' href='#qdrFuncional'>Quadro funcional</a>
                        </li>
                        <li>
                            <a class='' href='#regFuncional'>Registro funcional</a>
                        </li>
                        <li>
                            <a class='' href='#relEstagiarios'>Lista Estagiários</a>
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
                            <a class='' href='#modeloArqDocEscolar'>Modelos de documentos</a>
                        </li>
                        <li>
                            <a class='' href='#docLegal'>Documentação legal</a>
                        </li>
                        <li>
                            <a class='' href='#regEscolar'>Registro escolar</a>
                        </li>
                    </ul>
                </li>
                            <li class=''> 
                                <a>
                                    <i class='fas fa-paint-roller'></i>
                                    <span class='title'>Monitoramentode serviços</span>
                                    <span class='arrow '></span> 
                                </a>
                                <ul class='sub-menu'>
                                    <li> <a href='#solicServicosObras'> <span class='title'>Solicitação de serviços</span></a></li>
                                    <li><a href='#acompObras'><span class='title'>Acompanhamento de serviços</span></a></li>
                                </ul>
                            </li>
                     
                            <li class=''> 
                            <a>
                                <i class='fas fa-paint-roller'></i>
                                <span class='title'>Monitoramentode serviços</span>
                                <span class='arrow '></span> 
                            </a>
                            <ul class='sub-menu'>
                                <li> <a href='#solicServicosObras'> <span class='title'>Solicitação de serviços</span></a></li>
                        <li><a href='#acompObrasPorUnidade'> <span class='title'>Acompanhamento de serviços solicitados</span></a></li>
                    </ul>
                </li>
                <li class=''> <a> <i class='fas fa-utensils'></i> <span class='title'>Alimentação
                            escolar</span>
                        <span class='arrow '></span> </a>
                    <ul class='sub-menu'>
                        <li> <a href='#modeloArqAlimentacaoEscolar'> <span class='title'>Modelos de documentos</span>
                            </a>
                        </li>
                        <li> <a href='#solicServicosAlimentEscolar'> <span class='title'>Solicitação de serviços</span>
                            </a>
                        </li>
                        <li> <a href='#orientTecnica'> <span class='title'>Orientação técnica</span> 
                            </a>
                        </li>
                    </ul>
                </li>
                <li class=''> <a><i class='fas fa-box'></i> <span class='title'>Suprimentos
                            e logística</span>
                        <span class='arrow '></span> </a>
                    <ul class='sub-menu'>
                        <li> <a href='#solicServicosSuprLog'> <span class='title'>Solicitação de serviços</span>
                            </a>
                        </li>
                        <li> <a href='#comprasSuprLog'> <span class='title'>Compras</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class=''> <a> <i class='fas fa-money-bill-alt'></i> <span class='title'>Controladoria
                            e finanças</span>
                        <span class='arrow '></span> </a>
                    <ul class='sub-menu'>
                        <li> <a href='#modeloArqContrFinancas'> <span class='title'>Modelos de documentos</span> 
                            </a>
                        </li>
                        <li> <a href='#prestContasContrFinancas'> <span class='title'>Prestação de contas</span> 
                            </a>
                        </li>
                        <li> <a href='#programasContrFinancas'> <span class='title'>Programas</span>
                            </a>
                        </li>
                        <li> <a href='#capRecursosContrFinancas'> <span class='title'>Captação de recursos</span> 
                            </a>
                        </li>
                        <li> <a href='#legislacaoContrFinancas'> <span class='title'>Legislação</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class=''> <a><i class='fas fa-bus-alt'></i> <span class='title'>Transporte
                            escolar</span>
                        <span class='arrow '></span> </a>
                    <ul class='sub-menu'>
                        <li> <a href='#transpEspec'> <span class='title'>Transporte especial(aulas)</span></a>
                        </li>
                    </ul>
                </li>
                <li class=''> <a><i class='far fa-smile-beam'></i><span class='title'>Atendimento especializado</span><span class='arrow '></span> </a>
                        <ul class='sub-menu'>
                            <li> <a href='#modeloArqAtendEspec'> <span class='title'>Modelos de documentos</span>
                                </a>
                            </li>
                            <li> <a href='#encaminTriagem'> <span class='title'>Encaminhamento/triagem</span></a>
                            </li>
                            <li> <a href='#agendamentoAtendEspec'> <span class='title'>Agendamento</span>
                                </a>
                            </li>
                            <li> <a href='#orientTecnAtendEspec'> <span class='title'>Orientação técnica</span>
                                </a>
                            </li>
                        </ul>
                    </li</ul>
                    </li>";
                    break;
                    
                    case 3:
                    echo "  <li class=''>
                    <a>
                                         <i class='fas fa-sitemap'></i>
                                         <span class='title'>Fila de espera</span>
                                         <span class='arrow open'></span>
                                     </a>
                                     <ul class='sub-menu'>
                                         <li>
                                             <a class=''>Cadastros</a>
                                             <ul class='sub-menu'>
                                                 <li> <a class='' href='./#/cadaluno'>Cadastro de aluno</a></li>
                                                                                             
                                            </ul>
                                         </li>  

                                         <li>
                                             <a class=''>Fila de espera</a>
                                             <ul class='sub-menu'>
                                              <li> <a class='' href='./incfila.php'>Incluir</a></li>                   
                                            </ul>
                                         </li>  
                                            <a class=''>Movimento</a>
                                            <ul class='sub-menu'>
                                                <li> <a class='' href='./#/search'>Manutenção</a></li>
                                                <li> <a class='' href='./#/matricular'>Matricular aluno</a></li>
                                               <li> <a class='' href='./#/transferir'>Matriculados</a></li>
                                              
                                            </ul>
                                       </li>
                                        
                                     </ul>
                                 </li>
            <li class=''>";
                    break;
                }
                ?>

                <li class=""> <a> <i class="fas fa-hotel"></i> <span class="title">Organizacional</span>
                        <span class="arrow "></span> </a>
                    <ul class="sub-menu">
                        <li> <a href="#organograma"> <span class="title">Organograma</span>
                            </a>
                        </li>
                        <li> <a href="#sistemaOrganiz"> <span class="title">Sistema</span>
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
        <div ng-view id="main-content"></div>
        <!-- END CONTENT -->
        <!-- END CONTAINER -->
        <!-- Aqui -->
       <!-- fim aqui -->
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