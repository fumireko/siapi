<?php
    include "../validar_session2.php";
    include "../Config/config_sistema.php";
    $email_usuario = $_SESSION['email_usuario'];
    $nome_usuario = $_SESSION['nome_usuario'];
    $nivel_usuario = $_SESSION['nivel_usuario'];
    $funcao_usuario = $_SESSION['funcao_usuario'];
    $tbcmei_nome= $_SESSION['tbcmei_nome'];
    $consulta = mysqli_query($conn,"SELECT * FROM usuarios where email = '".$email_usuario."'");
    ?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-BR" lang="pt-BR" ng-app="App" height:90%> 
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="author" content="Admin" />
        <title>SMTI - Secretaria Municipal de Tecnologia da Informação.</title>
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <link rel="stylesheet" type="text/css" href="css/semed.css">
        <link href="assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen" />
        <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/fonts/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/animate.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/datatables/css/jquery.dataTables.css" rel="stylesheet" type="text/css" media="screen" />
        <link href="assets/plugins/datatables/extensions/TableTools/css/dataTables.tableTools.min.css" rel="stylesheet"
            type="text/css" media="screen" />
        <link href="assets/plugins/datatables/extensions/Responsive/css/dataTables.responsive.css" rel="stylesheet" type="text/css"
            media="screen" />
        <link href="assets/plugins/datatables/extensions/Responsive/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet"
            type="text/css" media="screen" /> <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END -->
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
        <script src="js/dados.js" ></script>
        <script src="js/masks.js"></script>
        </head>
    <!-- BEGIN BODY -->
    <body> 
        <!-- START TOPBAR -->
        <div class='page-topbar '>
            <a href='./newsfeed.php'>
            <div class='logo-area'>   
            </div></a>
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
                            <h4 class="usuario_logado">
                            <?php echo $tbcmei_nome;?>  
                            </h4>
                            <h4 class="usuario_logado">
                            <?php echo $funcao_usuario;?>  
                            </h4>
                            
                        </div>
                    </div>
                    <!-- USER INFO - END -->
                    <ul class="wraplist">
                        <li class=''>
                            <a href='./newsfeed.php'><i class='fas fa-home'></i><span class='title'>Pagina Inicial</span></a>
                        </li>
                        <li class=''> <a><i class="fas fa-user"></i> <span class='title'>Perfil</span>
                                <span class='arrow '></span> </a>
                            <ul class='sub-menu'>
                                <li> <a href='./#/frmalterasenha'> <span class='title'>Alterar Senha</span></a>
                                </li>
                            </ul>
                            <ul class='sub-menu'>
                                <li> <a href='./#/frmalterasenha'> <span class='title'>Alterar Senha</span></a>
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
                                    <span class='title'>Administrativo </span>
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
                                        <li> <a class='' href='./liberarsetor.php'>Liberar setores</a></li>
                                        <li> <a class='' href='./#/cadatendimentos'>Registros</a></li>
                                        <li> <a class='' href='./listavisitante.php'>Visitantes</a></li>
                                        
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
                                                    <li> <a class='' href='./cadcmei.php'>Cadastro de Cmei</a></li>
                                                    <li> <a class='' href='./#/cadusuarios'>Cadastro de Usuarios</a></li>
                                                    <li> <a class='' href='./cad_grupo.php'>Cadastro de Grupo</a></li>
                                                    <li> <a class='' href='./alteracmei.php'>Listar unidades</a></li>
                                                    
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
                                                    <li> <a class='' href='./#/busca_cadaluno'>Buscar aluno</a></li>
                                                    <li> <a class='' href='./#/search'>Manutenção</a></li>
                                                    <li> <a class='' href='./#/listatransf'>Lista de transferncia</a></li>
                                                    <li> <a class='' href='./#/matricular'>Matricular aluno</a></li>
                                                    <li> <a class='' href='./#/transferir'>Matriculados</a></li>
                                                    <li> <a class='' href='./geral_excel.php'>Geral excel</a></li>
                                                    <li> <a class='' href='./excel_filageral.php'>Gerar fila excel</a></li>
                                                    <li> <a class='' href='#'>Devolver na fila</a></li>
                                                    <li> <a class='' href='#'>Lista de Estagiarios  </a></li>
                                                </ul>
                                            </li>

                                            </li>
                                                <a class=''>Recadastramento</a>
                                                <ul class='sub-menu'>
                                                    <li> <a class='' href='./#/Cadastrar'>Cadastrar aluno</a></li>
                                                    <li> <a class='' href='./listapre4.php'>Lista Pré 4</a></li>
                                                    <li> <a class='' href='./listageral.php'>Lista Geral</a></li>
                                                    
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
                                        <li> <a class='' href='./#/incfilacaec'>Agendar</a></li>
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
                        <i class='fas fa-landmark'></i>
                        <span class='title'>Patrimonio</span>
                        <span class='arrow '></span>
                    </a>
                    <ul class='sub-menu'>
                        <li>
                            <a class='' href='./frmInventario.php'>Cadastro</a>
                        </li>
                        <li>
                            <a class='' href='#'>Irregularidades de cadastro</a>
                        </li>
                        <li>
                            <a class='' href='inventario_simples.php'>Inventario</a>
                        </li>
                        <li>
                            <a class='' href='#'>Pedidos de Remanejo</a>
                        </li>
                        <li>
                            <a class='' href='estoque_geral.php'>Estoque</a>
                        </li>
                        <li>
                            <a class='' href='#'>Arquivados</a>
                        </li>
                    </ul>
                    </li>
                    <li class=''>
                    <a>
                    <i class='fas fa-sitemap'></i>
                    <span class='title'>Patrimonio SMS</span>
                    <span class='arrow open'></span>
                </a>
                <ul class='sub-menu'>
                   
                    </li>

                        <a class=''>Cadastros</a>
                        <ul class='sub-menu'>
                          
                        <li> <a class='' href='./cadcmei.php'>Departamentos</a></li>
                        <li> <a class='' href='precadcadequip.php'>Equipamentos</a></li>
                            <li> <a class='' href='./#/cadsec'>Secretaria</a></li>
                            <li> <a class='' href='./#/cadusuarios'>Usuários</a></li>
                            <li> <a class='' href='./cadcmei.php'>Virada de turma</a></li>
                                
                        </ul>

                        <a class=''>Equipamentos</a>
                        <ul class='sub-menu'>
                            <li> <a class='' href='./listaequip.php'>Listagem PCS</a></li>
                            <li> <a class='' href='./listaequip_rel.php'>Emitir QR PCS</a></li>
                            <li> <a class='' href='./equipenviados.php'>Transferência enviados</a></li>
                            <li> <a class='' href='./equiprecebidos.php'>Transferência recebidos</a></li>
                         </ul> 
                      </li>
                        <a class=''>Movimento</a>
                            <ul class='sub-menu'>
                             <li> <a class='' href='./listaequip.php'>Equipamentos</a></li>
                                                                                
                        </ul>
                    </li> 
                </ul>
            </li>

                      
            <li class=''>
      
                    <a>
                        <i class='fas fa-headset'></i>
                        <span class='title'>Núcleo De Atendimento</span>
                        <span class='arrow '></span>
                    </a>
                    <ul class='sub-menu'>
                        <li>
                            <a class='' href='#'>Registro de não conformidade</a>
                            <ul class='sub-menu'>
                                <li><a class='' href='#'>Acompanhamento</a></li>
                                <li><a class='' href='#'>Registro</a></li>
                                <li><a class='' href='#'>Devolutivo</a></li>
                                <li><a class='' href='#'>Todos</a></li>
                            </ul>
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
                                <a class='' href='./downloads.php?id_arquivo=12'>Legislação e Normas</a>
                            </li>
                            <li>
                                <a class='' href='#modeloArqDocEscolar'>Modelos de documentos</a>
                            </li>
                            <li>
                                <a class='' href='./situacaoCmei.php'>Situação da Documentação</a>
                            </li>
                            <li>
                                <a class='' href='./registro_escola.php'>Registro escolar</a>
                            </li>
                        </ul>
                    </li>
                                <li class=''>
                                    <a>
                                        <i class='fas fa-paint-roller'></i>
                                        <span class='title'>Monitoramento de serviços</span>
                                        <span class='arrow '></span>
                                    </a>
                                    <ul class='sub-menu'>
                                        <li><a class='' href='./obras.php'>Novas Solicitaçoes de serviço</a></li>
                                        <li><a class='' href='./Pequenos_Reparos_Chamado.php'>Pequenos Reparos/Chamado</a></li>
                                        <li><a class='' href='./obras_catalogadas.php'>Obras</a></li>
                                        <li><a class='' href='./solicitacoes.php'>Todos Serviços</a></li>
                                        <li> <a href='./solicServicosObras.php'> <span class='title'>Solicitação de serviços</span></a></li>
                                        <li><a class='' href='./acompanhamento.php'>Acompanhamento de serviços</a></li>

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
                            <li> <a href='#orientTecnica'> <span class='title'>Cardápio Escolar</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class=''> <a><i class='fas fa-cart-arrow-down'></i> <span class='title'>Suprimentos
                                e logística</span>
                            <span class='arrow '></span> </a>
                        <ul class='sub-menu'>
                            <li> <a href='./solicCompras.php'> <span class='title'>Formulario de Requisições</span>
                                </a>
                            </li>
                            <li><a class='' href='cAcompanhamento.php'>Acompanhamento de Requisições</a></li>
                            <li>
                            <a class=''>Requisições</a>
                            <ul class='sub-menu'>
                                <li><a class='' href='./pedido_compra.php'>Em Verificação</a></li>
                                <li><a class='' href='./veCompras.php'>Em Aprovação</a></li>
                                <li><a class='' href='./exeCompra.php'>Em Execução</a></li>
                                <li><a class='' href='./fimCompras.php'>Finalizadas</a></li>
                                <li><a class='' href='./tdcompras.php'>Todas Solicitações</a></li>
                                <li><a class='' href='./cArquivadas.php'>Arquivadas</a></li>
                            </ul>
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
                    
                    
                    <li class=''> <a>
                    <i class='fas fa-bus-alt'></i> <span class='title'>Transporte
                                escolar</span>
                            <span class='arrow '></span> </a>
                        <ul class='sub-menu'>
                            <li> <a href='#transpEspec'> <span class='title'>Transporte especial(aulas)</span></a>
                            </li>
                        </ul>
                    </li>
                    <li class=''> 
                    <a>
                    <i class='fas fa-sitemap'></i>
                    <span class='title'>Suporte tecnico gerencial</span>
                    <span class='arrow open'></span>
                </a>
                <ul class='sub-menu'>
                </li>
                 <a class=''>Cadastros</a>
                        <ul class='sub-menu'>
                            <li> <a class='' href='./cadcmei.php'>Departamentos</a></li>
                            <li> <a class='' href='./cadcmei.php'>Equipamentos</a></li>
                            <li> <a class='' href='./#/cadsec'>Secretaria</a></li>
                            <li> <a class='' href='./#/cadusuarios'>Usuários</a></li>
                       </ul>
                        <a class=''>Equipamentos</a>
                        <ul class='sub-menu'>
                            <li> <a class='' href='./listaequip.php'>Listagem PCS</a></li>
                            <li> <a class='' href='./equipenviados.php'>Transferência enviados</a></li>
                            <li> <a class='' href='./equiprecebidos.php'>Transferência recebidos</a></li>
                         </ul> 
                      </li>
                      <a class=''>Movimento</a>
                  <ul class='sub-menu'>
                    <li> <a class='' href='./atenderdireto.php'>Atender direto</a></li>
                    <li> <a class='' href='./frmporstatus.php'>Chamados fila</a></li>
                    <li> <a class='' href='./frmportecnico.php'>Meus chamados</a></li>
                    <li> <a class='' href='./#/'>Incluir peça</a></li>
                   </ul>
                        <a class=''>Relatórios</a>
                            <ul class='sub-menu'>
                            <li> <a class='' href='./relfinalizados.php'>Chamados finalizados</a></li>
                            <li> <a class='' href='./relpendentes.php'>Chamados pendentes</a></li>
                            <li> <a class='' href='./relbaseantiga.php'>Chamados anterior à 18/11/2022</a></li>
                            <li> <a class='' href='./listaequip.php'>Equipamentos</a></li>
                            <li><a class='' href='./listauser.php'>Lista de usuários</a></li>
                      </ul>
                      
                      <a class=''>Fluxos</a>
                            <ul class='sub-menu'>
                            <li> <a class='' href='./exibfluxo.php'>Abertura de chamados</a></li>
                            <li> <a class='' href='./exibfluxo.php'>Solicitação de Equipamentos</a></li>
                            <li> <a class='' href='./exibfluxo.php'>Solicitação de infra</a></li>
                            <li> <a class='' href='./exibfluxo.php'>Solicitação de VOIP</a></li>
                           
                      </ul>
                      
                    </li> 
                </ul>
            </li>
<li class=''>
<a>
                    
                    
                    <i class='fas fa-chalkboard-teacher'></i> <span class='title'>Suporte tecnico 
                                </span>
                            <span class='arrow '></span> </a>
                        <ul class='sub-menu'>
                            <li> <a href='./#/abrircha_logado'> <span class='title'>Abrir chamado</span></a>
                            <li> <a href='./frmminhassolcitacoes.php'> <span class='title'>Meus chamados</span></a>
                            </li>
                        </ul>
                    </li>
                    <li class=''> <a><i class='far fa-smile-beam'></i><span class='title'>Atendimento especializado</span><span class='arrow '></span> </a>
                            <ul class='sub-menu'>
                                
                                 <a class=''>Encaminhamento/triagem</a>
                                <ul class='sub-menu'>
                                    <li> <a class='' href='./incfilacaec.php'>Enviar</a></li>
                                    <li> <a class='' href='./agenda_diaria.php'>Encaminhados</a></li>
                                </ul>
                                
                                <a class=''>Lista triagem</a>
                                <ul class='sub-menu'>
                                    <li> <a class='' href='./lista_triagem.php'>Lista</a></li>
                                    <li> <a class='' href='./lista_psico.php'>Devolutivas</a></li>
                                </ul>
                                <a class=''>Fila caec</a>
                                <ul class='sub-menu'>
                                    <li> <a class='' href='./lista_filacaec.php'>Minha fila</a></li>
                                   
                                   
                                                                                        
                                </ul>

                                <li> <a href=''> <span class='title'>Minha lista</span>
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
                                                <a class=''>Dados usuários</a>
                                                <ul class='sub-menu'>
                                                    <li> <a class='' href='./#/frmalterasenha'>Alterar senha</a></li>

                                                </ul>
                                            </li>
                                            

                                            <li>
                                                <a class=''>Fila de espera</a>
                                                <ul class='sub-menu'>
                                                <li> <a class='' href='./incfila.php'>Incluir</a></li>
                                                </ul>
                                            </li><li> <a class='' href='./#/search'>Buscar aluno</a></li></a></li>
                                                    <li> <a class='' href='./#/search'>Manutenção</a></li>
                                                    <li> <a class='' href='./#/listatransf'>Lista de transferncia</a></li>
                                                    <li> <a class='' href='./#/matricular'>Matricular aluno</a></li>
                                                <li> <a class='' href='./#/transferir'>Matriculados</a></li>

                                                </ul>
                                        </li>
                                      
                                     
                                    </li>
                             <li class=''><li class=''> <a><i class='far fa-smile-beam'></i><span class='title'>Atendimento especializado</span><span class='arrow '></span> </a>
                             <ul class='sub-menu'>
                                 <a class=''>Encaminhamento/triagem</a>
                                 <ul class='sub-menu'>
                                     <li> <a class='' href='./incfilacaec.php'>Enviar</a></li>
                                    
                                 </ul>
                                 <a class=''>Lista triagem</a>
                                 <ul class='sub-menu'>
                                     <li> <a class='' href='./lista_triagem.php'>Lista</a></li>
                                     <li> <a class='' href='./agenda_triagem.php'>Agendamentos</a></li>
                                   
                                 </ul>
                                 <a class=''>Fila caec</a>
                                 <ul class='sub-menu'>
                                     <li> <a class='' ' href='./lista_filacaec.php'>Minha Fila</a></li>
                                     
                                 </ul>
                                 
                                      </a>
                                 </li>
                             </ul>
                         </li</ul>
                         </li>";
                        break;

                        case 4:
                        
                            echo "  <li class=''>
                            
                            <a>
                                    <i class='fas fa-toolbox'></i>
                                    <span class='title'>Administrativo </span>
                                    <span class='arrow open'></span>
                                </a>
                                <ul class='sub-menu'>
                                    <li>
                                        <a class='' href='./#/modeloArqADM'>Modelos de documentos</a>
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
                                        <li> <a class='' href='./liberarsetor.php'>Liberar setores</a></li>
                                        <li> <a class='' href='./#/cadatendimentos'>Registros</a></li>
                                        <li> <a class='' href='./listavisitante.php'>Visitantes</a></li>
                                        
                                        </ul>
                                    </li>
                    
                                    
                    <li>
                                        <a class=''>Relatorios</a>
                                        <ul class='sub-menu'> </a></li>
                                        <li><a class='' href='./eventos.php'>lista de Eventos</a></li>
                                        
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class=''>
                            
                            <li class=''> <a>
                    <i class='fas fa-sitemap'></i>
                    <span class='title'>Suporte tecnico gerencial</span>
                    <span class='arrow open'></span>
                </a>
                <ul class='sub-menu'>
                   
                    </li>

                        <a class=''>Cadastros</a>
                        <ul class='sub-menu'>
                          
                        <li> <a class='' href='./cadcmei.php'>Departamentos</a></li>
                        <li> <a class='' href='precadequip.php?id=0'>Equipamentos</a></li>
                            <li> <a class='' href='./#/cadsec'>Secretaria</a></li>
                            <li> <a class='' href='./#/cadusuarios'>Usuários</a></li>
                                
                        </ul>
                        <a class=''>Equipamentos</a>
                        <ul class='sub-menu'>
                            <li> <a class='' href='./listaequip.php'>Listagem PCS</a></li>
                           <li> <a class='' href='./listaequip_rel.php'>QR PCS</a></li>
                            <li> <a class='' href='./equipenviados.php'>Transferência enviados</a></li>
                            <li> <a class='' href='./equiprecebidos.php'>Transferência recebidos</a></li>
                            <li> <a class='' href='./listaconf.php'>Edita configuraçoões PCS</a></li>
                         </ul> 
                </li>
                <a class=''>Movimento</a>
                <ul class='sub-menu'>
                    <li> <a class='' href='./atenderdireto.php'>Atender direto</a></li>
                    <li> <a class='' href='./frmporstatus.php'>Chamados fila</a></li>
                    <li> <a class='' href='./frmportecnico.php'>Meus chamados</a></li>
                    <li> <a class='' href='./#/'>Incluir peça</a></li>
                </ul>

                <a class=''>Relatórios</a>
                        <ul class='sub-menu'>
                             <li> <a class='' href='./relfinalizados.php'>Chamados finalizados</a></li>
                            <li> <a class='' href='./relpendentes.php'>Chamados pendentes</a></li>
                            <li> <a class='' href='./relbaseantiga.php'>Chamados anterior à 18/11/2022</a></li>
                            <li> <a class='' href='./listaequip.php'>Equipamentos</a></li>
                            <li><a class='' href='./listauser.php'>Lista de usuários</a></li>
                                                                                
                        </ul>
                        
                        <a class=''>Fluxos</a>
                            <ul class='sub-menu'>
                            <li> <a class='' href='./exibfluxo.php'>Abertura de chamados</a></li>
                            <li> <a class='' href='./exibfluxo.php'>Solicitação de Equipamentos</a></li>
                            <li> <a class='' href='./exibfluxo.php'>Solicitação de infra</a></li>
                            <li> <a class='' href='./exibfluxo.php'>Solicitação de VOIP</a></li>
                           
                      </ul>


                </li> 
                </ul>
            </li>"                        
                            ;
                            break;
                            case 6:
                                echo "  <li class=''>
                                
                                <a>                               
                                <i class='fas fa-chalkboard-teacher'></i>
                                    <span class='title'>Escola de Gestão </span>
                                                    <span class='arrow open'></span>
                                                </a>
                                                <ul class='sub-menu'>
                                                   
                                                    </li>
    
                                                        <a class=''>Cadastros</a>
                                                        <ul class='sub-menu'>
                                                            <li> <a class='' href='./#/cadcursista'>Cursistas</a></li>
                                                            <li> <a class='' href='./#/'>Secretaria</a></li>
                                                            <li> <a class='' href='./#/'>Usuarios</a></li>
                                                                
                                                        </ul>
                                                </li>
                                                        <a class=''>Movimento</a>
                                                        <ul class='sub-menu'>
                                                            <li> <a class='' href='./#/'>Atender direto</a></li>
                                                            <li> <a class='' href='./#/'>Chamados fila</a></li>
                                                            <li> <a class='' href='./#/'>Chamados gerais</a></li>
                                                            <li> <a class='' href='./#/'>Devolver chamado</a></li>
                                                            <li> <a class='' href='./#/'>Incluir peça</a></li>
                                                            <li><a class='' href='./listaequip.php'>Lista computadores</a></li>
                                                                                                                
                                                        </ul>
                                                </li> 
                                                </ul>
                                            </li>
                                            
                                       
                                <li class=''>";
                                break;

                                case 7:
                                echo "<li class=''>
                                <a>
                                <i class='fas fa-sitemap'></i>
                                 <span class='title'>Patrimonio SMS</span>
                                 <span class='arrow open'></span>
                              </a>
                                <ul class='sub-menu'>
                              </li>
                            <a class=''>Cadastros</a>
                            <ul class='sub-menu'>
                            <li> <a class='' href=''>Equipamentos</a></li>
                                                            
                        </ul>

                        <a class=''>Equipamentos</a>
                        <ul class='sub-menu'>
                            <li> <a class='' href='./listaequip.php'>Listagem PCS</a></li>
                            <li> <a class='' href='./equipenviados.php'>Transferência enviados</a></li>
                            <li> <a class='' href='./equiprecebidos.php'>Transferência recebidos</a></li>
                         </ul> 
                      </li>
                        <a class=''>Movimento</a>
                            <ul class='sub-menu'>
                             <li> <a class='' href='./listaequip.php'>Equipamentos</a></li>
                                                                                
                        </ul>
                    </li> 
                </ul>
            </li>


                          <li class=''>";
                          break;
                          case 5:
                            echo "  <li class=''> <a><i class='far fa-smile-beam'></i><span class='title'>Atendimento especializado</span><span class='arrow '></span> </a>
                            <ul class='sub-menu'>
                                <a class=''>Encaminhamento/triagem</a>
                                <ul class='sub-menu'>
                                    <li> <a class='' href='./incfilacaec.php'>Enviar</a></li>
                                   
                                </ul>
                                <a class=''>Lista triagem</a>
                                <ul class='sub-menu'>
                                    <li> <a class='' href='./agendar_triagem.php'>Agendar</a></li>
                                    <li> <a class='' href='./agenda_diaria.php'>Agendados</a></li>
                                   
                                </ul>
                                <a class=''>Fila cace</a>
                                <ul class='sub-menu'>
                                    <li> <a class='' href='./lista_filacaec.php'>Minha fila</a></li>
                                   
                                                                                                                       
                                </ul>
                                <li> <a href='#orientTecnAtendEspec'> <span class='title'>Orientação técnica</span>
                                    </a>
                                </li>
                            </ul>
                        </li</ul>
                        </li>";
                        break;
                    }
                       ?>
                    <li class=""> <a> <i class="fas fa-hotel"></i> <span class="title">Organizacional</span>
                            <span class="arrow "></span> </a>
                        <ul class="sub-menu">
                            <li> <a href="#organograma"> <span class="title">Organograma</span>
                                </a>
                            </li>
                            <li> <a href="#"> <span class="title">Telefones úteis</span>
                                </a>
                            </li>
                            <li> <a href="./#/sistemaOrganiz"> <span class="title">Sistema</span>
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
            <div ng-view id="main-content"></div>
            <script src="assets/js/jquery-1.11.2.min.js" type="text/javascript"></script>
            <script src="assets/js/jquery.easing.min.js" type="text/javascript"></script>
            <script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
            <script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>
            <script src="assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js" type="text/javascript"></script>
            <script src="assets/plugins/viewport/viewportchecker.js" type="text/javascript"></script>
            <script src="assets/plugins/datatables/js/jquery.dataTables.min.js" type="text/javascript"></script>
            <script src="assets/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js" type="text/javascript"></script>
            <script src="assets/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js" type="text/javascript"></script>
            <script src="assets/plugins/datatables/extensions/Responsive/bootstrap/3/dataTables.bootstrap.js" type="text/javascript"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.js"></script>
            <script src="assets/js/scripts.js" type="text/javascript"></script>
            <script src="assets/plugins/sparkline-chart/jquery.sparkline.min.js" type="text/javascript"></script>
            <script src="assets/js/chart-sparkline.js" type="text/javascript"></script>
    </body>

    </html>
